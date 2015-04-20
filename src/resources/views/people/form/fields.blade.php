<div class="well well-large">
    <div class='form-group {{ $errors->has($prefix . 'first_name') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'first_name', Translate::recursive('portfolio::members.first_name') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-5">
            {!! Form::text($prefix . 'first_name', $input[$prefix . 'first_name'], array('class' => 'form-control')) !!}
            {!! $errors->first($prefix . 'first_name', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has($prefix . 'last_name') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'last_name', Translate::recursive('portfolio::members.last_name') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-5">
            {!! Form::text($prefix . 'last_name', $input[$prefix . 'last_name'], array('class' => 'form-control')) !!}
            {!! $errors->first($prefix . 'last_name', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has($prefix . 'birth_date') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'birth_date', Translate::recursive('portfolio::members.birth_date') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-3">
            {!! Form::text($prefix . 'birth_date', $input[$prefix . 'birth_date'], array('class' => 'form-control datePicker')) !!}
            {!! $errors->first($prefix . 'birth_date', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has($prefix . 'email') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'email', Translate::recursive('portfolio::members.email') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-6">
            {!! Form::text($prefix . 'email', $input[$prefix . 'email'], array('class' => 'form-control')) !!}
            {!! $errors->first($prefix . 'email', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has($prefix . 'cellphone') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'cellphone', Translate::recursive('portfolio::members.cellphone') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-4">
            {!! Form::text($prefix . 'cellphone', $input[$prefix . 'cellphone'], array('class' => 'form-control')) !!}
            {!! $errors->first($prefix . 'cellphone', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>