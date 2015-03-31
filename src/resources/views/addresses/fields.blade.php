<div class="well well-large">
    <div class='form-group {{ $errors->has('street_1') ? 'has-error' : '' }}'>
        {!! Form::label('street_1', Translate::recursive('members.street') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-8">
            {!! Form::text('street_1', $input['street_1'], array('class' => 'form-control')) !!}
            {!! $errors->first('street_1', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has('street_2') ? 'has-error' : '' }}'>
        {!! Form::label('street_2', '&nbsp;', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-8">
            {!! Form::text('street_2', $input['street_2'], array('class' => 'form-control')) !!}
            {!! $errors->first('street_2', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has('number') ? 'has-error' : '' }}'>
        {!! Form::label('number', Translate::recursive('members.number') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-2">
            {!! Form::text('number', $input['number'], array('class' => 'form-control')) !!}
            {!! $errors->first('number', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has('box') ? 'has-error' : '' }}'>
        {!! Form::label('box', Translate::recursive('members.box') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-2">
            {!! Form::text('box', $input['box'], array('class' => 'form-control')) !!}
            {!! $errors->first('box', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has('district') ? 'has-error' : '' }}'>
        {!! Form::label('district', Translate::recursive('members.district') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-4">
            {!! Form::text('district', $input['district'], array('class' => 'form-control')) !!}
            {!! $errors->first('district', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has('postal_code') ? 'has-error' : '' }}'>
        {!! Form::label('postal_code', Translate::recursive('members.postal_code') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-3">
            {!! Form::text('postal_code', $input['postal_code'], array('class' => 'form-control')) !!}
            {!! $errors->first('postal_code', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has('city') ? 'has-error' : '' }}'>
        {!! Form::label('city', Translate::recursive('members.city') .': ', array('class' => 'control-label col-lg-3')) !!}
        <div class="col-lg-6">
            {!! Form::text('city', $input['city'], array('class' => 'form-control')) !!}
            {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class='form-group {{ $errors->has('country') ? 'has-error' : '' }}'>
        <div class="col-lg-4">
            {!! Form::hidden('country', 'us', array('class' => 'form-control')) !!}
        </div>
    </div>
</div>