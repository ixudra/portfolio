<div class="row">
    {!! Form::open(array('url' => '/admin/projects/filter', 'method' => 'POST', 'id' => 'filterProjects', 'class' => 'form-inline', 'role' => 'form')) !!}
        <div class="form-group">
            {!! Form::label('contractor_id', Translate::recursive('members.contractor_id') .': ', array('class' => 'sr-only')) !!}
            {!! Form::text('contractor_id', $input['contractor_id'], array('placeholder' => Translate::recursive('members.contractor_id'), 'class' => 'form-control', 'id' => 'contractor_id')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('customer_id', Translate::recursive('members.customer_id') .': ', array('class' => 'sr-only')) !!}
            {!! Form::text('customer_id', $input['customer_id'], array('placeholder' => Translate::recursive('members.customer_id'), 'class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('project_type_id', Translate::recursive('members.project_type_id') .': ', array('class' => '')) !!}
            {!! Form::select('project_type_id', $projectTypes, $input['project_type_id'], array('placeholder' => Translate::recursive('members.project_type_id'), 'class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('admin.projects.index', Translate::recursive('common.clear'), array(), array('class' => 'btn btn-default')) !!}
        </div>
    {!! Form::close() !!}
</div>
