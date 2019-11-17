@extends('bootstrap.layouts.master')


@section('page-title')
    {{ $projectType->name }}
@endsection


@section('content-title')
    {{ $projectType->name }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('route' => array('admin.projectTypes.show', $projectType->id), 'method' => 'delete')) !!}
            {!! HTML::iconRoute('admin.projectTypes.edit', Translate::recursive('common.edit'), 'edit', array($projectType->id), array('class' => 'btn btn-default')) !!}
            {!! Form::iconSubmit(Translate::recursive('common.delete'), 'trash', array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="row">
        <div class="well well-large col-md-12">
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.name') }}:</div>
                <div class='col-md-8'>{{ $projectType->name }}</div>
            </div>
        </div>
    </div>

@endsection
