<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>EverFoodie Admin</title>

        <!-- Fonts -->
        <!-- Fontawesome css -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:300,400,500,700,800,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/common.css')}}" media="all" />

        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin_style.css')}}" media="all" />
     

    </head>
    <body>
       
        <div id="app">
            <admin_master></admin_master>
        </div>

        <script>
            (function () {
                window.Laravel = {
                    csrfToken: '{{ csrf_token() }}'
                };
                @if(Auth::check())
                    window.authUser={!! Auth::user() !!}
                    @else
                    window.authUser=false
                    @endif
            })();
       </script>
        
        <script src="/js/app.js"></script>
    </body>
</html>
