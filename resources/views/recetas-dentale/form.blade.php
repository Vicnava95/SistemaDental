<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    {{ Form::label('Fecha receta*') }}
                    <div class="input-group date">
                        {{ Form::text('fecha', !empty($recetasDentale->fecha) ? $recetasDentale->fecha: '', ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'id' => 'inputFecha']) }}
                        <div class="input-group-addon input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                    </div>
                    {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    {{ Form::label('descripcion') }}
                    {{ Form::text('descripcion', $recetasDentale->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    {{ Form::label('proximaCita') }}
                    {{ Form::text('proximaCita', $recetasDentale->proximaCita, ['class' => 'form-control' . ($errors->has('proximaCita') ? ' is-invalid' : ''), 'placeholder' => 'Proximacita']) }}
                    {!! $errors->first('proximaCita', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    {{ Form::label('expedienteDental_id') }}
                    {{ Form::text('expedienteDental_id', $recetasDentale->expedienteDental_id, ['class' => 'form-control' . ($errors->has('expedienteDental_id') ? ' is-invalid' : ''), 'placeholder' => 'Expedientedental Id']) }}
                    {!! $errors->first('expedienteDental_id', '<div class="invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('estadoReceta_id') }}
            {{ Form::text('estadoReceta_id', $recetasDentale->estadoReceta_id, ['class' => 'form-control' . ($errors->has('estadoReceta_id') ? ' is-invalid' : ''), 'placeholder' => 'Estadoreceta Id']) }}
            {!! $errors->first('estadoReceta_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>