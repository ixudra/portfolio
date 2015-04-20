@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.index', array('model' => 'company')) }}
@endsection


@section('content')

    <div class="row">
        <p>
            {!! HTML::linkRoute('admin.companies.create', Translate::recursive('common.new'), array(), array('class' => 'btn btn-default')) !!}
        </p>
    </div>

    @include('portfolio::companies.filter')

    @include('portfolio::companies.table')

@endsection