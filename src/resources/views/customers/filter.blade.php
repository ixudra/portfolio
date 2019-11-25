<div>
    {!! Form::open(array('route' => array('admin.customers.filter'), 'method' => 'POST', 'id' => 'filterCustomers')) !!}
        <div class="form-row">
            <div class="col-md-4 mb-3">
                {!! Form::label('query', Translate::recursive('common.query') .': ') !!}
                {!! Form::text('query', $input['query'], array('placeholder' => Translate::recursive('common.query'), 'class' => 'form-control', 'id' => 'query')) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!! Form::label('withProjects', Translate::recursive('portfolio::form.withProjects') .': ', array('class' => 's')) !!}
                {!! Form::select('withProjects', $withProjectOptions, $input['withProjects'], array('class' => 'form-control', 'id' => 'withProjects')) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!! Form::label('search','&nbsp;') !!}
                <div class="form-group">
                    {!! Form::iconSubmit(Translate::recursive('common.search'), 'search', array('class' => 'btn btn-primary align-bottom')) !!}
                    {!! HTML::iconRoute('admin.users.index', Translate::recursive('common.clear'), 'remove', array(), array('class' => 'btn btn-outline-secondary')) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
