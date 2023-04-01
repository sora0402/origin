<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Calendar\CalendarView;
use App\Models\Contact;
///model
use App\Models\Event;
use App\Models\GoodJob;
use App\Models\Job;
use App\Models\Other;
use App\Models\Report;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{




    ///////////////////////////////[index]///////////////////////////////
    public function index()
    {

        $hello = "world";

        return view('index', compact('hello'));
    }




    ///////////////////////////////[ice_break]///////////////////////////////
    public function ice_break()
    {

        $user = Auth::user();
        $last_login = $user['last_login'];
        $good_job = new GoodJob;
        $job = new Job;

        if ($user->role == 'admin') {
            return redirect('admin_report');
        }


        if (isset($last_login) && $good_job->where('to_user_id', $user['id'])->where('created_at', '>', $last_login)->exists()) {

            $good_jobs_tmp = $good_job
                ->where('to_user_id', $user['id'])
                ->where('created_at', '>', $last_login)
                ->get();

            foreach ($good_jobs_tmp as $good_job_tmp) {

                $job_body = $job->where('id', $good_job_tmp['done_id'])->value('body');
                $good_at = $good_job_tmp['created_at'];
                $good_jobs[] = ['good_at' => $good_at, 'body' => $job_body];
            }
        } else {

            $good_jobs = null;
        }

        return view('ice_break', [
            "name" => $user['name'],
            "good_jobs" => $good_jobs,
        ]);
    }




    ///////////////////////////////[create_diary]///////////////////////////////
    public function create_diary(Request $request)
    {

        $user = Auth::user();
        $strtotime = "now -" . $user['time_difference'] . " hours";
        $date = date('Ymd', strtotime($strtotime));
        $today_diary = DB::table('diaries')->where('user_id', $user['id'])->where('date', $date)->value('id');
        $diary = new Diary();
        $carbon = new Carbon();
        $user_db = new User;

        $user_db = User::find($user['id']); //4.Likeクラスのインスタンスを作成
        $user_db->last_login = $carbon; //Likeインスタンスにreview_id,user_idをセット
        $user_db->save();

        if (!(isset($today_diary))) {



            $diary->create([
                'user_id' => auth()->id(),
                'date' => $date,
                'total_feeling' => $request->input('feeling')
            ]);
        } else {

            $diary->where('id', $today_diary)->update(['total_feeling' => $request->input('feeling')]);
        }

        return redirect('top');
    }




    ///////////////////////////////[top]///////////////////////////////
    public function top()
    {
        $user = Auth::user();
        $users = new User;
        $report = new Report();
        $job = new Job;
        $good_job = new GoodJob;
        $diary = new Diary;
        $event = new Event;

        if ($users->where('share_mode', '1')->exists()) {
            $hide_users = $users->where('share_mode', '1')->get();
            foreach ($hide_users as $hide_user) {
                $hide_user_id[] = $hide_user['id'];
            }
        } else {
            $hide_user_id = null;
        }

        if ($users->where('hide_share_mode', '1')->exists()) {
            $hide_share_users = $users->where('hide_share_mode', '1')->get();
            foreach ($hide_share_users as $hide_share_user) {
                $hide_share_user_id[] = $hide_share_user['id'];
            }
        } else {
            $hide_share_user_id = null;
        }

        if ($report->where('from_user_id', $user['id'])->exists()) {
            $hide_jobs = $report->where('from_user_id', $user['id'])->get();

            foreach ($hide_jobs as $hide_job) {
                $hide_job_id[] = $hide_job['id'];
            }
        } else {
            $hide_job_id = null;
        }

        $min = 1;
        $max = $job->count();

        $i = 0;
        while ($i < 21) {

            $job_id = rand($min, $max);
            $job_tmp = $job->select('id', 'user_id', 'body', 'assessment')->find($job_id);

            if (!(isset($job_tmp))) {
                continue;
            }

            if (isset($hide_job_id)) {
                if (in_array($job_tmp['id'], $hide_job_id)) {
                    continue;
                }
            }

            if (isset($hide_share_user_id)) {
                if (in_array($job_tmp['user_id'], $hide_share_user_id)) {
                    continue;
                }
            }

            if (isset($hide_user_id)) {
                if (in_array($job_tmp['user_id'], $hide_user_id)) {
                    continue;
                }
            }

            $job_tmp['checked'] = "";

            if ($good_job->where('from_user_id', $user['id'])->where('done_id', $job_tmp['id'])->exists()) {
                $job_tmp['checked'] = 1;
            }

            $jobs[] = $job_tmp;

            $i++;
        }

        ///////[↑JOBS DIARY↓]/////////

        $diary_last = $diary->where('user_id', $user['id'])
            ->latest()
            ->first();

        $job_last = $job->where('user_id', $user['id'])
            ->where('diary_id', $diary_last['id'])
            ->take(5)
            ->get();

        $event_last = $event
            ->where('user_id', $user['id'])
            ->where('diary_id', $diary_last['id'])
            ->take(5)
            ->get();


        $last[$diary_last['date']] = [$job_last, $event_last];
        $last['id'] = $diary_last['id'];

        $diaries['今日の日記'] = $last;

        ///////////////////////

        $diary_second = $diary->where('user_id', $user['id'])
            ->where('id', '<', $diary_last['id'])
            ->orderBy('id', 'desc')
            ->first();

        if ($diary_second) {

            $job_second = $job->where('user_id', $user['id'])
                ->where('diary_id', $diary_second['id'])
                ->take(5)
                ->get();

            $event_second = $event
                ->where('user_id', $user['id'])
                ->where('diary_id', $diary_second['id'])
                ->take(5)
                ->get();

            $second[$diary_second['date']] = [$job_second, $event_second];
            $second['id'] = $diary_second['id'];

            $diaries['前回の日記'] = $second;
        }

        //////////////////////////////

        $diary_rand = $diary->where('user_id', $user['id'])
            ->inRandomOrder()
            ->first();

        $job_rand = $job->where('user_id', $user['id'])
            ->where('diary_id', $diary_rand['id'])
            ->take(5)
            ->get();

        $event_rand = $event
            ->where('user_id', $user['id'])
            ->where('diary_id', $diary_rand['id'])
            ->take(5)
            ->get();


        $rand[$diary_rand['date']] = [$job_rand, $event_rand,];
        $rand['id'] = $diary_rand['id'];

        $diaries['ある日の日記'] = $rand;

        ///////////////////////////


        $calendar = new CalendarView(time());

        return view('top', [

            "calendar" => $calendar,
            "jobs" => $jobs,
            "diaries" => $diaries

        ]);
    }




    ///////////////////////////////[write]///////////////////////////////
    public function write()
    {
        return view('write');
    }

    ///////////////////////////////[read]///////////////////////////////

    public function read(Request $request)
    {

        //クエリーのdateを受け取る
        $date = $request->input("date");

        //dateがYYYY-MMの形式かどうか判定する
        if ($date && preg_match("/^[0-9]{4}-[0-9]{2}$/", $date)) {
            $date = strtotime($date . "-15");
        } else {
            $date = null;
        }

        //取得出来ない時は現在(=今月)を指定する
        if (!$date) $date = time();

        //カレンダーに渡す
        $calendar = new CalendarView($date);

        return view('read', [

            "date" => $date,
            "calendar" => $calendar,

        ]);
    }

    ///////////////////////////////[read_job]///////////////////////////////

    public function read_job(Request $request)
    {

        $user = Auth::user();
        $diary = new Diary;
        $job = new Job;

        $date = $request->input('date');

        if (!$date) {
            $date = date('Y-m');
        }

        $Y_m = explode('-', $date);
        $date_tmp = ($date . "-15");
        $dt = new Carbon($date_tmp);
        $this_month = $Y_m[0] . "年 " . $dt->copy()->month . "月";

        if ($date == date('Y-m')) {
            $next = null;
        } else {
            $next = $dt->copy()->addMonth()->format("Y-m");
        }

        $previous = $dt->copy()->subMonth()->format("Y-m");

        if (!$diary->where('user_id', $user['id'])->whereYear('date', $Y_m[0])->whereMonth('date', $Y_m[1])->exists()) {

            return view('read_job', [
                "this_month" => $this_month,
                "date" => $date,
                "next" => $next,
                "previous" => $previous,
                "message" => "この月のデータが見つかりませんでした。"
            ]);
        }

        $diary_records = $diary->where('user_id', $user['id'])->whereYear('date', $Y_m[0])->whereMonth('date', $Y_m[1])->get();


        foreach ($diary_records as $diary_record) {
            $dates[] = $diary_record['date'];
            $some_id[] = $diary_record['id'];

            if ($job->where('diary_id', $diary_record['id'])->exists()) {
                $jobs[] = $job->where('diary_id', $diary_record['id'])->get();
            } else {
                $message = ['body' => "この日は出来たことを登録していません。"];
                $jobs[] = ['0' => $message];
            }
        }

        return view('read_job', [
            "this_month" => $this_month,
            "date" => $date,
            "jobs" => $jobs,
            "some_id" => $some_id,
            "dates" => $dates,
            "next" => $next,
            "previous" => $previous,
            "num" => 0
        ]);
    }




    ///////////////////////////////[explanation]///////////////////////////////
    public function explanation()
    {
        return view('explanation');
    }




    ///////////////////////////////[config]///////////////////////////////
    public function config()
    {
        $user = Auth::user();
        $name = $user['name'];
        $share_mode = $user['share_mode'];
        $time_difference = $user['time_difference'];
        return view('config', [
            'name' => $name,
            'share_mode' => $share_mode,
            'time_difference' => $time_difference
        ]);
    }



    ///////////////////////////////[config]///////////////////////////////
    public function user_edit(Request $request)
    {

        $user_name = $request->input('name');

        $share_mode = 0;
        if ($request->input('share') == "on") {
            $share_mode = 1;
        }

        $time_difference = $request->input('time_difference');

        $user = Auth::user();

        $user_db = User::find($user['id']); //4.Likeクラスのインスタンスを作成
        $user_db->name = $user_name; //Likeインスタンスにreview_id,user_idをセット
        $user_db->share_mode = $share_mode;
        $user_db->time_difference = $time_difference;
        $user_db->save();

        return redirect('config');
    }




    ///////////////////////////////[diary_write]///////////////////////////////
    public function diary_write(Request $request)
    {

        $request->session()->regenerateToken();
        $user = Auth::user();

        $strtotime = "now -" . $user['time_difference'] . " hours";
        $date = date('Y-m-d', strtotime($strtotime));
        $today_diary = DB::table('diaries')->where('user_id', $user['id'])->where('date', $date)->value('id');


        $request->validate([
            'done1' => 'required'
        ]);

        $jobs = [
            $request->input('done1'),
            $request->input('done2'),
            $request->input('done3'),
            $request->input('done4'),
            $request->input('done5'),
            $request->input('done6'),
            $request->input('done7'),
            $request->input('done8'),
            $request->input('done9'),
            $request->input('done10')
        ];

        $assessment = [
            $request->input('rate1'),
            $request->input('rate2'),
            $request->input('rate3'),
            $request->input('rate4'),
            $request->input('rate5'),
            $request->input('rate6'),
            $request->input('rate7'),
            $request->input('rate8'),
            $request->input('rate9'),
            $request->input('rate10')
        ];

        $events = [
            $request->input('event1'),
            $request->input('event2'),
            $request->input('event3'),
            $request->input('event4'),
            $request->input('event5'),
            $request->input('event6'),
            $request->input('event7'),
            $request->input('event8'),
            $request->input('event9'),
            $request->input('event10')
        ];

        $feeling = [
            $request->input('event1_rate'),
            $request->input('event2_rate'),
            $request->input('event3_rate'),
            $request->input('event4_rate'),
            $request->input('event5_rate'),
            $request->input('event6_rate'),
            $request->input('event7_rate'),
            $request->input('event8_rate'),
            $request->input('event9_rate'),
            $request->input('event10_rate'),
        ];

        $job = new Job();

        foreach ($jobs as $num => $job_a) {

            if (isset($job_a)) {

                $job = new Job();

                $job->create([
                    'diary_id' => $today_diary,
                    'assessment' => $assessment[$num],
                    'user_id' => $user['id'],
                    'body' => $job_a
                ]);
            }
        }

        foreach ($events as $num => $event_a) {
            if (isset($event_a)) {

                $event = new Event();

                $event->create([
                    'feeling' => $feeling[$num],
                    'user_id' => $user['id'],
                    'diary_id' => $today_diary,
                    'body' => $event_a
                ]);
            }
        }

        $other_body = $request->input('other');

        if ($other_body) {

            $other = new Other();

            $other->create([
                'user_id' => $user['id'],
                'diary_id' => $today_diary,
                'body' => $request->input('other')
            ]);
        }

        return redirect('top');
    }

    ///////////////////////////////[contact]///////////////////////////////


    public function contact()
    {
        return view('contact');
    }

    ///////////////////////////////[contact_confirm]///////////////////////////////


    public function contact_confirm(Request $request)
    {

        $request->validate([
            'email' => 'nullable|email',
            'body' => 'required'
        ]);

        $body = $request->input('body');

        $email = $request->input('email');


        return view('contact_confirm', [
            'body' => $body,
            'email' => $email

        ]);
    }


    ///////////////////////////////[compleat]///////////////////////////////


    public function compleat(Request $request)
    {
        $request->session()->regenerateToken();

        $contact = new Contact();
        $user = Auth::user();
        $body = $request->input('body');
        $email = $request->input('email');

        $contact->create([
            'body' => $body,
            'user_id' => $user['id'],
            'other_email' => $email,
        ]);


        return view('compleat', []);
    }



    ///////////////////////////////[detail]///////////////////////////////
    public function detail(Request $request)
    {

        $id = $request->input('id');
        if (is_null($id)) {
            return;
        }

        $diary = new Diary();
        $job = new Job();
        $event = new Event();
        $other = new Other();
        $user = Auth::user();

        $detail['id'] = array("id" => $id);

        $diary_record = $diary->where('id', $id)->first();
        $job_records = $job->select('body', 'assessment')->where('diary_id', $id)->get();
        $event_records = $event->select('body', 'feeling')->where('diary_id', $id)->get();
        $other_records = $other->select('body')->where('diary_id', $id)->get();

        $date_tmp = $diary_record->date;

        $previous = $diary->where('user_id', $user['id'])->where('date', '<', $date_tmp)->orderBy('date', 'desc')->first();
        $next = $diary->where('user_id', $user['id'])->where('date', '>', $date_tmp)->orderBy('date', 'asc')->first();

        if (isset($previous['id'])) {
            $previous_id = $previous['id'];
        } else {
            $previous_id = null;
        }

        if (isset($next['id'])) {
            $next_id = $next['id'];
        } else {
            $next_id = null;
        }

        $date = date('Y年 m月 d日', strtotime($date_tmp));
        $feeling = $diary_record->total_feeling;
        $none = 0;

        if ($job_records) {
            $detail_jobs = $job_records;
        } else {
            $detail_jobs[0] = ['body' => '', 'assessment' => ''];
            $none++;
        }


        if ($event_records) {
            $detail_event = $event_records;
        } else {
            $detail_events[0] = ['body' => '', 'feeling' => ''];
            $none++;
        }


        if ($other_records) {
            $detail_others = $other_records;
        } else {
            $detail_others[0] = ['body' => '', 'feeling' => ''];
            $none++;
        }


        if ($none == 3) {
            $message = '日記は書いていません';
        } else {
            $message = '';
        }

        return view('detail', [
            'feeling' => $feeling,
            'message' => $message,
            'date' => $date,
            'next' => $next_id,
            'previous' => $previous_id,
            'jobs' => $detail_jobs,
            'events' => $detail_event,
            'others' => $detail_others
        ]);
    }


    ///////////////////////////////[admin]///////////////////////////////
    ///////////////////////////////[admin_report]///////////////////////////////

    public function admin_report()
    {
        $user = Auth::user();
        if($user['role'] != "admin"){
            return redirect('top');
        }
        $user_db = new User;
        $report = new Report;
        $job = new Job;

        $user_count = $user_db->count();
        $report_count = $report->count();

        $danger_users = $report->select('to_user_id')
            ->selectRaw('COUNT(to_user_id) as danger_index')
            ->groupBy('to_user_id')
            ->orderBy('danger_index')
            ->limit(20)
            ->get();

        foreach ($danger_users as $danger_user) {
            $danger_body = [];
            $danger_user_id[] = $danger_user['to_user_id'];
            $danger_user_count[] = $danger_user['danger_index'];
            $danger_report_records = $report->where('to_user_id', $danger_user['to_user_id'])->get();

            foreach ($danger_report_records as $danger_report) {
                $body = $job->where('id', $danger_report['done_id'])->value('body');
                $danger_body[] = $body;
            }

            $danger_reports[] = $danger_body;
        }

        return view('admin_report', [
            'danger_user_id' => $danger_user_id,
            'danger_user_count' => $danger_user_count,
            'danger_reports' => $danger_reports
        ]);
    }

    ///////////////////////////////[admin_contact]///////////////////////////////
    public function admin_contact()
    {
        $user = Auth::user();
        if($user['role'] != "admin"){
            return redirect('top');
        }
        $contact = new Contact();
        $user_db = new User; 
        $all_contacts = $contact->paginate(5);

        foreach($all_contacts as $contact){
            $user_info[] = $user_db->find($contact['user_id']);
        }

        return view('admin_contact', [
            'all_contacts' => $all_contacts,
            'user_info' => $user_info
        ]);
    }

    ///////////////////////////////[admin_authority]///////////////////////////////

    public function admin_authority()
    {
        $user = Auth::user();
        if($user['role'] != "admin"){
            return redirect('top');
        }
        $user_db = new User;
        $all_user = $user_db->paginate(30);

        return view('admin_authority', [
            'all_user_list' => $all_user
        ]);
    }
}
