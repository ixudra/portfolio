
<div id="personFilters" class="collapse">
    {!! Form::open(array('route' => array('admin.people.filter'), 'method' => 'POST', 'id' => 'filterPeople')) !!}
        <div class="form-row">
            <div class="col-md-4 mb-3">
                {!! Form::label('query', Translate::recursive('common.query') .': ') !!}
                {!! Form::text('query', $input['query'], array('placeholder' => Translate::recursive('common.query'), 'class' => 'form-control', 'id' => 'query')) !!}
            </div>
            <div class="col-md-6 mb-3 align-bottom">
                {!! Form::label('query','&nbsp;') !!}
                <div class="form-group">
                    {!! Form::iconSubmit(Translate::recursive('common.search'), 'search', array('class' => 'btn btn-primary align-bottom')) !!}
                    {!! HTML::iconRoute('admin.people.index', Translate::recursive('common.clear'), 'times', array(), array('class' => 'btn btn-outline-secondary')) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
