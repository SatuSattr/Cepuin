<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::query()
            ->with('user')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('student.dashboard', [
            'reports' => $reports,
            'title' => 'Dashboard Siswa',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create', [
            'title' => 'Buat Laporan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reported_name'   => 'required|string|max:255',
            'reported_class'  => 'required|string|max:255',
            'incident_time'   => 'required|date',
            'description'     => 'required|string',
            'photo_path'      => 'nullable|file|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'status'          => 'nullable|string|in:dilaporkan,direview,diproses,selesai',
            'counselor_note'  => 'nullable|string',
        ]);

        $validatedData['user_id'] = auth()->id();
        $validatedData['status'] = $validatedData['status'] ?? 'dilaporkan';
        $validatedData['counselor_note'] = $validatedData['counselor_note'] ?? null;

        if ($request->hasFile('photo_path')) {
            $validatedData['photo_path'] = $request->file('photo_path')->store('reports', 'public');
        }

        Report::create($validatedData);

        return redirect()
            ->route('student.dashboard')
            ->with('success', 'Laporan berhasil dikirim!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
