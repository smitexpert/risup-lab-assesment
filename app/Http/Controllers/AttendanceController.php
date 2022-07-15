<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Services\AttendanceService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::where('user_id', Auth::user()->id)->whereDate('attend_at', now()->today())->first();
        return view('attendance.index', compact('attendance'));
    }

    public function store(Request $request, AttendanceService $attendanceService)
    {
        $attendanceService->store();
        return redirect()->route('attendance.index');
    }

    public function show(Request $request, AttendanceService $attendanceService)
    {
        $data = $attendanceService->show($request);
        $attendances = $data['calender'];
        $present = $data['present'];
        $total_days = $data['total_days'];
        return view('attendance.show', compact('attendances', 'present', 'total_days'));
    }
}
