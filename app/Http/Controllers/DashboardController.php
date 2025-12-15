<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Application::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by name or phone
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('student_name', 'like', '%' . $request->search . '%')
                    ->orWhere('parent_name', 'like', '%' . $request->search . '%')
                    ->orWhere('parent_phone', 'like', '%' . $request->search . '%');
            });
        }

        // Sort by date
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $applications = $query->paginate(15);

        $stats = [
            'total' => Application::count(),
            'pending' => Application::where('status', 'pending')->count(),
            'approved' => Application::where('status', 'approved')->count(),
            'rejected' => Application::where('status', 'rejected')->count(),
            'missing_documents' => Application::where('status', 'missing_documents')->count(),
        ];

        return view('dashboard', compact('applications', 'stats'));
    }

    public function show(Application $application)
    {
        return view('application-detail', compact('application'));
    }

    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected,missing_documents',
            'admin_notes' => 'nullable|string',
        ]);

        $application->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->back()->with('success', 'تم تحديث حالة الطلب بنجاح');
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('dashboard')->with('success', 'تم حذف الطلب بنجاح');
    }
}
