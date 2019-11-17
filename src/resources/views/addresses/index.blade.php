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
            {!! HTML::linkRoute('admin.addresses.create', Translate::recursive('common.new'), array(), array('class' => 'btn btn-default')) !!}
        </p>
    </div>

    @include('portfolio::addresses.filter')

    @include('portfolio::addresses.table')

@endsection
