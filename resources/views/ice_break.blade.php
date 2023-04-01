@extends('layouts.non')

@section('content')

    <!--------------------------------------- top --------------------------------------->
    <p class="text-center pt-6 text-lg">what's up</p>

    <div class="title text-center m-10">

        <h1 class="text-3xl text-center m-2.5">{{ $name }}!今日の調子はどうだい？</h1>
        <div class="side  justify-center p-10 mt-20">
            <img src=".\img\good.png".png" id="good_botton" class="feeling_button" onclick="goodClick()" alt="good">
            <img src=".\img\bad.png".png" id="bad_botton"class="feeling_button" onclick="badClick()" alt="bad">
        </div>
    </div>



    <div class="h-full good_message hidden_js static m-4 text-center">
        <p class="text-3xl mt-16 ">いい調子みたいだね！</p>
        <div class=" md (768px) h-full">
            @if (isset($good_jobs))
                <div class="">
                    <div>
                        <p class="text-3xl m-4 radial">{{ $name }}の出来たことのいいねが押されたよ！</p>
                        @foreach ($good_jobs as $good_job)
                            <div class="side">

                                <p class="mr-5">{{ $good_job['good_at'] }}</p>

                                <p class="ml-5">[ {{ $good_job['body'] }} ]</p>

                            </div>
                        @endforeach
                    </div>
            @endif
        </div>

        <div class="absolute left-1/4 bottom-0 mb-10 text-center w-6/12">
            <h4 class="mb-5 text-2xl">さあ日記を書いてみよう</h4>
            <form action="{{ route('create_diary') }}" method="post">
                @csrf
                <input type="hidden" name="feeling" value="1">
                <button class="bg-green-300 p-2 rounded-md mb-10" type="submit">日記を書く</button>
            </form>
        </div>
    </div>

    <div class="h-full bad_message hidden_js static m-4 text-center">
        <p class="text-3xl mt-16 ">そうかぁ、辛いときは誰かに相談してみるのもいいかもね！</p>
        <div class=" md (768px) h-full">
            @if (isset($good_jobs))
                <div class="">
                    <div>
                        <p class="text-3xl m-4 radial">{{ $name }}の出来たことのいいねが押されたよ！</p>
                        @foreach ($good_jobs as $good_job)
                            <div class="side">

                                <p class="mr-5">{{ $good_job['good_at'] }}</p>

                                <p class="ml-5">[ {{ $good_job['body'] }} ]</p>

                            </div>
                        @endforeach
                    </div>
            @endif
        </div>

        <div class="absolute left-1/4 bottom-0 mb-10 text-center w-6/12">
            <h4 class="mb-5 text-2xl">さあ日記を書いてみよう</h4>
            <form action="{{ route('create_diary') }}" method="post">
                @csrf
                <input type="hidden" name="feeling" value="0">
                <button class="bg-green-300 p-2 rounded-md mb-10" type="submit">日記を書く</button>
            </form>
        </div>
    </div>


@endsection
