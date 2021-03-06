@extends('layouts.app')

@section('content')

<div class="container">

<div class="row">
    <div class="col s12">
		<h1 class="title center">Login</h1>
	</div>
</div>

<div class="row">
    <form class="col s12 m8 l6 offset-m2 offset-l3" id="login" role="form" method="POST" action="{{ url('/login') }}">

        {!! csrf_field() !!}

        <div class="input-field">
            {!! Form::label('email', 'Email', ['class' => 'active']) !!}
            {!! Form::text('email', null, ['id' => 'email']) !!}
        </div>

        <div class="input-field">
            {!! Form::label('password', 'Password', ['class' => 'active']) !!}
            {!! Form::password('password', null, ['id' => 'password']) !!}
        </div>

        <div class="right">
            <span class="subtitle"><a href="/password/reset">Forgot your password?</a></span>
        </div>

        @if (count($errors))
            <ul>
                @foreach($errors->all() as $error)
                    <li class="worleyparsons-red-text">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="input-field">
            <input type="checkbox" name="remember" id="remember" />
            <label for="remember">Remember Me</label>
        </div><br /><br />

        <div class="row center">
            <button class="btn-large waves-effect waves-light" type="submit" name="action">
                Login<i class="material-icons left">lock_open</i>
            </button>
        </div>

        <div class="center">
            <h4><a href="/register">Register</a></h4>
        </div>

    </form>
</div>

</div>

<script type="text/javascript">
    $("#login").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: "required",
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
</script>

@endsection
