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
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#addressFilters" aria-expanded="false" aria-controls="addressFilters">
                <i class="fas fa-sliders-h" aria-hidden="true"></i> {{ Translate::recursive('portfolio::common.filters') }}
            </button>
            {!! HTML::iconRoute('admin.addresses.create', Translate::recursive('common.new'), 'plus', array(), array('class' => 'btn btn-primary')) !!}
        </p>
    </div>

    @include('portfolio::addresses.filter')

    @include('portfolio::addresses.table')

@endsection
