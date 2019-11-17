@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'project')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'project')) }}
@endsection


@section('content')

    @include('portfolio::projects.form', array('route' => array('admin.projects.show', $project->id), 'method' => 'put', 'formId' => 'editProject', 'redirectUrl' => 'admin.projects.show', 'redirectParameters' => array($project->id)))

@endsection
