@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'projectType')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'projectType')) }}
@endsection


@section('content')

    <div class="row">
        <p>
            {!! HTML::linkRoute('admin.projectTypes.create', Translate::recursive('common.new'), array(), array('class' => 'btn btn-default')) !!}
        </p>
    </div>

    @include('portfolio::projectTypes.filter')

    @include('portfolio::projectTypes.table')

@endsection
