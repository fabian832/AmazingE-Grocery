<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" type="text/css" href="{{asset("css/style.css")}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body style="background-color: rgb(242, 242, 242)">
    <header>
        <div class="left">
            <div class="image">
                <img src="{{Storage::url("images/assets/logo.png")}}">
            </div>
            <div class="name">
                <h2>Amazing E-Grocery - Fabian 2401961492</h2>
            </div>
            <div class="lang">
                <a href=@yield('page') class="btn btn-dark">En</a>
                <a href=@yield('page_id') class="btn btn-light">Id</a>
            </div>
        </div>
        <div class="right">
            <div class="home">
                <a href="/" >{{__('pageLanguage.navbar.Home')}}</a>
            </div>
            @auth
                <div class="cart">
                    <a href="/cart" >{{__('pageLanguage.navbar.Cart')}}</a>
                </div>
                <div class="profile">
                    <a href="/profile" >{{__('pageLanguage.navbar.Profile')}}</a>
                </div>
                @if (Auth::user()->role_id==1)
                    <div class="account-maintenance">
                        <a href="/account-maintenance">{{__('pageLanguage.navbar.Account Maintenance')}}</a>
                    </div>
                @endif
                <div class="logout">
                    <a href="/logout" class="btn btn-danger">{{__('pageLanguage.navbar.Log Out')}}</a>
                </div>
            @else
                <div class="login">
                    <a href="/login-page" class="btn btn-warning">{{__('pageLanguage.navbar.Login')}}</a>
                </div>
                <div class="register">
                    <a href="/register-page" class="btn btn-outline-secondary">{{__('pageLanguage.navbar.Register')}}</a>
                </div>
            @endauth
        </div>
    </header>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <footer>
        <h2>Amazing E-Grocery</h2>
        <p>Fabian - 2401961942</p>
        <p>{{__('pageLanguage.navbar.CP')}} : 0878-8905-5065 (Fabian)</p>
    </footer>
</body>
</html>