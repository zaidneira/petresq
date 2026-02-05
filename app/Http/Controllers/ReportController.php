<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportImage;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function create()
    {
        return view('pages.form');
    }

    public function store(Request $request)
    {
        // 1. VALIDASI INPUT
        $request->validate([
            'animal_type' => 'required|string|max:100',
            'location'      => 'required|string|max:255',
            'description'   => 'required|string',
            'condition'     => 'nullable|string|max:100',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'phone' => 'required|string|max:255',
        ]);

        // 2. SIMPAN LAPORAN
        $report = Report::create([
            'user_id'        => $request->user()->id,
            'animal_type'    => $request->animal_type,
            'location'         => $request->location,
            'description'      => $request->description,
            'condition'        => $request->condition,
            'phone' => $request->phone,
            'status'         => 'dilaporkan',
        ]);

        // 3. SIMPAN GAMBAR
        if ($request->hasFile('image')) {

            $path = $request->file('image')->store(
                'reports',
                'public'
            );

            ReportImage::create([
                'report_id' => $report->id,
                'image_path' => $path,
            ]);
        }

        // 4. REDIRECT
        return redirect()
            ->route('reports.index')
            ->with('success', 'Laporan berhasil dikirim');
    }


    public function index(Request $request)
    {
        $query = Report::with('images');

        // 🔍 SEARCH DATABASE
        if ($request->filled('q')) {
            $query->where('animal_type', 'LIKE', '%' . $request->q . '%');
        }

        $reports = $query->latest()->get();

        return view('pages.daftar-hewan', compact('reports'));
    }


    public function show(Report $report)
    {
        $report->load(['images', 'comments.user']);

        return view('pages.detail-hewan', compact('report'));
    }

    public function edit(Report $report)
    {
        // CEK KEPEMILIKAN
        if ($report->user_id !== auth()->id()) {
            abort(403);
        }

        return view('pages.edit-hewan', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        if ($report->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'animal_type' => 'required|string|max:100',
            'location'    => 'required|string|max:255',
            'description' => 'required|string',
            'condition'   => 'nullable|string|max:100',
            'phone'       => 'required|string|max:255',
        ]);

        $report->update([
            'animal_type' => $request->animal_type,
            'location'    => $request->location,
            'description' => $request->description,
            'condition'   => $request->condition,
            'phone'       => $request->phone,
        ]);

        return redirect()
            ->route('reports.show', $report->id)
            ->with('success', 'Laporan berhasil diperbarui');
    }

    public function destroy(Report $report)
    {
        // pastikan hanya pemilik laporan
        if ($report->user_id !== auth()->id()) {
            abort(403);
        }

        // hapus gambar (jika ada)
        foreach ($report->images as $image) {
            if (\Storage::disk('public')->exists($image->image_path)) {
                \Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }

        // hapus komentar
        $report->comments()->delete();

        // hapus laporan
        $report->delete();

        return redirect()
            ->route('reports.index')
            ->with('success', 'Laporan berhasil dihapus');
    }
}
