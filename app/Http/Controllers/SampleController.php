<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Sample;
use App\Models\Variabel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SampleController extends Controller
{
    public function index(): View
    {
        $dataVariabel = Variabel::orderBy('id')->get();
        $dataSample = Sample::with(['data.variabel'])->orderBy('id')->get();

        $samplesVariabel = $dataSample->filter(
            fn($sample) =>
            $sample->data->contains(fn($data) => $data->variabel?->status === 'Variabel')
        );

        $samplesUji = $dataSample->filter(
            fn($sample) =>
            $sample->data->contains(fn($data) => $data->variabel?->status === 'Variabel Uji')
        );

        return view('dashboard.dt-sample', compact('dataVariabel', 'dataSample', 'samplesVariabel', 'samplesUji'));
    }

    public function hasilPerhitungan(Request $request): View
    {
        $k = $request->input('k');
        $idVariabelLatih = Variabel::where('status', 'Variabel')->pluck('id')->toArray();
        $idVariabelUji = Variabel::where('status', 'Variabel Uji')->pluck('id')->toArray();
        $samples = Sample::with('data.variabel')->orderBy('id')->get();

        $samplesLatih = [];
        $samplesUji = [];

        foreach ($samples as $sample) {
            $data = $sample->data->pluck('nilai', 'id_variabel')->toArray();
            $latih = array_intersect_key($data, array_flip($idVariabelLatih));
            $uji = array_intersect_key($data, array_flip($idVariabelUji));

            if (count($uji) === count($idVariabelUji)) {
                $samplesUji[$sample->id] = $uji;
            } elseif (count($latih) === count($idVariabelLatih)) {
                $samplesLatih[$sample->id] = $latih;
            }
        }

        $jumlahLatih = count($samplesLatih);
        $akar = floor(sqrt($jumlahLatih));
        $start = $akar % 2 === 0 ? $akar - 1 : $akar;

        $options = [];
        for ($i = $start; count($options) < 5 && $i > 0; $i -= 2) {
            $options[] = $i;
        }
        sort($options);

        $k = $k ?: max($options);

        //! Hitung jarak Euclidean
        $results = [];
        foreach ($samplesLatih as $latih) {
            $row = [];

            foreach ($samplesUji as $uji) {
                $total = 0;
                foreach (array_values($uji) as $index => $valUji) {
                    $valLatih = array_values($latih)[$index] ?? null;
                    if ($valLatih !== null) {
                        $total += pow($valLatih - $valUji, 2);
                    }
                }
                $row[] = sqrt($total);
            }

            $results[] = $row;
        }

        //! Klasifikasi
        $klasifikasi = [];
        foreach (array_keys($samplesUji) as $ujiIndex => $ujiId) {
            $jarakKeUji = array_column($results, $ujiIndex);
            $latihIds = array_keys($samplesLatih);

            $tetangga = collect($jarakKeUji)->map(fn($jarak, $i) => [
                'id' => $latihIds[$i],
                'jarak' => $jarak,
            ])->sortBy('jarak')->take($k);

            $classCounts = [];
            foreach ($tetangga as $t) {
                $class = Sample::with('data')->find($t['id'])?->data->last()?->class;
                if ($class)
                    $classCounts[$class] = ($classCounts[$class] ?? 0) + 1;
            }

            arsort($classCounts);
            $klasifikasi[$ujiId] = array_key_first($classCounts);
        }

        $jumlahPerClass = array_count_values(array_filter($klasifikasi, fn($v) => is_string($v) || is_int($v)));
        $nilaiMaksimal = !empty($jumlahPerClass) ? max($jumlahPerClass) : 0;

        return view('dashboard.dt-hasil', compact('results', 'samplesUji', 'options', 'k', 'klasifikasi', 'jumlahPerClass', 'nilaiMaksimal'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_variabel' => 'required|array',
            'id_data' => 'required|array',
            'nilai' => 'required|array',
            'nilai.*' => 'required|numeric',
            'class' => 'required|string',
        ]);

        $count = count($request->id_variabel);

        if ($count !== count($request->id_data) || $count !== count($request->nilai)) {
            return back()->withInput()->with('error', 'Jumlah data tidak konsisten.');
        }

        $sample = Sample::create([
            'id_variabel' => $request->id_variabel[0],
            'id_data' => $request->id_data[0],
        ]);

        for ($i = 0; $i < $count; $i++) {
            Data::create([
                'id_sample' => $sample->id,
                'id_variabel' => $request->id_variabel[$i],
                'id_data' => $request->id_data[$i],
                'nilai' => $request->nilai[$i],
                'class' => $request->class,
            ]);
        }

        return redirect()->route('dataSample.index')->with('success', 'Sample dan data berhasil disimpan!');
    }

    public function show($id): View|RedirectResponse
    {
        try {
            $sample = Sample::with(['data.variabel'])->findOrFail($id);
            return view('data-sample.show', compact('sample'));
        } catch (\Exception $e) {
            return redirect()->route('dataSample.index')->with('error', 'Data sample tidak ditemukan.');
        }
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'id_data' => 'required|array',
            'nilai' => 'required|array',
            'nilai.*' => 'required|numeric',
            'class' => 'required|string',
        ]);

        $count = count($request->id_data);
        if ($count !== count($request->nilai)) {
            return back()->withInput()->with('error', 'Jumlah elemen tidak sesuai.');
        }

        for ($i = 0; $i < $count; $i++) {
            $data = Data::findOrFail($request->id_data[$i]);
            $data->update([
                'nilai' => $request->nilai[$i],
                'class' => $request->class,
            ]);
        }

        return redirect()->route('dataSample.index')->with('success', 'Data sample berhasil diperbarui!');
    }

    public function destroy($id): RedirectResponse
    {
        try {
            Data::where('id_sample', $id)->delete();
            Sample::findOrFail($id)->delete();
            return redirect()->route('dataSample.index')->with('success', 'Sample berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus sample: ' . $e->getMessage());
        }
    }
}
