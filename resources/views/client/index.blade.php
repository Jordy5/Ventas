@extends('theme.base')
@section('content')
    <div class="container py-5 text-center">
        <h1>LISTA DE CLIENTES</h1>
        <a href="{{route('client.create') }}" class="btn btn-primary">Crear Cliente</a>

        @if (Session::has('mensaje'))
            <div class="alert alert-info mb5">
                {{Session::get('mensaje')}}
            </div>

        @endif

        <div
            class="table-responsive"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clients as $detail)
                        <tr class="">
                            <td>{{$detail->name}}</td>
                            <td>{{$detail->due}}</td>
                            <td>
                                <a href="{{ route('client.edit',$detail) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('client.destroy', $detail) }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar este cliente')">Elminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr aria-colspan="3">No Hay Registros!</tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        @if ($clients->count())
            {{ $clients->links()}}
        @endif


    </div>
@endsection
