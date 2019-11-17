@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'address')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'address')) }}
@endsection


@section('content')

    <div class="row">
        <p>
            {!! HTML::iconRoute('admin.addresses.create', Translate::recursive('common.new'), 'plus', array(), array('class' => 'btn btn-primary')) !!}
        </p>
    </div>

    @include('portfolio::addresses.filter')

    @include('portfolio::addresses.table')

@endsection
