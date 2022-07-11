@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row mb-2 items-center">
        <div class="col-sm-6">
            <h3 class="font-weight-bold px-4 py-6">Módulo de Empleados</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right mt-1 mr-3">
                <li class="breadcrumb-item"><a href="/admin">Inicio</a></li>
                <li class="breadcrumb-item active"><b>Empleados</b></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('users')
            </div>
        </div>
    </div>
@endsection

@section('js')

    @include('livewire.users.scripts.script')

@endsection

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endpush

@section('footer')
    @include('livewire.components.footer')
@endsection
