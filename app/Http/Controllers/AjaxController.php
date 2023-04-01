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
///model

use App\Models\GoodJob;
use App\Models\Report;
use App\Models\User;

class AjaxController extends Controller
{
    //
    public function good_job(Request $request)
    {
        $from_user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $data = $request->data; //2.投稿idの取得
        $to_user_id = $data[1];
        $job_id = $data[0];

        $already_good = GoodJob::where('from_user_id', $from_user_id)->where('done_id', $job_id)->first(); //3.

        if (!$already_good) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $good = new GoodJob; //4.Likeクラスのインスタンスを作成
            $good->done_id = $job_id; //Likeインスタンスにreview_id,user_idをセット
            $good->to_user_id = $to_user_id;
            $good->from_user_id = $from_user_id;
            $good->save();
            $review = 'success';
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            GoodJob::where('to_user_id', $to_user_id)->where('done_id', $job_id)->delete();
            $review = '';
        }
        return response()->json($review); //6.JSONデータをjQueryに返す

    }

    public function report(Request $request)
    {
        $from_user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $data = $request->data; //2.投稿idの取得
        $to_user_id = $data[1];
        $job_id = $data[0];

        $report = new Report; //4.Likeクラスのインスタンスを作成
        $report->done_id = $job_id; //Likeインスタンスにreview_id,user_idをセット
        $report->to_user_id = $to_user_id;
        $report->from_user_id = $from_user_id;
        $report->save();
        $review = 'success';

        return response()->json($review);
    }

    public function role(Request $request)
    {
        $data = $request->input('data', []);
    
        if (count($data) < 2) {
            return response()->json(['error' => 'Invalid data provided.']);
        }
    
        $user_id = $data[0];
        $role = $data[1];
    
        $user_db = User::find($user_id); 
        
        if (!$user_db) {
            return response()->json(['error' => 'User not found.']);
        }
    
        $user_db->role = $role;
        $user_db->save();
    
        return response()->json(['success' => true]);
    }

    public function share_mode(Request $request)
    {
        $data = $request->input('data', []);
    
        if (count($data) < 2) {
            return response()->json(['error' => 'Invalid data provided.']);
        }
    
        $user_id = $data[0];
        $share_mode = $data[1];
    
        $user_db = User::find($user_id); 
        
        if (!$user_db) {
            return response()->json(['error' => 'User not found.']);
        }
    
        $user_db->hide_share_mode = $share_mode;
        $user_db->save();
    
        return response()->json(['success' => true]);
    }
}
