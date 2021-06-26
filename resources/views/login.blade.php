<DOCTYPE html>
<hmtl lang = "en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUMORE|gym - Accedi</title>
    <link rel="stylesheet" href='{{ url("css/signup_login.css") }}'>
    <script src='{{ url("js/login.js") }}' defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <section class="main_left">
            <h1>Accedi</h1>
            <form action="" method="POST">
                
                <input type='hidden' name='_token' value='{{ $csrf_token }}'>

                <div class="label" id="cf">
                    <input type="text" placeholder="Codice Fiscale" name="codice" value="{{  old('codice')}}" >
                    <span><span>
                </div>

                <div class="label" id="password">
                    <input type="password" placeholder="Password" name="password" value="{{  old('password')}}" >
                    <span></span>
                </div>

                <div class="accesso">
                <span class="hidden">  @if($errors->any())
                {{ $errors->first()}}
                @endif </span>
                <label><input type="checkbox" name="remember">Rimani connesso</label>
                </div>

                <input type="submit" value="Accedi" id="submit">

            </form>
            <span>Non sei ancora registrato? <a href="{{ url('signup') }}">Registrati</a></span>
        </section>
        <section class="main_right">
            <a href="{{ url('home') }}">RUMORE|gym</a>
        </section>
    </main>
</body>
</html>



