@extends('bootstrap.layouts.master')


@section('content-title')
    {{ $customer->object->present()->fullName }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('route' => array('admin.customers.show', $customer->id), 'method' => 'delete')) !!}
            {!! HTML::iconRoute('admin.customers.edit', Translate::recursive('common.edit'), 'edit', array($customer->id), array('class' => 'btn btn-default')) !!}
            {!! Form::iconSubmit(Translate::recursive('common.delete'), 'trash', array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row col-md-12">&nbsp;</div>

    @include( $contentTemplate, $contentParameters )

@endsection
