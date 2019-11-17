@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'customer')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'customer')) }}
@endsection


@section('content')

    <div class="row">
        <p>
            {!! HTML::iconRoute('admin.customers.create', Translate::recursive('common.new'), 'plus', array(), array('class' => 'btn btn-primary')) !!}
        </p>
    </div>

    @include('portfolio::customers.filter')

    @include('portfolio::customers.table')

@endsection
