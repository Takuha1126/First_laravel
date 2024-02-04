@extends('layouts.add')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="main">
    <div class="main__ttl">
    <div class="first__page">
        <!--ページネーション-->
    </div>
    <div class="main__table">
        <table class="main__table-ttl">
            <tr class="main__table-title">
                <th class="main__table-th">名前</th>
                <th class="main__table-th">勤務開始</th>
                <th class="main__table-th">勤務終了</th>
                <th class="main__table-th">休憩時間</th>
                <th class="main__table-th">勤務時間</th>
            </tr>
            <tr class="main__table-about">
                <td class="main__table-td">
                    <input  type="text" name="name" value="サンプルテキスト">
                </td>
                <td class="main__table-td">
                    <input type="type" name="start__time" value="サンプルテキスト">
                </td>
                <td class="main__table-td">
                    <input type="type" name="end__time" value="サンプルテキスト">
                </td>
                <td class="main__table-td">
                    <input type="type" name="rest__time" value="サンプルテキスト">
                </td>
                <td class="main__table-td">
                    <input type="type" name="work__time" value="サンプルテキスト">
                </td>
            </tr>
        </table>
    </div>
    <div class="last__page">
        <!--ページネーション-->
    </div>
    </div>
</div>

<footer class="footer">
    <div class="footer_title">
        <small class="footer__small">Atte,inc.</small>
    </div>
</footer>
@endsection



