@extends('bootstrap.layouts.master')


@section('page-title')
    {{ $address->present()->name }}
@endsection


@section('content-title')
    {{ $address->present()->name }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('route' => array('admin.addresses.show', $address->id), 'method' => 'delete')) !!}
            {!! HTML::iconRoute('admin.addresses.edit', Translate::recursive('common.edit'), 'edit', array($address->id), array('class' => 'btn btn-default')) !!}
            {!! Form::iconSubmit(Translate::recursive('common.delete'), 'trash', array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::addresses.data')

@endsection
