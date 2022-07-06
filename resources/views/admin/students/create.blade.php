@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    {{-- <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <span class="card-title">Create Student</span>
                    </div>
                    <div class="card-body">



                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.students.store') }}" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    @include('admin.students.form')
                    @livewire('buttons-students')
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div style="display: grid;">
                <a href="" class="btn btn-md bg-success mb-2">Pago de matrícula</a>
                <a href="" class="btn btn-md bg-secondary mb-2">Pago de pensiones</a>
                <a href="" class="btn btn-md bg-purple mb-2">Pago de documentos académicos</a>
                <a href="" class="btn btn-md bg-info mb-2">Pago de artículos escolares</a>
            </div>
        </div>
    </div>


@endsection
