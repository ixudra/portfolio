<div class="row">
    {!! Form::open(array('route' => array('admin.projectTypes.filter'), 'method' => 'POST', 'id' => 'filterProjectTypes', 'class' => 'form-inline', 'role' => 'form')) !!}
        <div class="form-group">
            {!! Form::label('query', Translate::recursive('common.query') .': ', array('class' => 'sr-only')) !!}
            {!! Form::text('query', $input['query'], array('placeholder' => Translate::recursive('portfolio::members.query'), 'class' => 'form-control', 'id' => 'query')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('admin.projectTypes.index', Translate::recursive('common.clear'), array(), array('class' => 'btn btn-default')) !!}
        </div>
    {!! Form::close() !!}
</div>
