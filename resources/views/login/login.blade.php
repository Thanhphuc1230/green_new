@extends('login.master')
@section('title', 'Login')
@section('content')
    <form action="{{ route('postLogin') }}" method="post">
        @csrf
        <div class="field input-field">
            <input type="text" placeholder="Email or username" class="input" name="username" value="{{old('username')}}">
        </div>

        <div class="field input-field">
            <input type="password" placeholder="Password" class="password" name="password">
            <i class='bx bx-hide eye-icon'></i>
        </div>

        <div class="field button-field">
            <button type="submit">Login</button>
        </div>
    </form>

    </div>


@endsection
