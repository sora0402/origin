@extends('layouts.app')

@section('content')
<div class="main_content">
    <div class="flex read_header pt-5 mr-6 justify-end" >

        <div class="p-5 bg-green-200 h-10 flex justify-center items-center rounded-lg">
            <a class="text-l text-blue-700 font-semibold" href="{{ route('read') }}">月毎に表示</a>
        </div>

        <div class="p-3 ml-5 bg-green-200 h-10 flex justify-center items-center rounded-lg">
            <a class="text-l text-blue-700 font-semibold" href="{{ route('read_job') }}">出来たことリストで表示</a>
        </div>

    </div>

        <div class="">
            <div class="justify-content-center side">
                <div class="col-md-8 w-10/12">
                    <div class="card">
                        <div class="mt-5 card-header text-xl text-center side">

                            <form action="{{ route('read') }}" method="post">
                                @csrf
                                <input type="hidden" name='date' value="{{ $calendar->getPreviousMonth() }}">
                                <button class="btn btn-outline-secondary float-left">前の月</button>
                            </form>

                            <span>{{ $calendar->getTitle() }}</span>

                            {{-- @if (isset($next)) --}}
                            <form action="{{ route('read') }}" method="post">
                                @csrf
                                <input type="hidden" name='date' value="{{ $calendar->getNextMonth() }}">
                                <button class="btn btn-outline-secondary float-right">次の月</button>
                            </form>
                            {{-- @else
                                <div class="float-right"></div>
                            @endif --}}
                        </div>
                        <div class="card-body bg-white">
                            {!! $calendar->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
