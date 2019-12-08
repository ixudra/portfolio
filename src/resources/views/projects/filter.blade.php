<div>
    {!! Form::open(array('route' => array('admin.projects.filter'), 'method' => 'POST', 'id' => 'filterProjects')) !!}
        <div class="form-row">
            <div class="col-md-4 mb-3">
                {!! Form::label('query', Translate::recursive('common.query') .': ') !!}
                {!! Form::text('query', $input['query'], array('placeholder' => Translate::recursive('common.query'), 'class' => 'form-control', 'id' => 'query')) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!! Form::label('customer_id', Translate::recursive('portfolio::members.customer_id') .': ', array('class' => '')) !!}
                {!! Form::select('customer_id', $customers, $input['customer_id'], array('class' => 'form-control')) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!! Form::label('project_type_id', Translate::recursive('portfolio::members.project_type_id') .': ', array('class' => '')) !!}
                {!! Form::select('project_type_id', $projectTypes, $input['project_type_id'], array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                {!! Form::label('shown', Translate::recursive('portfolio::form.shown') .': ', array('class' => '')) !!}
                {!! Form::select('shown', $visibilityOptions, $input['shown'], array('class' => 'form-control')) !!}
            </div>
            <div class="col-md-6 mb-3">
                {!! Form::label('search','&nbsp;') !!}
                <div class="form-group">
                    {!! Form::iconSubmit(Translate::recursive('common.search'), 'search', array('class' => 'btn btn-primary align-bottom')) !!}
                    {!! HTML::iconRoute('admin.projects.index', Translate::recursive('common.clear'), 'times', array(), array('class' => 'btn btn-outline-secondary')) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
