@extends('layouts.app')

@section('content')

<div class="container">

<div class="row">
    <div class="col s12">
		<h1 class="title center">Register</h1>
	</div>
</div>

<div class="row">
    <form class="col s12 m8 l6 offset-m2 offset-l3" id="register" role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}

        <div class="input-field">
            {!! Form::label('first_name', 'First Name', ['class' => 'active']) !!}
            {!! Form::text('first_name', null, ['id' => 'first_name']) !!}
        </div>

        <div class="input-field">
            {!! Form::label('last_name', 'Last Name', ['class' => 'active']) !!}
            {!! Form::text('last_name', null, ['id' => 'last_name']) !!}
        </div>

        <div class="input-field">
            {!! Form::label('office_city', 'Office Location (City)', ['class' => 'active']) !!}
            {!! Form::text('office_city', null, ['id' => 'office_city']) !!}
        </div>

        <div class="input-field">
            {!! Form::label('email', 'Email', ['class' => 'active']) !!}
            {!! Form::text('email', null, ['id' => 'email']) !!}
        </div>

        <div class="input-field">
            {!! Form::label('password', 'Password', ['class' => 'active']) !!}
            {!! Form::password('password', null, ['id' => 'password']) !!}
        </div>

        <div class="input-field">
            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'active']) !!}
            {!! Form::password('password_confirmation', null, ['id' => 'password_confirmation']) !!}
        </div><br />

        <div class="row center">
            <button class="btn-large waves-effect waves-light" type="submit" name="action">
                Register<i class="material-icons right">send</i>
            </button>
        </div>
    </form>
</div>

</div>

<script type="text/javascript">
    $.validator.addMethod("emaildomain", function(value, element) {
        var domain = value.split('@')[1]; // get the string after @
        return domain == "advisian.com" || domain == "worleyparsons.com";
    }, "Email must be \@advisian.com or \@worleyparsons.com");

    $("#register").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            office_city: "required",
            email: {
                required: true,
                email: true,
                emaildomain: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
            password_confirmation: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
        },
        messages: {
            password_confirmation: {
                equalTo: "Passwords do not match."
            }
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
