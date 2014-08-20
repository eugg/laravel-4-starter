<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>{{trans('emails.users.welcome')}}</h2>

        <p><b>Your Email account:</b> {{{ $email }}}</p>
        <p>To activate your account, <a href="{{ URL::to('users') }}/activate/{{ $user_id }}/{{ urlencode($activationCode) }}">click here.</a></p>
        <p>Or point your browser to this address: <br /> {{ URL::to('users') }}/activate/{{ $user_id }}/{{ urlencode($activationCode) }}</p>
        <p>Thank you, <br />
            ~The Admin Team</p>
    </body>
</html>
