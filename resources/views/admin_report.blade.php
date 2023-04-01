@extends('layouts.admin')

@section('content')
    <div>
        <h2 class="text-center m-5 text-xl">非表示設定ユーザー上位10件</h2>
        <div class="p-5 bg-gray-100 m-5 text-center">
            @foreach ($danger_reports as $num => $danger_body)
            <div class="p-5 m-5 bg-white">
                <p>user_id:{{$danger_user_id[$num]}}</p>
                <p>非表示に設定された回数{{$danger_user_count[$num]}}</p>
                <button id="b{{$num}}" class="open_button bg-yellow-100 rounded-xl p-2">非表示に設定された内容を表示</button>
                <ul class="hidden_js none_js list_b{{$num}}">
                    @foreach($danger_body as $body)
                        <li>{{$body}}<li>
                    @endforeach
                </ul>
                
            </div>
                
            @endforeach
        </div>
    </div>
@endsection