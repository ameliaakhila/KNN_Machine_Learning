<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\Variabel;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class SampleController extends Controller
{
    public function index(): View
    {
        // Ambil semua variabel (untuk referensi form atau tampilan)
        $dataVariabel = Variabel::orderBy('id')->get();

        // Ambil semua sample (diurutkan berdasarkan id_sample)
        $dataSample = Sample::with(['data.variabel'])
            ->orderBy('id')
            ->get();

        // Filter sample berdasarkan status variabel terkait
        $samplesVariabel = $dataSample->filter(function ($sample) {
            return $sample->data->contains(function ($data) {
                return $data->variabel && $data->variabel->status === 'Variabel';
            });
        });

        // Filter sample uji
        $samplesUji = $dataSample->filter(function ($sample) {
            return $sample->data->contains(function ($data) {
                return $data->variabel && $data->variabel->status === 'Variabel Uji';
            });
        });

        // Gabungkan jika diperlukan
        $samples = $samplesVariabel->merge($samplesUji);

        return view('dashboard.dt-sample', compact('samplesVariabel', 'samplesUji', 'dataVariabel', 'dataSample'));
    }

    public function hasilPerhitungan()
    {
        // Ambil ID variabel sesuai status
        $idVariabelLatih = Variabel::where('status', 'Variabel')->pluck('id')->toArray();
        $idVariabelUji = Variabel::where('status', 'Variabel Uji')->pluck('id')->toArray();

        // Ambil semua sample dan relasi datanya
        $samples = Sample::with('data')->get();

        // Buat mapping sample berdasarkan nilai dari variabel latih dan uji
        $samplesLatih = [];
        $samplesUji = [];

        foreach ($samples as $sample) {
            $dataLatih = $sample->data->whereIn('id_variabel', $idVariabelLatih)->pluck('nilai', 'id_variabel')->toArray();
            $dataUji = $sample->data->whereIn('id_variabel', $idVariabelUji)->pluck('nilai', 'id_variabel')->toArray();

            if (!empty($dataLatih)) {
                $samplesLatih[$sample->id] = $dataLatih;
            }

            if (!empty($dataUji)) {
                $samplesUji[$sample->id] = $dataUji;
            }
        }

        $results = [];

        foreach ($samplesUji as $ujiId => $dataUji) {
            foreach ($samplesLatih as $latihId => $dataLatih) {
                $totalSquaredDiff = 0;
                $detail = [];

                foreach ($idVariabelLatih as $id_var) {
                    $nilaiUji = $dataUji[$id_var] ?? 0;
                    $nilaiLatih = $dataLatih[$id_var] ?? 0;

                    $selisihKuadrat = pow($nilaiLatih - $nilaiUji, 2);
                    $totalSquaredDiff += $selisihKuadrat;

                    $detail[] = [
                        'id_variabel' => $id_var,
                        'hasil_dist' => round($selisihKuadrat, 4),
                    ];
                }

                $distance = sqrt($totalSquaredDiff);

                $results[] = [
                    'uji_id' => $ujiId,
                    'latih_id' => $latihId,
                    'distance' => round($distance, 4),
                    'data' => collect($detail),
                ];
            }
        }

        $dataHasil = Variabel::where('status', 'Variabel')->get();

        return view('dashboard.dt-hasil', compact('results', 'dataHasil'));

    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_variabel' => 'required|array',
            'nilai' => 'required|array',
        ]);

        try {
            // Buat sample baru, ID-nya auto-increment
            $sample = Sample::create();

            $count = count($request->id_variabel);

            for ($i = 0; $i < $count; $i++) {
                $idVariabel = $request->id_variabel[$i];
                $nilai = $request->nilai[$i];

                // Ambil semua data existing untuk id_variabel ini (selain sample sekarang)
                $existingData = Data::where('id_variabel', $idVariabel)
                    ->where('id_sample', '!=', $sample->id)
                    ->get();

                $totalDistance = 0;
                foreach ($existingData as $data) {
                    $totalDistance += pow($nilai - $data->nilai, 2);
                }

                $hasil_dist = $existingData->count() > 0 ? sqrt($totalDistance) : 0;

                // Simpan ke tabel data
                Data::create([
                    'id_sample' => $sample->id,
                    'id_variabel' => $idVariabel,
                    'nilai' => $nilai,
                    'hasil_dist' => $hasil_dist,
                    'hasil_k' => 0,
                ]);
            }

            return redirect()
                ->route('dataSample.index')
                ->with('success', 'Sample dan data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());

        }
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'id_variabel' => 'required|array',
            'nilai' => 'required|array',
        ]);

        try {
            // Ambil sample yang ingin diupdate
            $sample = Sample::findOrFail($id);

            // Hapus data lama terkait sample ini
            Data::where('id_sample', $sample->id)->delete();

            // Simpan nilai input ke dalam array: [id_variabel => nilai]
            $inputData = [];
            $count = count($request->id_variabel);
            for ($i = 0; $i < $count; $i++) {
                $inputData[$request->id_variabel[$i]] = $request->nilai[$i];
            }

            // Ambil semua sample sebelumnya
            $existingSamples = Sample::with('data')->where('id', '!=', $sample->id)->get();

            // Hitung jarak ke semua sample lama
            $distances = [];
            foreach ($existingSamples as $existingSample) {
                $total = 0;

                foreach ($inputData as $idVar => $nilaiBaru) {
                    // Ambil nilai dari sample lama untuk id_variabel yg sama
                    $dataLama = $existingSample->data->firstWhere('id_variabel', $idVar);
                    if ($dataLama) {
                        $total += pow($nilaiBaru - $dataLama->nilai, 2);
                    }
                }

                $jarak = sqrt($total);
                $distances[] = $jarak;
            }

            // Hitung rata-rata jarak dari semua sample lama
            $hasil_dist = count($distances) > 0 ? array_sum($distances) / count($distances) : 0;

            // Simpan semua nilai ke tabel `data`
            foreach ($inputData as $idVariabel => $nilai) {
                Data::create([
                    'id_sample' => $sample->id,
                    'id_variabel' => $idVariabel,
                    'nilai' => $nilai,
                    'hasil_dist' => $hasil_dist,
                    'hasil_k' => 0,
                ]);
            }

            return redirect()
                ->route('dataSample.index')
                ->with('success', 'Data sample berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }


    public function destroy($id): RedirectResponse
    {
        try {
            // Hapus data terkait (jika ingin hapus juga data variabelnya)
            Data::where('id_sample', $id)->delete();

            // Hapus sample
            Sample::findOrFail($id)->delete();

            return redirect()
                ->route('dataSample.index')
                ->with('success', 'Sample berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus sample: ' . $e->getMessage());
        }
    }

}
