<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>{{ __('email.email_confirm') }}</h2>

        <div>
            {{ __('email.email_confirm_div') }}
            <a class="btn btn-default btn-lg" href="{{route('user.register.confirm', ['code' => $data['code']]) }}">
                {{ __('email.confirm_email_button') }}</a><br/>
        </div>

    </body>
</html>