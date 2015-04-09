<div class="well well-large">
    <div class='form-group {{ $errors->has($prefix . 'street_1') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'street_1', Translate::recursive('members.street') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-8">
            {!! Form::text($prefix . 'street_1', $input[$prefix . 'street_1'], array('class' => 'form-control')) !!}
            {!! $errors->first($prefix . 'street_1', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has($prefix . 'street_2') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'street_2', '&nbsp;', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-8">
            {!! Form::text($prefix . 'street_2', $input[$prefix . 'street_2'], array('class' => 'form-control')) !!}
            {!! $errors->first($prefix . 'street_2', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has($prefix . 'number') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'number', Translate::recursive('members.number') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-2">
            {!! Form::text($prefix . 'number', $input[$prefix . 'number'], array('class' => 'form-control')) !!}
            {!! $errors->first($prefix . 'number', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has($prefix . 'box') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'box', Translate::recursive('members.box') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-2">
            {!! Form::text($prefix . 'box', $input[$prefix . 'box'], array('class' => 'form-control')) !!}
            {!! $errors->first($prefix . 'box', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has($prefix . 'district') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'district', Translate::recursive('members.district') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-4">
            {!! Form::text($prefix . 'district', $input[$prefix . 'district'], array('class' => 'form-control')) !!}
            {!! $errors->first($prefix . 'district', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has($prefix . 'postal_code') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'postal_code', Translate::recursive('members.postal_code') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-3">
            {!! Form::text($prefix . 'postal_code', $input[$prefix . 'postal_code'], array('class' => 'form-control')) !!}
            {!! $errors->first($prefix . 'postal_code', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has($prefix . 'city') ? 'has-error' : '' }}'>
        {!! Form::label($prefix . 'city', Translate::recursive('members.city') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-6">
            {!! Form::text($prefix . 'city', $input[$prefix . 'city'], array('class' => 'form-control')) !!}
            {!! $errors->first($prefix . 'city', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has($prefix . 'country') ? 'has-error' : '' }}'>
        <div class="col-lg-4">
            {!! Form::hidden($prefix . 'country', 'us', array('class' => 'form-control')) !!}
        </div>
    </div>
</div>