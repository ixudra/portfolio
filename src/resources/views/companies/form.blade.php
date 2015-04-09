{!! Form::open(array('url' => $url, 'method' => $method, 'id' => $formId, 'class' => 'form-horizontal', 'role' => 'form')) !!}

    <div class="well well-large">
        <div class='form-group {{ $errors->has('name') ? 'has-error' : '' }}'>
            {!! Form::label('name', Translate::recursive('members.name') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-6">
                {!! Form::text('name', $input['name'], array('class' => 'form-control')) !!}
                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has('vat_nr') ? 'has-error' : '' }}'>
            {!! Form::label('vat_nr', Translate::recursive('members.vat_nr') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text('vat_nr', $input['vat_nr'], array('class' => 'form-control')) !!}
                {!! $errors->first('vat_nr', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has('email') ? 'has-error' : '' }}'>
            {!! Form::label('email', Translate::recursive('members.email') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-6">
                {!! Form::text('email', $input['email'], array('class' => 'form-control')) !!}
                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has('url') ? 'has-error' : '' }}'>
            {!! Form::label('url', Translate::recursive('members.url') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-8">
                {!! Form::text('url', $input['url'], array('class' => 'form-control')) !!}
                {!! $errors->first('url', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has('phone') ? 'has-error' : '' }}'>
            {!! Form::label('phone', Translate::recursive('members.phone') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text('phone', $input['phone'], array('class' => 'form-control')) !!}
                {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has('fax') ? 'has-error' : '' }}'>
            {!! Form::label('fax', Translate::recursive('members.fax') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text('fax', $input['fax'], array('class' => 'form-control')) !!}
                {!! $errors->first('fax', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
    </div>

    <div class=row">
        <h3>{{ Translate::recursive('members.corporateAddress') }}</h3>
    </div>

    @include('portfolio::addresses.fields', array('prefix' => 'corporate_address_'))

    <div class=row">
        <h3>{{ Translate::recursive('members.representative') }}</h3>
    </div>

    @include('portfolio::people.fields', array('prefix' => 'representative_'))

    <div class="action-button">
        {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
        {!! HTML::linkRoute($redirectUrl, Translate::recursive('common.cancel'), $redirectParameters, array('class' => 'btn btn-default')) !!}
    </div>

{!! Form::close() !!}