@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'customer')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'customer')) }}
@endsection


@section('content')

    <div class="d-flex flex-row-reverse bd-highlight">
        <p>
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#customerFilters" aria-expanded="false" aria-controls="customerFilters">
                <i class="fas fa-sliders-h" aria-hidden="true"></i> {{ Translate::recursive('portfolio::common.filters') }}
            </button>
            {!! HTML::iconRoute('admin.customers.create', Translate::recursive('common.new'), 'plus', array(), array('class' => 'btn btn-primary')) !!}
        </p>
    </div>

    @include('portfolio::customers.filter')

    @include('portfolio::customers.table')

@endsection
