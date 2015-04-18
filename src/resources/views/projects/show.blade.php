@extends('bootstrap.layouts.master')


@section('content-title')
    {{ $project->name }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('url' => '/admin/projects/'. $project->id, 'method' => 'delete')) !!}
            {!! HTML::linkRoute('admin.projects.edit', Translate::recursive('portfolio::common.edit'), array($project->id), array('class' => 'btn btn-default')) !!}
            {!! Form::submit(Translate::recursive('portfolio::common.delete'), array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row">
        <div class="well well-large col-md-12">
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.customer_id') }}:</div>
                <div class='col-md-8'>
                    {!! HTML::iconRoute('admin.customers.show', '', $project->customer->object->present()->segmentIcon, array($project->customer->id)) !!}
                    {!! HTML::linkRoute('admin.customers.show', $project->customer->object->present()->fullName, array($project->customer->id)) !!}
                </div>
            </div>
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.description') }}:</div>
                <div class='col-md-8'>{{ $project->description }}</div>
            </div>
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.start_date') }}:</div>
                <div class='col-md-8'>{{ $project->start_date }}</div>
            </div>
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.end_date') }}:</div>
                <div class='col-md-8'>{{ $project->end_date }}</div>
            </div>
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.status') }}:</div>
                <div class='col-md-8'>{{ $project->present()->projectStatus }}</div>
            </div>
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.hidden') }}:</div>
                <div class='col-md-8'>{{ $project->present()->isHidden }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <h3>{{ Translate::recursive('portfolio::members.image') }}</h3>
    </div>
    @include('imageable::images/data', array('imageable' => $project))

@endsection