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
            {!! HTML::linkRoute('admin.people.create', Translate::recursive('common.new'), array(), array('class' => 'btn btn-default')) !!}
        </p>
    </div>

    @include('portfolio::people.filter')

    @include('portfolio::people.table')

@endsection
