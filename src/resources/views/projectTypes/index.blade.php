@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'projectType')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'projectType')) }}
@endsection


@section('content')

    <div class="d-flex flex-row-reverse bd-highlight">
        <p>
            {!! HTML::iconRoute('admin.projectTypes.create', Translate::recursive('common.new'), 'plus', array(), array('class' => 'btn btn-primary')) !!}
        </p>
    </div>

    @include('portfolio::projectTypes.filter')

    @include('portfolio::projectTypes.table')

@endsection
