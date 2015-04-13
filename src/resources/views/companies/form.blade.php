{!! Form::open(array('url' => $url, 'method' => $method, 'id' => $formId, 'class' => 'form-horizontal', 'role' => 'form')) !!}

    <div class="well well-large">
        <div class='form-group {{ $errors->has($prefix .'name') ? 'has-error' : '' }}'>
            {!! Form::label($prefix .'name', Translate::recursive('members.name') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-6">
                {!! Form::text($prefix .'name', $input[$prefix .'name'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'name', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has($prefix .'vat_nr') ? 'has-error' : '' }}'>
            {!! Form::label($prefix .'vat_nr', Translate::recursive('members.vat_nr') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text($prefix .'vat_nr', $input[$prefix .'vat_nr'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'vat_nr', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has($prefix .'email') ? 'has-error' : '' }}'>
            {!! Form::label($prefix .'email', Translate::recursive('members.email') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-6">
                {!! Form::text($prefix .'email', $input[$prefix .'email'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'email', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has($prefix .'url') ? 'has-error' : '' }}'>
            {!! Form::label($prefix .'url', Translate::recursive('members.url') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-8">
                {!! Form::text($prefix .'url', $input[$prefix .'url'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'url', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has($prefix .'phone') ? 'has-error' : '' }}'>
            {!! Form::label($prefix .'phone', Translate::recursive('members.phone') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text($prefix .'phone', $input[$prefix .'phone'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'phone', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has($prefix .'fax') ? 'has-error' : '' }}'>
            {!! Form::label($prefix .'fax', Translate::recursive('members.fax') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text($prefix .'fax', $input[$prefix .'fax'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'fax', '<span class="help-block">:message</span>') !!}
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