@extends('layouts.app')
@section('title', 'Home')
@section('head')
    <link rel="stylesheet" href='{{ url("css/home.css") }}'>
    <link rel="stylesheet" href='{{ url("css/main.css") }}'>
    <script src='{{ url("js/main.js") }}' defer></script>
@endsection
@section('header')
    @parent
    @section('messaggio')
        <h1>
            <strong>ROCK YOUR BODY!</strong>
            <a href="{{ url('sedi') }}"> Trova la tua sede </a>
        </h1>
    @endsection
@endsection
@section('contenuto')
    <section>
        <div id="testo-corsi">
            <h1>Più di 10 corsi.</h1>
            <p>Scoprili e scegli quelli giusti per te!</p>
        </div>
        <div id="flex-container-corsi">
            <div> 
                <img src="https://images.pexels.com/photos/711187/pexels-photo-711187.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                <span>Corsi acquatici</span> 
            </div>
            <div> 
                <img src="https://images.pexels.com/photos/4753927/pexels-photo-4753927.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                <span>Fitnesse sport da combattimento</a> 
            </div>
            <div> 
                <img src="https://images.pexels.com/photos/5150478/pexels-photo-5150478.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                <span>Danza e Ginnastica</a>
            </div>
        </div>
        <div id="istruttori">
            <div> 
                <img src="https://images.pexels.com/photos/791763/pexels-photo-791763.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                <h1>Istruttori qualificati</h1>
                <a href="{{ url('trainers') }}"> Conoscili </a>
            </div>
        </div>
        </div>
        <div id="testo-palestre">
            <h1>Sale e piscine super attrezzate.</h1>
            <p>Visita le nostre palestre!</p>
        </div>
        <div id="flex-container-palestre">
            <div>
                <img src="https://images.pexels.com/photos/261060/pexels-photo-261060.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                <span>Piscina</span>
            </div>
            <div>
                <img src="https://images.pexels.com/photos/7187881/pexels-photo-7187881.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500">
                <span>Sala pesi</span>
            </div>
            <div>
                <img src="https://images.pexels.com/photos/5153975/pexels-photo-5153975.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260">
                <span>Sala danza</span>
            </div>
        </div>
    </section>
@endsection
@section('footer')