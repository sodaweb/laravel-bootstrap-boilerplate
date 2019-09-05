<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.">
        <meta name="keywords" content="abc, def, ghi, jkl, mno, pqr, stu, vwx, yz" />
        <meta name="author" content="">
        <meta name="robots" content="noindex nofollow" />

        @if (\View::hasSection('title'))
            <title>@yield('title') - {{ config('app.name') }}</title>
            <meta property="og:title" content="@yield('title') - {{ config('app.name') }}" />
        @else
            <title>{{ config('app.name') }}</title>
            <meta property="og:title" content="{{ config('app.name') }}" />
        @endif


        <meta property="og:locale" content="pt_BR" />
        <meta property="og:url" content="{{ asset('') }}" />

        <meta property="og:site_name" content="Laravel Bootstrap Boilerplate" />
        <meta property="og:description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." />
        <meta property="og:image" content="{{asset('images/share-box.jpg')}}" />
        <meta property="og:image:type" content="image/jpg" />

        <meta property="og:image:width" content="470" />
        <meta property="og:image:height" content="246" />

        <meta name="theme-color" content="#373C43">
        <meta name="msapplication-navbutton-color" content="#373C43">
        <meta name="apple-mobile-web-app-status-bar-style" content="#373C43">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
        <link rel="apple-touch-icon" href="{{asset('images/ios-icon.png')}}">

        <link rel="stylesheet" href="{{ mix('css/all.css') }}">
        <link rel="manifest" href="{{asset('manifest.json')}}">

        <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

        <script>
            if ('serviceWorker' in navigator && 'PushManager' in window) {
                window.addEventListener('load', function() {
                    navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                        // Registration was successful
                        console.log('ServiceWorker registration successful with scope: ', registration.scope);
                    }, function(err) {
                        // registration failed :(
                        console.log('ServiceWorker registration failed: ', err);
                    });
                });
            }
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{ env('GOOGLE_TAG_MANAGER') }}');</script>
        <!-- End Google Tag Manager -->

    </head>

    <body>

        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id={{ env('GOOGLE_TAG_MANAGER') }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager -->

        @include('layouts.header')

        <div class="container">
            @if(Session::has('status'))
            <div class="alert alert-success">
                {{ Session::get('status') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
        </div>

        <main>
            @if(!Request::is('/'))
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home.index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    @yield('title')
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>

        

        @include('layouts.footer')

        <!-- /.container -->

        <script src="{{ mix('js/all.js') }}"></script>

        

    </body>

</html>
