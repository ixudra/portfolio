@extends('bootstrap.layouts.master')


@section('page-title')
    {{ $project->name }}
@endsection


@section('content-title')
    {{ $project->name }}
@endsection


@section('content')

    <div class="row col-md-12">
        {!! Form::open(array('route' => array('admin.projects.show', $project->id), 'method' => 'delete')) !!}
            {!! HTML::iconRoute('admin.projects.edit', Translate::recursive('common.edit'), 'edit', array($project->id), array('class' => 'btn btn-outline-secondary')) !!}
            {!! Form::iconSubmit(Translate::recursive('common.delete'), 'trash-alt', array('class' => 'btn btn-danger')) !!}
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
                        <div class='col-md-4'>{{ Translate::recursive('portfolio::members.customer_id') }}:</div>
                        <div class="col-md-8">
                            {!! HTML::iconRoute('admin.customers.show', '', $project->customer->object->present()->segmentIcon, array($project->customer->id)) !!}
                            {!! HTML::linkRoute('admin.customers.show', $project->customer->object->present()->fullName, array($project->customer->id)) !!}
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class='col-md-4'>{{ Translate::recursive('portfolio::members.project_type_id') }}:</div>
                        <div class='col-md-8'>{{ $project->projectType->name }}</div>
                    </div>
                    <div class="row col-md-12">
                        <div class='col-md-4'>{{ Translate::recursive('portfolio::members.start_date') }}:</div>
                        <div class='col-md-8'>{{ $project->start_date }}</div>
                    </div>
                    <div class="row col-md-12">
                        <div class='col-md-4'>{{ Translate::recursive('portfolio::members.end_date') }}:</div>
                        <div class='col-md-8'>{{ $project->end_date }}</div>
                    </div>
                    <div class="row col-md-12">
                        <div class='col-md-4'>{{ Translate::recursive('portfolio::members.status') }}:</div>
                        <div class='col-md-8'>{{ $project->present()->projectStatus }}</div>
                    </div>
                    <div class="row col-md-12">
                        <div class='col-md-4'>{{ Translate::recursive('portfolio::members.hidden') }}:</div>
                        <div class='col-md-8'>{{ $project->present()->isHidden }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ Translate::recursive('portfolio::members.description') }}
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        {!! $project->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ Translate::recursive('portfolio::members.image') }}
                </div>
                <div class="card-body">
                    <div class="row col-md-12">

                        @include('imageable::images/data', array('imageable' => $project))

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
