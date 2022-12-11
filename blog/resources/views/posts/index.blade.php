@extends('layouts.layout')
@section('title', 'Inicio')
@section('content')

    <div class="container">

        <h1>Categorias</h1>
        <hr>
        <div class="row">
            <div class="col-md">
                @foreach ($categories as $item)
                    <button type="button" class="btn btn-outline-info">{{ $item->namecategory }}</button>
                @endforeach
            </div>
        </div>
        <hr>
        <h1>Publicaciones</h1>
        @guest
        @else
            <a class="btn btn-success" href="{{ route('posts.create') }}"> Crear Posts</a>

        @endguest


        <hr>
        <div class="card text-start">
            @foreach ($posts as $item)
           {{--  @if ({{ Auth::user()->id }} === {{ $item->user_id }})

            @endif   --}}

                <div class="card-body">
                    <h4 class="card-title">{{ $item->title }}</h4>
                    <p class="card-text">{{ $item->perex }}</p>
                    <p class="card-text">Autor: {{ $item->name }} |  Fecha de publicación: {{ $item->updated_at }}</p>
                    <span>Categoria: {{ $item->namecategory }}</span>

                </div>

                @auth
                    @if (  Auth::user()->name  ==  $item->name  )
                        <form action="{{ route('posts.destroy',$item->id) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                @endauth
                        <hr>

                {{-- <a class="btn btn-primary" href="{{ route('posts.edit',$item->slug) }}">Edit</a> --}}





            @endforeach

        </div>
    </div>

@stop
