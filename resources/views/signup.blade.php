<DOCTYPE html>
<hmtl lang = "en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUMORE|gym - Iscriviti</title>
    <link rel="stylesheet" href='{{ url("css/signup_login.css") }}'>
    <script src='{{ url("js/signup.js") }}' defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <section class="main_left">
            <h1>Registrati</h1>
            <form action="" method="POST">
            <?php
                if(isset($errors))
                    foreach($errors as $error )
                        echo "<span class=\"error\">$error</span>";
            ?>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div id="errore">{{ $error }}</div>
                @endforeach
            @endif
                <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                <div class="label" id="cf">
                    <input type="text" placeholder="Codice Fiscale" name="codice">
                    <span><span>
                </div>
                <div class="label" id="nome">
                    <input type="text" placeholder="Nome" name="nome">
                    <span></span>
                </div>
                <div class="label" id="cognome">
                    <input type="text"placeholder="Cognome" name="cognome">
                    <span></span>
                </div>
                <div class="label" id="data_nascita">
                    <input type="text"placeholder="Data di Nascita (gg-mm-aaaa)" name="data_nascita" >
                    <span><span>
                </div>
                <div class="label" id="email">
                    <input type="text" placeholder="Email" name="email">
                    <span></span>
                </div>
                <div class="label" id="password">
                    <input type="password" placeholder="Password" name="password">
                    <span>8-15 caratteri: A, a , numero , (!@#$^&*) </span>
                </div>
                <div class="label" id="conferma">
                    <input type="password" placeholder="Conferma password" name="conferma">
                    <span></span>
                </div>
                <div class="label" id="indirizzo">
                    <input type="text" placeholder="Indirizzo" name="indirizzo">
                    <span></span>
                </div>
                <div class="label" id="citta">
                    <input type="text" placeholder="Città" name="citta">
                    <span></span>
                </div>
                <div class="label" id="telefono">
                    <input type="text" placeholder="Telefono" name="telefono">
                    <span></span>
                </div>
                <div class="label" id="tipo">
                    <p>
                    <label> <input id="s" type='checkbox'  name='segretario'>  Segretario </label>
                    <label><input id="i" type='checkbox'  name='istruttore' > Istruttore </label>
                    <label> <input id="a" type='checkbox'  name='addetto_pulizie' > Adetto Pulizie </label>
                    </p>
                    <span></span>
                </div>
                <div>
                    <input type="submit" value="Registrati" id="submit">
                </div>
            </form>
            <span>Sei già registrato? <a href='{{ url("login") }}'>Accedi</a></span>
        </section>
        <section class="main_right">
            <a href='{{ url("home") }}'>RUMORE|gym</a>
        </section>
    </main>
</body>
</html>



