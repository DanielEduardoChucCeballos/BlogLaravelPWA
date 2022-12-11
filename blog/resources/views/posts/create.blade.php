@extends('layouts.layout')

@section('title', 'Crear Posts')


@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="pull-right">
                <a class="btn btn-danger" href="{{ route('posts.index') }}"> Regresar</a>
            </div>
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Crear Post</h2>
                </div>

            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Titulo:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Titulo">
                        @error('title')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contenido:</strong>
                        {{--  <input type="text" name="perex" class="form-control" placeholder="Contenido"> --}}
                        <textarea class="form-control" name="perex" rows="3"></textarea>
                        @error('perex')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>





                <div class="col-md-4">
                    <label for="" class="form-label">Categoría</label>
                    <select class="form-select form-select-lg" name="category_id" id="">
                        <option selected>Categoría</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->namecategory }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Disponibilidad</label>
                    <select class="form-select form-select-lg" name="enabled" id="">
                        <option value="1">Disponible</option>
                        <option value="0">No disponible</option>
                    </select>
                </div>

                <input type="number" hidden name="user_id" id="" value="{{ Auth::user()->id }}">
                <div class="col-md-4">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success ml-3">Publicar</button>
        </form>
    </div>
@stop
