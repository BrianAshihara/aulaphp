<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="app sidebar-mini rtl">

    <header>
        @include('layout.header')
    </header>

    <aside>
        @include('layout.sidebar')
    </aside>

    <main>
        <div class="app-content">
              @yield('content')
        </div>

    </main>

    <script src="{{asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{asset('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/main.js') }}"></script>
    
</body>
</html>