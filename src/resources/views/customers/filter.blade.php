<div class="row">
    {!! Form::open(array('route' => array('admin.customers.filter'), 'method' => 'POST', 'id' => 'filterCustomers', 'class' => 'form-inline', 'role' => 'form')) !!}
        <div class="form-group">
            {!! Form::label('query', Translate::recursive('common.query') .': ', array('class' => 'sr-only')) !!}
            {!! Form::text('query', $input['query'], array('placeholder' => Translate::recursive('common.query'), 'class' => 'form-control', 'id' => 'query')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('withProjects', Translate::recursive('portfolio::form.withProjects') .': ', array('class' => 's')) !!}
            {!! Form::select('withProjects', $withProjectOptions, $input['withProjects'], array('placeholder' => Translate::recursive('portfolio::form.withProjects'), 'class' => 'form-control', 'id' => 'withProjects')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('admin.customers.index', Translate::recursive('common.clear'), array(), array('class' => 'btn btn-default')) !!}
        </div>
    {!! Form::close() !!}
</div>
