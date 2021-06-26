@extends('layouts.app')
@section('title', 'Sedi')
@section('head')
    <link rel="stylesheet" href='{{ url("css/sedi.css") }}'>
    <link rel="stylesheet" href='{{ url("css/main.css") }}'>
    <script src='{{ url("js/sedi.js") }}' defer></script>
    <script src='{{ url("js/main.js") }}' defer></script>
@endsection
@section('header')
    @parent
    @section('messaggio')
        <h1>
            Le nostre sedi
        </h1>
    @endsection
@endsection
@section('contenuto')
    <section id="section_sedi">
        <div id="cerca">
            <h1>Sedi in tutta Italia</h1>
            <h3>Cerca la tua città <input type="text" id="ricerca" /></h3>
        </div>
    </section>
@endsection
@section('footer')