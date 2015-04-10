@extends('bootstrap.layouts.master')


@section('content-title')
    {{ $project->name }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('url' => '/admin/projects/'. $project->id, 'method' => 'delete')) !!}
            {!! HTML::linkRoute('admin.projects.edit', Translate::recursive('common.edit'), array($project->id), array('class' => 'btn btn-default')) !!}
            {!! Form::submit(Translate::recursive('common.delete'), array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row">
        <div class="well well-large col-md-12">
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('members.description') }}:</div>
                <div class='col-md-8'>{{ $project->description }}</div>
            </div>
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('members.customer_id') }}:</div>
                <div class='col-md-8'>
                    <span class="glyphicon glyphicon-{{ $project->customer->object->present()->segmentIcon }}" aria-hidden="true"></span>
                    {!! HTML::linkRoute('admin.'. $project->customer->object->getUrlKey() .'.show', $project->customer->object->present()->fullName, array($project->customer_id)) !!}
                </div>
            </div>
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('members.contractor_id') }}:</div>
                <div class='col-md-8'>{{ $project->contractor_id }}</div>
            </div>
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('members.start_date') }}:</div>
                <div class='col-md-8'>{{ $project->start_date }}</div>
            </div>
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('members.end_date') }}:</div>
                <div class='col-md-8'>{{ $project->end_date }}</div>
            </div>
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('members.status') }}:</div>
                <div class='col-md-8'>{{ $project->status }}</div>
            </div>
            <div class='col-md-10'>
                <div class='col-md-4'>{{ Translate::recursive('members.hidden') }}:</div>
                <div class='col-md-8'>{{ $project->present()->isHidden }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <h3>Project image</h3>
    </div>
    @include('imageable::images/data', array('imageable' => $project))

@endsection