@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('admin.menu.title.edit', array('model' => 'project')) }}
@stop


@section('content')

    @include('portfolio::projects.form', array('url' => 'admin/projects/'. $project->id, 'method' => 'put', 'formId' => 'editProject', 'redirectUrl' => 'admin.projects.show', 'redirectParameters' => array($project->id)))

@stop