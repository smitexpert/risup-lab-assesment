<?php

namespace App\Services;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceService {
    public function store()
    {
        Attendance::create([
            'user_id' => Auth::user()->id,
            'attend_at' => now()->today()
        ]);
    }

    public function show($request)
    {
        if($request->has('date')) {
            $month = Carbon::createFromFormat('Y-m', $request->date)->format('m');
            $year = Carbon::createFromFormat('Y-m', $request->date)->format('Y');
            $attendances = Attendance::where('user_id', Auth::user()->id)->whereMonth('attend_at', $month)->whereYear('attend_at', $year)->get();

            if($request->date == now()->format('Y-m')) {
                $totalDays = now()->format('d');
            }
            else if($request->date > now()->format('Y-m')) {
                $totalDays = 0;
            }else{
                $totalDays = Carbon::createFromFormat('Y-m', $year.'-'.$month)->daysInMonth;
            }

        }else {
            $attendances = Attendance::where('user_id', Auth::user()->id)->whereMonth('attend_at', now()->today())->get();
            $totalDays = Carbon::now()->format('d');
        }

        $presents = [];

        foreach($attendances as $attendance)
            $presents[Carbon::createFromFormat('Y-m-d', $attendance->attend_at)->format('d')] = true;

        $calenders = [];

        for($i=1; $i<=$totalDays; $i++) {
            $calenders[] = [
                'date' => $i,
                'present' => (isset($presents[$i])) ? true : false
            ];
        }

        return ['calender' => $calenders, 'present' => count($presents), 'total_days' => $totalDays];
    }
}
