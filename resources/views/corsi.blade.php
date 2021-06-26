@extends('layouts.app')
@section('title', 'Corsi')
@section('head')
    <link rel="stylesheet" href='{{ url("css/corsi.css") }}'>
    <link rel="stylesheet" href='{{ url("css/main.css") }}'>
    <script src='{{ url("js/corsi.js") }}' defer></script>
    <script src='{{ url("js/main.js") }}' defer></script>
@endsection
@section('header')
    @parent
    @section('messaggio')
        <h1>
            Attività sportive
        </h1>
    @endsection
@endsection
@section('contenuto')
    <section class="all_preferiti hidden"> </section>
    <section id="section_corsi">
        <div id="cerca">
            <h1>Conosci tutti i nostri corsi</h1>
            <h3>Cerca <input type="text" id="ricerca"/></h3>
        </div>
    </section>

    <section id = 'api_1'>
        <h1> Campioni del calcio si affidano a noi </h1>
        <h3>A partire da Cristiano Ronaldo, Danny Welbeck, Diego Milito, Zlatan Ibrahimovic e tanti altri...</h3>
        <h4>Cercali per avere più informazioni su di loro</h4>
        <form>

            <input type = 'text' id='player'>
            <input type = 'submit' id='submit1' value='cerca'>
        </form>
    </section>


    <section id="risultati1">
    </section>

    <section id = 'api_2'>
        <h1>Musica stimolante ad ogni corso per un ottimo workout</h1>
        <h3>I nostri album preferit sono: This Is Acting, Il ballo della vita, Fuori dall'hype Ringo Starr e tanti altri</h3>
        <h4>Cercali e scopri le tracce</h4>
        <form>
            <input type = 'text' id='album'>
            <input type = 'submit' id='submit2' value='cerca'>
        </form>
    </section>

    <section id="risultati2">
    </section>
@endsection
@section('footer')
