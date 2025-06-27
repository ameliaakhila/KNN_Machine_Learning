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
        $samples = Sample::with(['data.variabel'])->get();
        $idSample = $samples->pluck('id');
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

    // ! HASIL PERHITUNGAN
    public function hasilPerhitungan(Request $request)
    {
        // Ambil nilai K dari request (GET)
        $k = $request->input('k');
        // Ambil variabel uji dan ID-nya
        $idVariabelLatih = Variabel::where('status', 'Variabel')->pluck('id')->toArray();
        $idVariabelUji = Variabel::where('status', 'Variabel Uji')->pluck('id')->toArray();
        $samples = Sample::with('data.variabel')->orderBy('id')->get();

        $samplesLatih = [];
        $samplesUji = [];

        foreach ($samples as $sample) {
            $data = [];

            foreach ($sample->data as $item) {
                $data[$item->id_variabel] = $item->nilai;
            }

            $dataUji = array_intersect_key($data, array_flip($idVariabelUji));
            $dataLatih = array_intersect_key($data, array_flip($idVariabelLatih));

            if (count($dataUji) === count($idVariabelUji)) {
                $samplesUji[$sample->id] = $dataUji;
            } elseif (count($dataLatih) === count($idVariabelLatih)) {
                $samplesLatih[$sample->id] = $dataLatih;
            }
        }

        //! Hitung jumlah data uji
        $jumlahDataUji = count($samplesUji);
        $akar = floor(sqrt($jumlahDataUji));
        $start = ($akar % 2 === 0) ? $akar - 1 : $akar;

        $options = [];
        for ($i = $start; count($options) < 5 && $i > 0; $i -= 2) {
            $options[] = $i;
        }
        sort($options);

        // Jika tidak ada input k, ambil default ke nilai terbesar dari opsi
        if (!$k && count($options)) {
            $k = max($options);
        }

        // Hitung jarak euclidean
        $results = [];

        foreach ($samplesLatih as $latihId => $dataLatih) {
            $baris = [];
            $klasifikasi = [];

            foreach ($samplesUji as $ujiId => $dataUji) {
                $totalSquared = 0;
                $index = 0;

                foreach ($dataUji as $idUji => $nilaiUji) {
                    $nilaiLatih = array_values($dataLatih)[$index] ?? null;

                    if ($nilaiLatih === null || $nilaiUji === null) {
                        $index++;
                        continue;
                    }

                    $selisihKuadrat = pow($nilaiLatih - $nilaiUji, 2);
                    $totalSquared += $selisihKuadrat;
                    $index++;
                }

                $distance = sqrt($totalSquared);
                $baris[] = $distance;
            }
            $results[] = $baris;
        }


        // ! Hitung Klasifikasi
        $klasifikasi = [];


        foreach (array_keys($samplesUji) as $ujiIndex => $ujiId) {
            $jarakUntukUji = array_column($results, $ujiIndex);
            $latihIds = array_keys($samplesLatih);

            $gabungan = [];
            foreach ($jarakUntukUji as $i => $jarak) {
                $gabungan[] = [
                    'id' => $latihIds[$i],
                    'jarak' => $jarak,
                ];
            }

            // Urutkan berdasarkan jarak terdekat
            usort($gabungan, fn($a, $b) => $a['jarak'] <=> $b['jarak']);

            // Ambil K tetangga terdekat
            $tetangga = array_slice($gabungan, 0, $k);

            // Hitung jumlah class
            $classCounts = [];
            foreach ($tetangga as $t) {
                $sample = Sample::with('data')->find($t['id']);
                $class = optional($sample->data->last())->class;

                if ($class) {
                    $classCounts[$class] = ($classCounts[$class] ?? 0) + 1;
                }
            }

            arsort($classCounts);
            $hasil = array_key_first($classCounts);
            $klasifikasi[$ujiId] = $hasil;
        }

        // Hitung jumlah klasifikasi per kelas
        $jumlahPerClass = array_count_values($klasifikasi);
        if (!empty($jumlahPerClass)) {
            $nilaiMaksimal = max($jumlahPerClass);
        } else {
            $nilaiMaksimal = 0;
        }

        return view('dashboard.dt-hasil', compact('results', 'samplesUji', 'options', 'k', 'klasifikasi', 'jumlahPerClass', 'nilaiMaksimal'));
    }

    // ! CREATE
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_variabel' => 'required|array',
            'id_data' => 'required|array',
            'nilai' => 'required|array',
            'nilai.*' => 'required|numeric',
            'class' => 'required|string',
        ]);

        try {
            $count = count($request->id_variabel);

            if (
                $count !== count($request->id_data) ||
                $count !== count($request->nilai)
            ) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Jumlah elemen id_variabel, id_data, dan nilai tidak sesuai.');
            }


            // Buat sample baru, ID-nya auto-increment
            $sample = Sample::create([
                'id_variabel' => $request->id_variabel[0],
                'id_data' => $request->id_data[0],
            ]);

            // Ambil nilai class dari input tunggal
            $class = $request->class;

            // Simpan data untuk setiap variabel
            for ($i = 0; $i < $count; $i++) {
                $idVariabel = $request->id_variabel[$i];
                $idData = $request->id_data[$i];
                $nilai = $request->nilai[$i] ?? null;

                if ($nilai === null) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', "Nilai ke-" . ($i + 1) . " tidak ditemukan.");
                }

                // Simpan ke tabel data
                Data::create([
                    'id_sample' => $sample->id,
                    'id_variabel' => $idVariabel,
                    'id_data' => $idData,
                    'nilai' => $nilai,
                    'class' => $class,
                    'hasil_dist' => 0,
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

    // ! READ
    public function show($id): View|RedirectResponse
    {
        try {
            // Ambil data sample berdasarkan ID dengan relasi data dan variabel
            $sample = Sample::with(['data.variabel'])->findOrFail($id);

            return view('data-sample.show', compact('sample'));
        } catch (\Exception $e) {
            return redirect()
                ->route('dataSample.index')
                ->with('error', 'Data sample tidak ditemukan: ' . $e->getMessage());
        }
    }

    // ! UPDATE
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'id_data' => 'required|array',
            'nilai' => 'required|array',
            'nilai.*' => 'required|numeric',
            'class' => 'required|string',
        ]);

        try {
            $count = count($request->id_data);

            if ($count !== count($request->nilai)) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Jumlah elemen id_data dan nilai tidak sesuai.');
            }

            $class = $request->class;
            for ($i = 0; $i < $count; $i++) {
                $idData = $request->id_data[$i];
                $nilai = $request->nilai[$i];

                $data = Data::findOrFail($idData);
                $data->update([
                    'nilai' => $nilai,
                    'class' => $class,
                ]);
            }

            return redirect()
                ->route('dataSample.index')
                ->with('success', 'Nilai data sample berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }


    // ! DESTROY
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
