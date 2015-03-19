<div class="row">
    {!! Form::open(array('url' => '/admin/customers/filter', 'method' => 'POST', 'id' => 'filterCustomers', 'class' => 'form-inline', 'role' => 'form')) !!}
        <div class="form-group">
            {!! Form::label('first_name', Translate::recursive('members.first_name') .': ', array('class' => 'sr-only')) !!}
            {!! Form::text('first_name', $input['first_name'], array('placeholder' => Translate::recursive('members.first_name'), 'class' => 'form-control', 'id' => 'first_name')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('last_name', Translate::recursive('members.last_name') .': ', array('class' => 'sr-only')) !!}
            {!! Form::text('last_name', $input['last_name'], array('placeholder' => Translate::recursive('members.last_name'), 'class' => 'form-control', 'id' => 'last_name')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('admin.customers.index', Translate::recursive('common.clear'), array(), array('class' => 'btn btn-default')) !!}
        </div>
    {!! Form::close() !!}
</div>
