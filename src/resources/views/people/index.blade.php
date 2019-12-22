@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'person')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'person')) }}
@endsection


@section('content')

    <div class="row">
        <p>
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#personFilters" aria-expanded="false" aria-controls="personFilters">
                <i class="fas fa-sliders-h" aria-hidden="true"></i> {{ Translate::recursive('portfolio::common.filters') }}
            </button>
            {!! HTML::iconRoute('admin.people.create', Translate::recursive('common.new'), 'plus', array(), array('class' => 'btn btn-primary')) !!}
        </p>
    </div>

    @include('portfolio::people.filter')

    @include('portfolio::people.table')

@endsection
