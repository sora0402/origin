<!DOCTYPE html>
@extends('layouts.app')

@section('content')


    <div class="text-center bg-green-100 p-20 m-20 rounded-2xl">
        <h1 class="m-20 text-4xl">「今日私が出来たこと」</h1>
        <p class="text-3xl p-10 mb-10">
            このサイトでは、<br>
            今日あなたが達成したことや取り組んだことを記録、蓄積して <br>
            振り返ることにより自分自身の目標達成や自己受容に役立ちます。<br>
            <br>
            また他の人の出来たことを見ることによって<br>
            新たな気づきを得るのに役立ちます。<br>
            <br>
            出来たことの共有は <a class="text-blue-600" href="{{ route('config') }}">設定</a> より変更できます。</p>
        </p>


    </div>
@endsection
