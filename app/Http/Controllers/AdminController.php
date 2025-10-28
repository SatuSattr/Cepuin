<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard with all reports.
     */
    public function index(Request $request): View
    {
        $statusFilter = $request->query('status');

        $reports = Report::query()
            ->with('user')
            ->when($statusFilter, fn ($query) => $query->where('status', $statusFilter))
            ->latest('incident_time')
            ->get();

        $statuses = [
            'dilaporkan' => 'Dilaporkan',
            'direview'   => 'Direview',
            'diproses'   => 'Diproses',
            'selesai'    => 'Selesai',
        ];

        return view('admin.dashboard', compact('reports', 'statuses', 'statusFilter'));
    }

    /**
     * Display aggregated student reporting data.
     */
    public function studentData(): View
    {
        $reportPairs = Report::query()
            ->selectRaw('user_id, reported_name, COUNT(*) as total_reports, MAX(incident_time) as last_report_at')
            ->with('user:id,name')
            ->groupBy('user_id', 'reported_name')
            ->orderByDesc('total_reports')
            ->orderBy('reported_name')
            ->get()
            ->map(fn (Report $report) => [
                'reporter_name' => optional($report->user)->name ?? 'Tidak diketahui',
                'reported_name' => $report->reported_name,
                'total_reports' => (int) $report->total_reports,
                'last_report_at' => $report->last_report_at,
            ]);

        $uniqueReporters = Report::query()->distinct('user_id')->count('user_id');
        $uniqueReported = Report::query()->distinct('reported_name')->count('reported_name');
        $totalReports = Report::query()->count();

        $mostActiveReporter = Report::query()
            ->selectRaw('user_id, COUNT(*) as total_reports')
            ->with('user:id,name')
            ->groupBy('user_id')
            ->orderByDesc('total_reports')
            ->first();

        $mostReportedStudent = Report::query()
            ->selectRaw('reported_name, COUNT(*) as total_reports')
            ->groupBy('reported_name')
            ->orderByDesc('total_reports')
            ->first();

        return view('admin.studentdata', [
            'reportPairs' => $reportPairs,
            'stats' => [
                'unique_reporters' => (int) $uniqueReporters,
                'unique_reported' => (int) $uniqueReported,
                'total_reports' => (int) $totalReports,
                'most_active_reporter' => $mostActiveReporter ? [
                    'name' => optional($mostActiveReporter->user)->name ?? 'Tidak diketahui',
                    'count' => (int) $mostActiveReporter->total_reports,
                ] : null,
                'most_reported_student' => $mostReportedStudent ? [
                    'name' => $mostReportedStudent->reported_name,
                    'count' => (int) $mostReportedStudent->total_reports,
                ] : null,
            ],
        ]);
    }

    /**
     * Update counselor note and status for the given report.
     */
    public function update(Request $request, Report $report): RedirectResponse
    {
        $validated = $request->validate([
            'status'          => 'required|in:dilaporkan,direview,diproses,selesai',
            'counselor_note'  => 'nullable|string',
        ]);

        $report->update($validated);

        return back()->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Remove the specified report from storage.
     */
    public function destroy(Report $report): RedirectResponse
    {
        if ($report->photo_path) {
            Storage::disk('public')->delete($report->photo_path);
        }

        $report->delete();

        return back()->with('success', 'Laporan berhasil dihapus.');
    }
}
