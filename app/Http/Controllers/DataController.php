<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(): View
    {
        $sample = Data::with(['data.variabel'])->get();
        $dataVariabel = Data::latest()->paginate(10);

        return view('dashboard.dt-variable', compact('sample','dataVariabel'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'variabel' => 'required|string',
            'nilai' => 'required|numeric',
            'status' => 'required|in:Data,Data Uji',
            'keterangan' => 'required|string'
        ]);

        Data::create($request->only(['variabel', 'nilai', 'status', 'keterangan']));

        return redirect()->route('data.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show(string $id): View
    {
        $data = Data::findOrFail($id);
        return view('menu.read', compact('data'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'variabel' => 'required|string|min:2',
            'status' => 'required|in:Data,Data Uji',
            'keterangan' => 'required|string|min:1',
        ]);

        $data = Data::findOrFail($id);
        $data->update($validated);

        return redirect()->route('data.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id): RedirectResponse
    {
        $data = Data::findOrFail($id);
        $data->delete();

        return redirect()->route('data.index')->with('success', 'Data berhasil dihapus!');
    }
}
