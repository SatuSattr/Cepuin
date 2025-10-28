<?php

namespace App\Http\Controllers;

use App\Models\report;
use Auth;
use DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $reports = report::all();

        return view('student.dashboard', compact('reports', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1️⃣ Validasi dulu input dari form
        $validatedData = $request->validate([
            'reported_name'   => 'required|string',
            'reported_class'  => 'required|string',
            'incident_time'   => 'required|date',
            'description'     => 'required|string',
            'photo_path'      => 'nullable|file|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'status'          => 'nullable|string',
            'counselor_note'  => 'nullable|string',
        ]);

        // 2️⃣ Tambahkan field user_id manual
        $validatedData['user_id'] = auth()->id();

        // 3️⃣ Simpan file foto (kalau ada)
        if ($request->hasFile('photo_path')) {
            $validatedData['photo_path'] = $request->file('photo_path')->store('photos', 'public');
        }

        // 4️⃣ Simpan ke database
        Report::create($validatedData);

        // 5️⃣ Redirect
        return redirect()->route('student.dashboard')->with('success', 'Laporan berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $reports = report::findOrFail($id);

        return view('student.show', compact('reports', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $reports = report::findOrFail($id);
        return view('student.edit', compact('reports', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reports = report::findOrFail($id);

        // 1️⃣ Validasi dulu input dari form
        $validatedData = $request->validate([
            'reported_name'   => 'required|string',
            'reported_class'  => 'required|string',
            'incident_time'   => 'required|date',
            'description'     => 'required|string',
            'photo_path'      => 'nullable|file|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'status'          => 'nullable|string',
            'counselor_note'  => 'nullable|string',
        ]);

        // 2️⃣ Tambahkan field user_id manual
        $validatedData['user_id'] = auth()->id();

        // 3️⃣ Simpan file foto (kalau ada)
        if ($request->hasFile('photo_path')) {
            $validatedData['photo_path'] = $request->file('photo_path')->store('photos', 'public');
        }

        // 4️⃣ Simpan ke database
        $reports->update($validatedData);

        // 5️⃣ Redirect
        return redirect()->route('student.dashboard')->with('success', 'Laporan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
