<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\Variabel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class VariabelController extends Controller
{
    public function index(): View
    {
        $variabels = Variabel::latest()->paginate(10);
        return view('dashboard.dt-variable', compact('variabels'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'variabel' => 'required|string',
            'status' => 'required|in:Variabel,Variabel Uji',
            'keterangan' => 'required|string',
        ]);

        try {
            // Simpan variabel dan dapatkan instance-nya
            $variabel = Variabel::create($request->only(['variabel', 'status', 'keterangan']));

            return redirect()->route('dataVariabel.index')->with('success', 'Variabel berhasil disimpan!');
        } catch (\Exception $e) {
            \Log::error('Gagal menyimpan data variabel: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan variabel Silakan coba lagi!');
        }
    }

    public function show(string $id): View
    {
        $variabel = Variabel::findOrFail($id);
        return view('menu.read', compact('variabel'));
    }

    public function update(Request $request, $id): RedirectResponse
    {

        $validated = $request->validate([
            'variabel' => 'required|string|min:2',
            'status' => ['required', Rule::in(Variabel::STATUS_OPTIONS)],
            'keterangan' => 'required|string|min:1',
        ]);

        try {
            $variabel = Variabel::findOrFail($id);
            $variabel->update($validated);

            return redirect()->route('dataVariabel.index')->with('success', 'Variabel berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan variabel. Silakan coba lagi!');
        }
    }

    public function destroy($id): RedirectResponse
    {
        $variabel = Variabel::findOrFail($id);
        $variabel->delete();

        return redirect()->route('dataVariabel.index')->with('success', 'Variabel berhasil dihapus!');
    }
}
