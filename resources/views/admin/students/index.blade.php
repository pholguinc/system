@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Studiantes</h1>
@stop

@section('content')

    <div class="card card-outline card-primary">
        <div class="card-header">

        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Grado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>

                            <td>{{ $student->dni }}</td>
                            <td>

                            </td>
                            <td>
                                acc
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
