<link rel="stylesheet" href="css/inventario.css">
@extends('layouts.app')

@section('template_title')
    Reactivos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-0">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <br>
                        <h1 class="text-center">Inventario</h1>
                        <br>
                        <!-- Filtros -->
                        <form method="GET" action="{{ route('reactivos.index') }}">
                            <div class="row mb-4">
                                <div class="d-flex justify-content-between flex-wrap gap-2">
                                    <div class="col-md-2 text-center">
                                        <p>Nombre</p>
                                        <input type="text" name="nombre" class="form-control bg-white" style="text-align: center;" placeholder="---"
                                            value="{{ request()->get('nombre') }}">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p>Fecha de vencimiento</p>
                                        <input type="date" name="fecha_vencimiento" class="form-control bg-white" style="text-align: center;"
                                            placeholder="Fecha de vencimiento"
                                            value="{{ request()->get('fecha_vencimiento') }}">
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <p>Cantidad</p>
                                        <input type="number" name="cantidad" class="form-control bg-white" style="text-align: center;" placeholder="ml/gr"
                                            value="{{ request()->get('cantidad') }}">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p>Laboratorio</p>
                                        <input type="text" name="laboratorio" class="form-control bg-white" style="text-align: center;" placeholder="---"
                                            value="{{ request()->get('laboratorio') }}">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p>Familia</p>
                                        <input type="text" name="familia" class="form-control bg-white" style="text-align: center;" placeholder="---" 
                                            value="{{ request()->get('familia') }}">
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <p>Filtrar</p>
                                        <button type="submit" class="btn btn-primary">F</button>
                                    </div>
                                    <div class="col-md-1 text center">
                                        <p>Agregar</p>
                                        <a href="{{ route('reactivos.create') }}" class="btn btn-primary"
                                            data-placement="center">{{ __('+') }}</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                <div class="card border-0">
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Fecha de vencimiento</th>
                                        <th>Cantidad</th>
                                        <th>Laboratorio</th>
                                        <th>Familia</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reactivos as $reactivo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $reactivo->nombre }}</td>
                                            <td>{{ $reactivo->fecha_vencimiento }}</td>
                                            <td>{{ $reactivo->cantidad }}</td>
                                            <td>{{ $reactivo->laboratorio }}</td>
                                            <td>{{ $reactivo->familia }}</td>
                                            <td>
                                                <form action="{{ route('reactivos.destroy', $reactivo->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('reactivos.show', $reactivo->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('V') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('reactivos.edit', $reactivo->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('E') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('-') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {!! $reactivos->withQueryString()->links() !!}
        </div>
    </div>
@endsection
