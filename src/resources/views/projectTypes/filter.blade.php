<div class="row">
    {!! Form::open(array('url' => '/admin/projectTypes/filter', 'method' => 'POST', 'id' => 'filterCustomers', 'class' => 'form-inline', 'role' => 'form')) !!}
        <div class="form-group">
            {!! Form::label('name', Translate::recursive('members.name') .': ', array('class' => 'sr-only')) !!}
            {!! Form::text('name', $input['name'], array('placeholder' => Translate::recursive('members.name'), 'class' => 'form-control', 'id' => 'name')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('admin.projectTypes.index', Translate::recursive('common.clear'), array(), array('class' => 'btn btn-default')) !!}
        </div>
    {!! Form::close() !!}
</div>
