<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-row">
            <div class="form-group col-md-4">
                {{ Form::label('code') }}
                {{ Form::text('code', $student->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code']) }}
                {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group col-md-4">
                {{ Form::label('first_name') }}
                {{ Form::text('first_name', $student->first_name, ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'placeholder' => 'First Name']) }}
                {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('last_name') }}
                {{ Form::text('last_name', $student->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name']) }}
                {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                {{ Form::label('dni') }}
                {{ Form::text('dni', $student->dni, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'Dni']) }}
                {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('email') }}
                {{ Form::text('email', $student->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('address') }}
                {{ Form::text('address', $student->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
                {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                {{ Form::label('birthday') }}
                {{ Form::date('birthday', $student->birthday, ['class' => 'form-control' . ($errors->has('birthday') ? ' is-invalid' : ''), 'placeholder' => 'Birthday']) }}
                {!! $errors->first('birthday', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('parents_name') }}
                {{ Form::text('parents_name', $student->parents_name, ['class' => 'form-control' . ($errors->has('parents_name') ? ' is-invalid' : ''), 'placeholder' => 'Parents Name']) }}
                {!! $errors->first('parents_name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('phone_home') }}
                {{ Form::text('phone_home', $student->phone_home, ['class' => 'form-control' . ($errors->has('phone_home') ? ' is-invalid' : ''), 'placeholder' => 'Phone Home']) }}
                {!! $errors->first('phone_home', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                {{ Form::label('phone_parent') }}
                {{ Form::text('phone_parent', $student->phone_parent, ['class' => 'form-control' . ($errors->has('phone_parent') ? ' is-invalid' : ''), 'placeholder' => 'Phone Parent']) }}
                {!! $errors->first('phone_parent', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-4">

                {{ Form::label('Grado Académico') }}
                {{ Form::select('level_id', $levels, null, ['class' => 'form-control' . ($errors->has('level_id') ? ' is-invalid' : ''), 'placeholder' => 'Level Id']) }}
                {!! $errors->first('level_id', '<div class="invalid-feedback">:message</div>') !!}

            </div>
        </div>

    </div>

