<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" name="viewport"
            content="width=device-width, initial-scale=1.0"
            http-equiv="X-UA-Compatible" content="ie=edge"
        >
        <script 
            src="https://code.jquery.com/jquery-3.3.1.min.js" 
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 
            crossorigin="anonymous">
        </script>
        <script>
            $(function() {
                var password = '.js-password';
                var passcheck = '#js-passcheck';

                $(passcheck).change(function() {
                    if($(this).prop('checked')) {
                        $(password).attr('type', 'text');
                    } else {
                        $(password).attr('type', 'password');
                    }
                });
            });
        </script>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
        <title>Square Music</title>
        {{-- Bootstrap --}}
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
            crossorigin="anonymous"
        >
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        @include('commons.header')
            <div class="container">
                @include('commons.error_messages')
                @yield('content')
            </div>
        @include('commons.footer')
    </body>
</html>
