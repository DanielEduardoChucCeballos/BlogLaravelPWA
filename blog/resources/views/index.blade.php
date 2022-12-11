@extends('layouts.layout')
@section('title', 'Inicio')
@section('content')

    <div class="container">
        <h1>Categorias</h1>
        <hr>
        <div class="row">
            <div class="col-md">
                @foreach ($categories as $item)
                    <button type="button" class="btn btn-outline-info">{{ $item->name }}</button>
                @endforeach
            </div>
        </div>
        <hr>

        <h1>Publicaciones</h1>
        <hr>
        <div class="card text-start">
            @foreach ($posts as $item)
                <div class="card-body">
                    <h4 class="card-title">{{ $item->title }}</h4>
                    <p class="card-text">{{ $item->perex }}</p>
                    <p class="card-text">Autor: {{ $item->name }} Fecha:{{ $item->published_at }}</p>

                </div>
            @endforeach

        </div>
    </div>

@stop
