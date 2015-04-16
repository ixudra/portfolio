@extends('bootstrap.layouts.master')


@section('content-title')
    {{ $customer->object->present()->fullName }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('url' => '/admin/customers/'. $customer->id, 'method' => 'delete')) !!}
            {!! HTML::linkRoute('admin.customers.edit', Translate::recursive('common.edit'), array($customer->id), array('class' => 'btn btn-default')) !!}
            {!! Form::submit(Translate::recursive('common.delete'), array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    @include( $contentTemplate, $contentParameters )

@endsection