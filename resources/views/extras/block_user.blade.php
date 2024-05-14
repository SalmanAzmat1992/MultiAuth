<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Blocked</title>
</head>
<body>

        @if(Session::has('msg'))
            {{ Session::get('msg_type') }}: {{ Session::get('msg') }} @if(Session::get('result') == 0) developer. Please contact at "msalman098@gmail.com" @endif
            @if(Session::get('result') == 2) your admin. Please contact with your admin. @endif
            @if(Session::get('result') == 3) your manager. Please contact with your manager. @endif
        @endif

</body>
</html>
