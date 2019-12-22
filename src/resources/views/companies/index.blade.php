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
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#companyFilters" aria-expanded="false" aria-controls="companyFilters">
                <i class="fas fa-sliders-h" aria-hidden="true"></i> {{ Translate::recursive('portfolio::common.filters') }}
            </button>
            {!! HTML::iconRoute('admin.companies.create', Translate::recursive('common.new'), 'plus', array(), array('class' => 'btn btn-primary')) !!}
        </p>
    </div>

    @include('portfolio::companies.filter')

    @include('portfolio::companies.table')

@endsection
