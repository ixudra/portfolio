{!! Form::open(array('url' => $url, 'method' => $method, 'id' => $formId, 'class' => 'form-horizontal', 'role' => 'form')) !!}

    <div class="well well-large">
        <div class='form-group {{ $errors->has('name') ? 'has-error' : '' }}'>
            {!! Form::label('name', Translate::recursive('portfolio::members.name') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text('name', $input['name'], array('class' => 'form-control')) !!}
                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
    </div>
    <div class="action-button">
        {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
        {!! HTML::linkRoute($redirectUrl, Translate::recursive('common.cancel'), $redirectParameters, array('class' => 'btn btn-default')) !!}
    </div>

{!! Form::close() !!}