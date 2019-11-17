@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'company')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'company')) }}
@endsection


@section('content')

    <div class="row">
        <p>
            {!! HTML::iconRoute('admin.companies.create', Translate::recursive('common.new'), 'plus', array(), array('class' => 'btn btn-primary')) !!}
        </p>
    </div>

    @include('portfolio::companies.filter')

    @include('portfolio::companies.table')

@endsection
