@extends('emails.layouts.default')

@section('content')
    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">Seu token para resetar a senha é
        {{ $token }}</p>

    <p style="font-family: Helvetica, sans-serif; font-size: 16px; font-weight: normal; margin: 0; margin-bottom: 16px;">
        Good luck! Hope it works.</p>
@endsection
