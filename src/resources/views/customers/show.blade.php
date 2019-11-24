@extends('bootstrap.layouts.master')


@section('page-title')
    {{ $customer->object->present()->fullName }}
@endsection


@section('content-title')
    {{ $customer->object->present()->fullName }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('route' => array('admin.customers.show', $customer->id), 'method' => 'delete')) !!}
            {!! HTML::iconRoute('admin.customers.edit', Translate::recursive('common.edit'), 'edit', array($customer->id), array('class' => 'btn btn-default')) !!}
            {!! Form::iconSubmit(Translate::recursive('common.delete'), 'trash', array('class' => 'btn btn-danger')) !!}
            {!! HTML::iconRoute('admin.projects.create', Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'project')), 'plus', array('customer_id' => $customer->id), array('class' => 'btn btn-primary')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row col-md-12">&nbsp;</div>

    @include( $contentTemplate, $contentParameters )

@endsection
