@extends('layouts.detail')

@section('content')
    <div class=" body_letter">
        <div class="letter">
            <div class="flex justify-center items-center w-3/4 mx-auto">
                <div class="side_page w-1/4 text-center">
                    @if (isset($previous))
                        <form action="{{ route('detail') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $previous }}">
                            <button class="text-2xl" type="submit">前のページ<br>←</button>
                        </form>
                    @endif
                </div>




                <div class="center mx-20 p-10 justify-center items-center">

                    <h2 class="mx-10 text-xl mt-3 min-w-max">{{ $date }}</h2>
                    <div >
                        @if ($feeling == 1)
                            <img class="mx-auto p-1 rounded-2" src="./img/good.png" alt="" hight="40" width="40">
                        @else
                            <img class="mx-auto p-1 rounded-2" src="./img/bad.png" alt="" hight="40" width="40">
                        @endif
                    </div>
                </div>

                <div class="side_page w-1/4 text-center">
                    @if (isset($next))
                        <form action="{{ route('detail') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $next }}">
                            <button class="text-2xl" type="submit">次のページ<br>→</button>
                        </form>
                    @endif
                </div>

            </div>


            @if (isset($message))
                <h2>{{ $message }}</h2>
            @endif

            <div class="main w-3/4 margin_auto">

                @foreach ($jobs as $job)
                    <div class="p-2 bg-green-100 m-2 border-gray-800  flex justify-center items-center">
                        <p class="mr-5">{{ $job['body'] }}</p>
                        @if (isset($job['assessment']))
                            <div class="flex assessment">
                                @for ($i = 1; $i < $job['assessment']; $i++)
                                    <img src="./img/star.png" hight="30" width="30">
                                @endfor
                            </div>
                        @endif

                    </div>
                @endforeach

                @foreach ($events as $event)
                    <div class="p-2 bg-green-100 m-2 border-gray-800  flex justify-center items-center">
                        <p class="mr-5">{{ $event['body'] }}</p>
                        @if (isset($event['feeling']))
                            <div class="feeling">
                                @if ($event['feeling'] == 4)
                                    <img src="./img/fanny.png" alt="" hight="30" width="30">
                                @elseif($event['feeling'] == 3)
                                    <img src="./img/angry.png" alt="" hight="30" width="30">
                                @elseif($event['feeling'] == 2)
                                    <img src="./img/peace.png" alt="" hight="30" width="30">
                                @elseif($event['feeling'] == 1)
                                    <img src="./img/cry.png" alt="" hight="30" width="30">
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach

                @foreach ($others as $other)
                    <div class="p-2 bg-green-100 m-2 border-gray-800 min-h-10  flex justify-center items-center h-80">
                        <p>{{ $other['body'] }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
