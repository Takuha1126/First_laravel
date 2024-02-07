@extends('layouts.add')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="main">
    <div class="main__inner">
        <div class="main__title">
            <p class="main__title-ttl">{{Auth::user()->name()}}さんお疲れ様です</p>
        </div>
        <div class="main__button">
            <form action="/" method="post">
                @csrf
            <div class="work__button">
                <input type="hidden" name="user_id" value="user_id">
                <button class="start__button" name="start_time" value="{{Auth::user()->id">勤務開始</button>
                <button class="end__button" name="end_time">勤務終了</button>
            </div>
            </form>
            <div class="rest__button">
                <button class="rest__start-button">休憩開始</button>
                <button class="rest__end-button">休憩終了</button>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="footer_title">
        <small class="footer__small">Atte,inc.</small>
    </div>
</footer>
@endsection
