{!! Form::open(array('url' => $url, 'method' => $method, 'id' => $formId, 'class' => 'form-horizontal', 'role' => 'form', 'files' => true)) !!}

    <div class="well well-large">
        <div class='form-group {{ $errors->has('name') ? 'has-error' : '' }}'>
            {!! Form::label('name', Translate::recursive('portfolio::members.name') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-6">
                {!! Form::text('name', $input['name'], array('class' => 'form-control')) !!}
                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        {!! Form::hidden('contractor_id', $input['contractor_id']) !!}
        <div class='form-group {{ $errors->has('customer_id') ? 'has-error' : '' }}'>
            {!! Form::label('customer_id', Translate::recursive('portfolio::members.customer_id') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::select('customer_id', $customers, $input['customer_id'], array('class' => 'form-control')) !!}
                {!! $errors->first('customer_id', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has('description') ? 'has-error' : '' }}'>
            {!! Form::label('description', Translate::recursive('portfolio::members.description') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-8">
                {!! Form::textarea('description', $input['description'], array('class' => 'form-control', 'rows' => '6')) !!}
                {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has('project_type_id') ? 'has-error' : '' }}'>
            {!! Form::label('project_type_id', Translate::recursive('portfolio::members.project_type_id') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::select('project_type_id', $projectTypes, $input['project_type_id'], array('class' => 'form-control')) !!}
                {!! $errors->first('project_type_id', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has('start_date') ? 'has-error' : '' }}'>
            {!! Form::label('start_date', Translate::recursive('portfolio::members.start_date') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text('start_date', $input['start_date'], array('class' => 'form-control datePicker')) !!}
                {!! $errors->first('start_date', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has('end_date') ? 'has-error' : '' }}'>
            {!! Form::label('end_date', Translate::recursive('portfolio::members.end_date') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::text('end_date', $input['end_date'], array('class' => 'form-control datePicker')) !!}
                {!! $errors->first('end_date', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has('status') ? 'has-error' : '' }}'>
            {!! Form::label('status', Translate::recursive('portfolio::members.status') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::select('status', $statuses, $input['status'], array('class' => 'form-control')) !!}
                {!! $errors->first('status', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group {{ $errors->has('hidden') ? 'has-error' : '' }}'>
            {!! Form::label('hidden', Translate::recursive('portfolio::members.hidden') .': ', array('class' => 'control-label col-lg-3')) !!}
            <div class="col-lg-4">
                {!! Form::checkbox('hidden', 'isHidden', $input['hidden'], array('class' => '')) !!}
                {!! $errors->first('hidden', '<span class="help-block">:message</span>') !!}
            </div>
        </div>
    </div>

    @include('imageable::images/fields')

    <div class="action-button">
        {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
        {!! HTML::linkRoute($redirectUrl, Translate::recursive('common.cancel'), $redirectParameters, array('class' => 'btn btn-default')) !!}
    </div>

{!! Form::close() !!}