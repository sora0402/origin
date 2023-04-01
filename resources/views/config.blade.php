@extends('layouts.app')

@section('content')
    <h1 class="m-10 text-center text-2xl">設定</h1>

    <div class="rounded-xl w-3/4 margin_auto bg-green-100 p-10">

        <form action="{{ route('user_edit') }}" method="post">
            @csrf

            <div>
                <p class="text-center mt-5" id="name">ニックネームの変更</p>

                <div class="text-center">
                    <label for="name">ニックネーム</label>
                    <input class="margin_auto" type="text" name="name" value="{{ old('name', $name) }}">
                </div>
            </div>

            <div>
                <p class="text-center mt-20">出来たことの共有許可</p>

                <div class="text-center">
                    <input class="margin_auto" type="checkbox" id="share" name="share" @if ($share_mode == 1) checked @endif>
                    <label for="share">共有不可</label>
                </div>
            </div>

            <div>
                <p class="text-center mt-20">日付変更時間設定</p>
                <div class="text-center">
                    <p class="text-center">(例:日付変更時間が[5]の場合→2023年3月2日の5:00:00まで2023年3月1日の日記として扱われる）</p>

                    <p class="mt-5 text-center">日付変更時間</p>
                    <input class=" margin_auto" type="number" id="time_difference" name="time_difference" min="0" max="12"
                        value="{{ old('time_difference', $time_difference) }}">
                </div>
            </div>
            <div class="margin_auto w-fit h-fit mt-10 p-4 bg-green-200 rounded-xl"><button class="text-center " type="submit">変更する</button></div>
        </form>

    </div>
@endsection
