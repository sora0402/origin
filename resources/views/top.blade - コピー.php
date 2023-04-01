@extends('layouts.app')
{{--@extends('layouts.calendar')--}}


<body>

    @include('header')
    <div class="main side">

        <div class="mine_content">

            <div class="side">
                @foreach ($diaries as $title => $diary)
                    <div>
                        <h3>{{ $title }}</h3>
                        <div>
                            @foreach ($diary as $day => $diary_things)
                            @if($day != 'id')
                                <div>
                                    <h4>{{ $day }}</h4>
                                    @foreach ($diary_things as $diary_thing)
                                        <div>
                                            @foreach ($diary_thing as $thing)
                                                <div class="side">
                                                    <p>{{ $thing['body'] }}</p>

                                                    @if (isset($thing['feeling']))
                                                        <div class="feeling">
                                                            @if ($thing['feeling'] == 4)
                                                                <img src="./img/fanny.png" alt="" hight="30"
                                                                    width="30">
                                                            @elseif($thing['feeling'] == 3)
                                                                <img src="./img/angry.png" alt="" hight="30"
                                                                    width="30">
                                                            @elseif($thing['feeling'] == 2)
                                                                <img src="./img/peace.png" alt="" hight="30"
                                                                    width="30">
                                                            @elseif($thing['feeling'] == 1)
                                                                <img src="./img/cry.png" alt="" hight="30"
                                                                    width="30">
                                                            @endif
                                                        </div>
                                                    @endif

                                                    @if (isset($thing['assessment']))
                                                        <div class="side assessment">
                                                            @for ($i = 1; $i < $thing['assessment']; $i++)
                                                                <img src="./img/star.png" hight="30" width="30">
                                                            @endfor
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            @else
                            <form action="{{route('detail')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$diary_things}}">
                                <button type="submit">この日記を読む</button>
                            </form>
                            @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ $calendar->getTitle() }}</div>
                            <div class="card-body">
                                {!! $calendar->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="side_content">
            <h3>みんなの出来たこと</h3>
            @foreach ($jobs as $job)
                <div class="job job_{{ $job['id'] }}-{{ $job['user_id'] }}">
                    <p>{{ $job['body'] }}</p>
                    <button id="{{ $job['id'] }}-{{ $job['user_id'] }}"
                        class="{{ $job['id'] }}-{{ $job['user_id'] }} good_button @if ($job['checked']) checked @endif"><img
                            src="./img/heart.png" alt=""></button>
                    <button id="{{ $job['id'] }}-{{ $job['user_id'] }}" class="report">非表示に設定する</button>
                </div>
            @endforeach
        </div>

    </div>

    <div><img src="./img/heart.png" alt="" class="hidden fixed"></div>

</body>

</html>
