<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__title">
                <a class="header__title-ttl" href="/">Atte</a>
            </div>
            <nav class="nav">
                <form>
                    <a class="home__button" href="/">ホーム</a>
                </form>
                <form>
                    <a class="content__button">日付</a>
                </form>
                <form>
                    <a class="login__button" href="/login">ログイン</a>
                </form>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>