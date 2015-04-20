@extends('bootstrap.layouts.master')


@section('content-title')
    {{ $projectType->name }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('url' => '/admin/projectTypes/'. $projectType->id, 'method' => 'delete')) !!}
            {!! HTML::linkRoute('admin.projectTypes.edit', Translate::recursive('common.edit'), array($projectType->id), array('class' => 'btn btn-default')) !!}
            {!! Form::submit(Translate::recursive('common.delete'), array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row">
        <div class="well well-large col-md-12">
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.name') }}:</div>
                <div class='col-md-8'>{{ $projectType->name }}</div>
            </div>
        </div>
    </div>

@endsection