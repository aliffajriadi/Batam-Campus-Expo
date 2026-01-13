<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = \App\Models\Kegiatan::orderBy('order')->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'time' => 'required|string',
            'activity' => 'required|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'order' => 'required|integer',
        ]);

        \App\Models\Kegiatan::create($validated);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Not implemented
        return redirect()->route('admin.kegiatan.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kegiatan = \App\Models\Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kegiatan = \App\Models\Kegiatan::findOrFail($id);

        $validated = $request->validate([
            'time' => 'required|string',
            'activity' => 'required|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'order' => 'required|integer',
        ]);

        $kegiatan->update($validated);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = \App\Models\Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }
}
