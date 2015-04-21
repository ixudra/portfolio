
    <div class="well well-large">
        <div class='form-group {{ $errors->has($prefix .'name') ? 'has-error' : '' }} {{ in_array($prefix . 'name', $requiredFields) ? 'required' : '' }}'>
            {!! Form::label($prefix .'name', Translate::recursive('portfolio::members.name') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-6">
                {!! Form::text($prefix .'name', $input[$prefix .'name'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'name', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has($prefix .'vat_nr') ? 'has-error' : '' }} {{ in_array($prefix . 'vat_nr', $requiredFields) ? 'required' : '' }}'>
            {!! Form::label($prefix .'vat_nr', Translate::recursive('portfolio::members.vat_nr') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text($prefix .'vat_nr', $input[$prefix .'vat_nr'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'vat_nr', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has($prefix .'email') ? 'has-error' : '' }} {{ in_array($prefix . 'email', $requiredFields) ? 'required' : '' }}'>
            {!! Form::label($prefix .'email', Translate::recursive('portfolio::members.email') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-6">
                {!! Form::text($prefix .'email', $input[$prefix .'email'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'email', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has($prefix .'url') ? 'has-error' : '' }} {{ in_array($prefix . 'url', $requiredFields) ? 'required' : '' }}'>
            {!! Form::label($prefix .'url', Translate::recursive('portfolio::members.url') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-8">
                {!! Form::text($prefix .'url', $input[$prefix .'url'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'url', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has($prefix .'phone') ? 'has-error' : '' }} {{ in_array($prefix . 'phone', $requiredFields) ? 'required' : '' }}'>
            {!! Form::label($prefix .'phone', Translate::recursive('portfolio::members.phone') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text($prefix .'phone', $input[$prefix .'phone'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'phone', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has($prefix .'fax') ? 'has-error' : '' }} {{ in_array($prefix . 'fax', $requiredFields) ? 'required' : '' }}'>
            {!! Form::label($prefix .'fax', Translate::recursive('portfolio::members.fax') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text($prefix .'fax', $input[$prefix .'fax'], array('class' => 'form-control')) !!}
                {!! $errors->first($prefix .'fax', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
    </div>
