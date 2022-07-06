@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $student->name ?? 'Show Student' }}</h1>
@stop


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Student</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.students.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $student->code }}
                        </div>
                        <div class="form-group">
                            <strong>First Name:</strong>
                            {{ $student->first_name }}
                        </div>
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            {{ $student->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $student->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $student->email }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $student->address }}
                        </div>
                        <div class="form-group">
                            <strong>Birthday:</strong>
                            {{ $student->birthday }}
                        </div>
                        <div class="form-group">
                            <strong>Parents Name:</strong>
                            {{ $student->parents_name }}
                        </div>
                        <div class="form-group">
                            <strong>Phone Home:</strong>
                            {{ $student->phone_home }}
                        </div>
                        <div class="form-group">
                            <strong>Phone Parent:</strong>
                            {{ $student->phone_parent }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $student->status }}
                        </div>
                        <div class="form-group">
                            <strong>Level Id:</strong>
                            {{ $student->level_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
