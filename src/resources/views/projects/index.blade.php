@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'project')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'project')) }}
@endsection


@section('content')

    <div class="d-flex flex-row-reverse bd-highlight">
        <p>
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#projectFilters" aria-expanded="false" aria-controls="projectFilters">
                <i class="fas fa-sliders-h" aria-hidden="true"></i> {{ Translate::recursive('portfolio::common.filters') }}
            </button>
            {!! HTML::iconRoute('admin.projects.create', Translate::recursive('common.new'), 'plus', array(), array('class' => 'btn btn-primary')) !!}
        </p>
    </div>

    @include('portfolio::projects.filter')

    @include('portfolio::projects.table')

@endsection
