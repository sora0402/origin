@extends('layouts.app')

@section('content')
    <div class="main flex"">

        <div class="mine_content  w-9/12">

            <div class="diary_contents  w-10/12 my-10">
                @foreach ($diaries as $title => $diary)
                    <div class="diary bg-green-100 rounded-xl">
                        <h3 class="rounded-t-xl bg-green-200 title p-2">{{ $title }}</h3>
                        <div>
                            @foreach ($diary as $day => $diary_things)
                                @if ($day != 'id')
                                    <div >
                                        <h4 class="text-center m-2">{{ $day }}</h4>
                                        @foreach ($diary_things as $diary_thing)
                                            <div class="">
                                                @foreach ($diary_thing as $thing)
                                                    <div class="flex rounded-xl bg-blue-50 m-2 p-1 ">
                                                        <p class="text-center inline-block w-7/12 m-1">{{ $thing['body'] }}</p>

                                                        @if (isset($thing['feeling']))
                                                            <div class="feeling side m-auto w-5/12 justify-items-end">
                                                                @if ($thing['feeling'] == 4)
                                                                    <img class="max-h-8" src="./img/fanny.png" alt="" 
                                                                        width="32" height="32">
                                                                @elseif($thing['feeling'] == 3)
                                                                    <img class="max-h-8" src="./img/angry.png" alt=""
                                                                        width="32" height="32">
                                                                @elseif($thing['feeling'] == 2)
                                                                    <img class="max-h-8" src="./img/peace.png" alt=""
                                                                        width="32" height="32">
                                                                @elseif($thing['feeling'] == 1)
                                                                    <img class="max-h-8" src="./img/cry.png" alt=""
                                                                        width="32" height="32">
                                                                @endif
                                                            </div>
                                                        @endif

                                                        @if (isset($thing['assessment']))
                                                            <div class="side">
                                                                @for ($i = 0; $i < $thing['assessment']; $i++)
                                                                    <img class="max-h-7" src="./img/star.png" hight="32" width="32">
                                                                @endfor
                                                            </div>

                                                        @else
                                                        <div class=""></div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                <div class="object-bottom w-full text-center">
                                    <form action="{{ route('detail') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $diary_things }}">
                                        <button type="submit">この日記を読む</button>
                                    </form>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class=" w-10/12 m-auto">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="rounded-t-xl title card-header">{{ $calendar->getTitle() }}</div>
                            <div class="card-body bg-white">
                                {!! $calendar->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="side_content w-3/12 rounded-xl mt-10 mr-10 bg-green-100">
            <h3 class="title p-2 bg-green-200">みんなの出来たこと</h3>
            @foreach ($jobs as $job)
                <div class="job m-10 p-2 job_{{ $job['id'] }}-{{ $job['user_id'] }}">
                    <p class="text-center p2 text-lg m">{{ $job['body'] }}</p>
                    <div class="side p-1">
                        <button id="{{ $job['id'] }}-{{ $job['user_id'] }}"
                            class="{{ $job['id'] }}-{{ $job['user_id'] }} good_button @if ($job['checked']) checked @endif"><img
                                src="./img/heart.png" alt="" width="16px"></button>
                        <button id="{{ $job['id'] }}-{{ $job['user_id'] }}" class="report text-xs">非表示に設定する</button>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <div><img src="./img/heart.png" alt="" class="hidden_js fixed"></div>
    </div>
@endsection
