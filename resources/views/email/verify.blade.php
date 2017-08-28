<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">

    </head>
    <body>
        <h2>{{ __('mail.email_confirm') }}</h2>
        <div>
            {{ __('mail.email_confirm_div') }}
            <a class="btn btn-default btn-lg" href="{{route('user.register.confirm', ['code' => $data['code']]) }}">
                {{ __('mail.confirm_email_button') }}</a><br/>
        </div>

    </body>
</html>