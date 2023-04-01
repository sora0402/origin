@extends('layouts.app')

@section('content')
    <h1 class="text-center m-10 text-xl">お問い合わせ内容確認</h1>
    <div class="text-center bg-white w-3/4 mx-auto mt-15">
        <h2 class="p-5">以下のお問い合わせ内容でお間違いありませんか？</h2>

        @isset($email)
            <div class="bg-gray-100 p-2 m-5">
                <p>メールアドレス</p>
                <p>{{ $email }}</p>
            </div>
        @endisset
        <div class="bg-gray-100 p-2 m-5">
            <p>本文</p>
            <p>{{ $body }}</p>
        </div>
        <div class="p-5">
            <form action="{{ 'compleat' }}" method="post">
                @csrf
                <input type="hidden" value="{{ $email }}" name="email">
                <input type="hidden" value="{{ $body }}" name="body">
                <button class="p-2 bg-green-100" type="submit">送信する</button>
            </form>
        </div>

    </div>
@endsection
