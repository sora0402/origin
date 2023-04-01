@extends('layouts.app')

@section('content')
    <div class="flex read_header pt-5 mr-6 justify-end">

        <div class="p-5 bg-green-200 h-10 flex justify-center items-center rounded-lg">
            <a class="text-l text-blue-700 font-semibold" href="{{ route('read') }}">月毎に表示</a>
        </div>

        <div class="p-3 ml-5 bg-green-200 h-10 flex justify-center items-center rounded-lg">
            <a class="text-l text-blue-700 font-semibold" href="{{ route('read_job') }}">出来たことリストで表示</a>
        </div>

    </div>

    <div class="side mt-10">

        <div>
            <form action="{{ route('read_job') }}" method="post">
                @csrf
                <input name="date" type="hidden" value="{{ $previous }}">
                <button type="submit">前の月</button>
            </form>
        </div>

        <div>
            <h1 class="text-xl mx-20">{{ $this_month }}</h1>
        </div>

        <div @if (is_null($next)) class="invisible" @endif>
            <form action="{{ route('read_job') }}" method="post">
                @csrf
                <input name="date" type="hidden" value="{{ $next }}">
                <button type="submit">次の月</button>
            </form>
        </div>

    </div>

    @if (isset($message))
        <h2 class="text-center">{{ $message }}</h2>
    @else
        <div class="w-3/4 margin_auto bg-green-100 rounded-lg p-4">

            @foreach ($jobs as $some_job)
                <div class="bg-green-200 m-20 rounded-lg p-4">
                    <p class="text-center mb-3 text-xl">{{ $dates[$num] }}</p>

                    <div class="flex justify-center margin_auto py-1 w-2/12 bg-green-300 rounded-lg" >
                        <form action="{{ route('detail') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $some_id[$num] }}">
                            <button type="submit">この日記を読む</button>
                        </form>
                    </div>

                    @foreach ($some_job as $job)
                        <div class="side bg-blue-50 margin_auto w-1/2 rounded-lg">
                            <p class="text-center p-1">{{ $job['body'] }}</p>
                            @if (isset($job['assessment']))
                                <div class=" ml-4 side assessment">
                                    @for ($i = 1; $i < $job['assessment']; $i++)
                                        <img src="./img/star.png" width="32">
                                    @endfor
                                </div>
                            @endif
                        </div>
                    @endforeach
{{--
                    <div class="flex justify-center margin_auto p-2 w-1/6 mb-2 bg-green-300" >
                        <form action="{{ route('detail') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $some_id[$num] }}">
                            <button type="submit">この日記を読む</button>
                        </form>
                    </div>

                    --}}
                </div>
                @php($num++) @endphp
            @endforeach
        </div>
    @endif

@endsection
