@extends('layouts.app')
@section('title', 'Trainers')
@section('head')
    <link rel="stylesheet" href='{{ url("css/trainers.css") }}'>
    <link rel="stylesheet" href='{{ url("css/main.css") }}'>
    <script src='{{ url("js/trainers.js") }}' defer></script>
    <script src='{{ url("js/main.js") }}' defer></script>
@endsection
@section('header')
    @parent
    @section('messaggio')
        <h1>
            I nostri personal trainer
        </h1>
        @endsection
@endsection
@section('contenuto')
    <section id="section_trainers">
            <h1>Trainer qualificiati lavorano per te</h1>
        </div>
    </section>
@endsection
@section('footer')