@extends('bootstrap.layouts.master')


@section('page-title')
    {{ $projectType->name }}
@endsection


@section('content-title')
    {{ $projectType->name }}
@endsection


@section('content')

    <div class="row col-md-12">
        {!! Form::open(array('route' => array('admin.projectTypes.show', $projectType->id), 'method' => 'delete')) !!}
            {!! HTML::iconRoute('admin.projectTypes.edit', Translate::recursive('common.edit'), 'edit', array($projectType->id), array('class' => 'btn btn-outline-secondary')) !!}
            {!! Form::iconSubmit(Translate::recursive('common.delete'), 'alt-trash', array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ Translate::recursive('common.titles.basicInformation') }}
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        <div class='col-md-4'>{{ Translate::recursive('portfolio::members.name') }}:</div>
                        <div class='col-md-8'>{{ $projectType->name }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
