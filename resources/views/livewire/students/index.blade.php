@extends('adminlte::page')

@section('title', 'Gestión Escolar | Alumnos')

@section('content_header')
    <div class="row mb-2 items-center">
        <div class="col-sm-6">
            <h3 class="font-weight-bold px-4 py-6">Módulo de Alumnos</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right mt-1 mr-3">
                <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
                <li class="breadcrumb-item active"><b>Alumnos</b></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('students')
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('livewire.components.footer')
@stop

@section('js')

@include('livewire.students.scripts.script')

@endsection
