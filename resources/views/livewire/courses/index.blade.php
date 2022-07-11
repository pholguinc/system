@extends('adminlte::page')

@section('title', 'Gestión Escolar | Cursos')

@section('content_header')
    <div class="row mb-2 items-center">
        <div class="col-sm-6">
            <h3 class="font-weight-bold px-4 py-6">Módulo de Cursos</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right mt-1 mr-3">
                <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
                <li class="breadcrumb-item active"><b>Cursos</b></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('courses')
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('livewire.courses.scripts.script')
@endsection

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <style>
            .flex-content {
                height: 175px;
                display: grid;
                grid-gap: -14px;
                grid-template-columns: 2fr 2fr 2fr;
            }
    </style>
@endpush
