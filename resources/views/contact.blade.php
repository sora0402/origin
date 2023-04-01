@extends('layouts.app')

@section('content')
    <h1 class="text-center m-10 text-xl">お問い合わせ</h1>
    <div class="text-center bg-white w-3/4 mx-auto mt-15">
        <form action="{{ route('contact_confirm') }}" method="post">
            @csrf
            <p class="p-5 text-xs text-red-400">下記の必要事項を記入してください</p>

            <p class="p-5">お問い合わせ内容</p>

            @if ($errors->has('body'))
                <p class="text-xs text-red-400">[{{ $errors->first('body') }}]</p>
            @endif

            <textarea class="mb-5 w-10/12" name="body" id="" cols="30" rows="10"></textarea>

            <p class="p-5">登録しているメール以外の連絡先を指定する場合はこちらに記入してください</p>

            @if ($errors->has('email'))
                <p class="text-xs text-red-400">[{{ $errors->first('email') }}]</p>
            @endif

            <input class="w-10/12" type="text" name="email">
<div class="pb-5">
            <button class="mx-auto mt-10 bg-green-200 block p-2" type="submit" value="{{old('email')}}">送信する</button>
        </form>
    </div>
    </div>
@endsection
