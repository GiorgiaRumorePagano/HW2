<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Rumore Gym - @yield('title')</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
            @yield('head')
        </head>
    <body>
        @section('header')
        <header>
            <div id="overlay"></div>
            <nav>
                <div id="logo">
                    RUMORE|gym
                </div>
                <div id="menu">
                    <a href="{{ url('home') }}">Home</a>
                    <a href="{{ url('sedi')}}">Sedi</a>
                    <a href="{{ url('corsi') }}">Corsi</a>
                    <a href="{{ url('trainers') }}">Trainers</a>
                    <a href="{{ url('login') }}">Area Riservata</a>
                </div>
                <div id="ham">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div id="mobile_menu" class="hidden">
                    <div id="x"> X  </div>
                    <a href="{{ url('home') }}">Home</a>
                    <a href="{{ url('sedi')}}">Sedi</a>
                    <a href="{{ url('corsi') }}">Corsi</a>
                    <a href="{{ url('trainers') }}">Trainers</a>
                    <a href="{{ url('login') }}">Area Riservata</a>
                </div>

            </nav>
            @yield('messaggio')
        </header>
        @show
        @yield('contenuto')
        @section('footer')
        <footer>
            <div id="footer1">
                <a id="logofooter" href="{{ url('home') }}">RUMORE|gym <p> Via Dafnica 206B - 0957633393 </p></a>
                <div id="socialfooter"> Seguici su:
                    <div id="img-social">
                        <a> <img src="https://cdn.icon-icons.com/icons2/1826/PNG/512/4202090instagramlogosocialsocialmedia-115598_115703.png">
                        </a>
                        <a> <img src="https://almm.it/wp-content/uploads/2019/01/logo-facebook.png"> </a>
                    </div>
                </div>
                <div id="footer-work">
                    <h6>Vuoi lavorare con noi? </h6>
                    <a> Clicca qui </a>
                </div>
                <div id="area-riservata">
                    <a href="{{ url('login') }}"> Area Riservata</a>
                </div>
            </div>
            &#169 Giorgia Rumore Pagano | O46002229
        </footer>
        @show
    </body>
</html>