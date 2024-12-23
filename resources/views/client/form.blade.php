@extends('theme.base')
@section('content')
    <div class="container py-5 text-center">
        @if (isset($client))
            <h1>Editar cliente</h1>
        @else
            <h1>Crear cliente</h1>
        @endif

            @if (isset($client))
                <form action="{{ route('client.update', $client) }}" method="post">
                @method('PUT')
            @else
                <form action="{{ route('client.store') }}" method="post">
            @endif

            @csrf
            <div class="mb3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="nombre del cliente" value="{{old('name') ?? @$client->name}}">
                <p class="form-text">Escriba el nombre del cliente</p>
                @error('name')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb3">
                <label for="due" class="form-label">saldo</label>
                <input type="number" name="due" class="form-control" placeholder="saldo del cliente" step="0.01" value="{{old('due') ?? @$client->due}}">
                <p class="form-text">Escriba el saldo del cliente</p>
                @error('due')
                    <p class="form-text text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb3">
                <label for="comments" class="form-label">comentarios</label>
                <textarea name="comments" id="" cols="30" rows="4" class="form-control" value="{{old('comments') ?? @$client->comments}}"></textarea>
                <p class="form-text">Escriba algunos comentarios</p>
                @error('comments')
                    <p class="form-text text-danger">{{$message}}</p>
                @enderror

            </div>
            @if (isset($client))
                <button class="btn btn-primary" type="submit">Editar Cliente</button>
            @else
                <button class="btn btn-primary" type="submit">Guardar Cliente</button>
            @endif

        </form>
    </div>
@endsection
