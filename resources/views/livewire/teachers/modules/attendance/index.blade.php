@extends('adminlte::page')

@section('title', 'Gestión Escolar | Asistencia')

@section('content_header')
    <div class="row mb-2 items-center">
        <div class="col-sm-6">
            <h3 class="font-weight-bold px-4 py-6">Módulo de Asistencia</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right mt-1 mr-3">
                <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
                <li class="breadcrumb-item active"><b>Asistencia</b></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-primary">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Id</th>
                            <th>Nombre del Curso</th>
                            <th>Grado Académico</th>
                            <th>Aula</th>
                            <th>Cantidad de Alumnos</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td>01</td>
                                    <td>{{ $teacher->courses->course_name }}</td>
                                    <td>Secundaria</td>
                                    <td>04</td>
                                    <td>45 Alumnos</td>
                                    <td width="350px">
                                        <a href="" class="btn btn-md btn-info">
                                            <i class="fas fa-edit"></i>
                                            <span>Registrar asistencia</span>
                                        </a>
                                        <a href="" class="btn btn-md bg-purple">
                                            <i class="fas fa-book-open"></i>
                                            <span>Registrar notas</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div align="center" class="content-teacher">
                <img class="img-fluid img-circle" src="https://cdn-icons-png.flaticon.com/512/167/167752.png"
                    alt="User profile picture" width="300">
            </div>
        </div>
    </div>

@stop

@section('css')
    <style>
        .content-teacher img {
            border: 1px solid rgb(151, 151, 151);
            padding: 8px;
            box-shadow: 0 0 4px 1px rgba(202, 155, 82, .5);
            transform: scale(1.1)
        }
    </style>
@stop
