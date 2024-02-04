@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="main">
    <div class="main__inner">
        <div class="main__title">
            <p class="main__title-p">会員登録</p>
        </div>
        <div class="main__item">
            <form class="form" action="/register"  method="post">
                @csrf
                <div class="main__name">
                    <input type="text" name="name" placeholder="名前" value="{{ old('name') }}">
                </div>
                <div class="main__email">
                    <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email')}}">
                </div>
                <div class="main__password">
                    <input type="password" name="password" placeholder="パスワード" >
                </div>
                <div class="main__check">
                    <input type="password" name="check" placeholder="確認用パスワード">
                </div>
                <div class="button">
                    <button class="button__submit">会員登録</button>
                </div>
            </form>
            <div class="login">
                <form class="form__second">
                    @csrf
                    <div class="login__item">
                        <p class="login__p">アカウントをお持ちの方はこちらから</p>
                        <a class="login__button" href="/login">ログイン</a>
                    </div>
                </form>
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
