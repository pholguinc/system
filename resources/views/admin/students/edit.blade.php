@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar studiante</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <span class="card-title">Update Student</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.students.update', $student->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.students.form')

                            @include('admin.students.partials.update')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
