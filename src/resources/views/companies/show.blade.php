@extends('bootstrap.layouts.master')


@section('page-title')
    {{ $company->name }}
@endsection


@section('content-title')
    {{ $company->name }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('route' => array('admin.companies.show', $company->id), 'method' => 'delete')) !!}
            {!! HTML::iconRoute('admin.companies.edit', Translate::recursive('common.edit'), 'edit', array($company->id), array('class' => 'btn btn-default')) !!}
            {!! Form::iconSubmit(Translate::recursive('common.delete'), 'trash', array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::companies.show.content', array('company' => $company))

@endsection
