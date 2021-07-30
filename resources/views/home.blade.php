@extends('layouts.app')

@section('content')
    <div class=" container">
        <h1 class="title">TELEGRAM BOT</h1>
            <a class="link_title" href="{{route('users.index')}}">
                <div class="box_box">
                        <h4>Бот қолданушылары</h4>
                </div>
            </a>
            <a class="link_title" href="{{route('telegram')}}">
                <div class="box_box" style="margin-top: 20px;">
                       <h4>Рассылка</h4>
                </div>
            </a>
    </div>
@endsection
