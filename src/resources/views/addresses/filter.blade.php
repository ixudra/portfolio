<div class="row">
    {!! Form::open(array('url' => '/admin/addresses/filter', 'method' => 'POST', 'id' => 'filterAddresses', 'class' => 'form-inline', 'role' => 'form')) !!}
        <div class="form-group">
            {!! Form::label('city_id', Translate::recursive('portfolio::members.city') .': ', array('class' => 'sr-only')) !!}
            {!! Form::select('city_id', $cities, $input['city_id'], array('placeholder' => Translate::recursive('portfolio::members.city'), 'class' => 'form-control', 'id' => 'city_id')) !!}
        </div>
        <div class="form-group">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('admin.addresses.index', Translate::recursive('common.clear'), array(), array('class' => 'btn btn-default')) !!}
        </div>
    {!! Form::close() !!}
</div>
