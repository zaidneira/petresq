<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EducationController extends Controller
{
    /* =======================
       ADMIN SIDE
    ======================== */

    // ADMIN: LIST
    public function index()
    {
        $educations = Education::latest()->get();
        return view('admin.edukasi.index', compact('educations'));
    }

    // ADMIN: FORM TAMBAH
    public function create()
    {
        return view('admin.edukasi.create');
    }

    // ADMIN: SIMPAN
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_size' => 'nullable|in:small,medium,large'

        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('edukasi', 'public');
        }

        Education::create([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'excerpt' => Str::limit(strip_tags($request->content), 120),
            'content' => $request->content,
            'image'   => $imagePath,
            'image_size' => $request->image_size ?? 'medium'
        ]);

        return redirect()->route('admin.edukasi.index');
    }

    // ADMIN: EDIT
    public function edit(Education $education)
    {
        return view('admin.edukasi.edit', compact('education'));
    }

    // ADMIN: UPDATE
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_size' => 'nullable|in:small,medium,large'

        ]);

        if ($request->hasFile('image')) {
            $education->image = $request->file('image')->store('edukasi', 'public');
        }

        $education->update([
            'title'   => $request->title,
            'slug'    => Str::slug($request->title),
            'excerpt' => Str::limit(strip_tags($request->content), 120),
            'content' => $request->content,
            'image_size' => $request->image_size ?? $education->image_size
        ]);

        return redirect()->route('admin.edukasi.index');
    }

    // ADMIN: HAPUS
    public function destroy(Education $education)
    {
        $education->delete();
        return back();
    }

    /* =======================
       USER SIDE
    ======================== */

    // USER: LIST
    public function publicIndex()
    {
        $educations = Education::latest()->get();
        return view('pages.edukasi', compact('educations'));
    }

    // USER: DETAIL
    public function show(Education $education)
    {
        return view('pages.edukasi-detail', compact('education'));
    }
}
