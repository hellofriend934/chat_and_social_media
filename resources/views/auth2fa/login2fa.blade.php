@extends('Layouts.app')
@section('content')
    {{auth()->user()->google2fa_secret}}


    <form action="{{route('OtpCheck')}}" method="post">
        @csrf
        <input type="text" name="secret" placeholder="введите код">
        <input type="submit" value="отправить">
    </form>
@endsection
