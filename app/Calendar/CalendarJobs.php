<?php

namespace App\Calendar;

use Carbon\Carbon;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;

class CalendarJobs
{
    protected $carbon;

    function __construct($date)
    {
        $this->carbon = new Carbon($date);
    }

    function JobArray()
    {
        $user = Auth::user();
        $diary_month = $this->carbon->copy()->month;
        $diary = new Diary;

        if ($diary_month < 10) {

            $diary_month_tmp = "0" . $diary_month;

            $diary_month = $diary_month_tmp;
        }

        $diary_year = $this->carbon->copy()->year;
        $last_day = $this->carbon->copy()->endOfMonth();
        $diary_array = [];

        for ($i = 0; $i < (int)$last_day->format('d'); $i++) {

            if ($i < 10) {

                $diary_day = (string)$i;
                $diary_day = "0".$diary_day;

                $diary_date = $diary_year . '-' . $diary_month . '-' . $diary_day;

                $diary_array[] = $diary->select('total_feeling','date', 'id')->where('user_id', $user['id'])->where('date', $diary_date)->get();
            } else {
                $diary_day = (string)$i;

                $diary_date = $diary_year . '-' . $diary_month . '-' . $diary_day;

                $diary_array[] = $diary->select('total_feeling', 'date', 'id')->where('user_id', $user['id'])->where('date', $diary_date)->get();
            }
        }

        return $diary_array;
    }
}
