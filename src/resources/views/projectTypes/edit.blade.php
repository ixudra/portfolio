@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'projectType')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'projectType')) }}
@endsection


@section('content')

    @include('portfolio::projectTypes.form', array('route' => array('admin.projectTypes.show', $projectType->id), 'method' => 'put', 'input' => $input, 'formId' => 'editProjectType', 'redirectUrl' => 'admin.projectTypes.show', 'redirectParameters' => array($projectType->id)))

@endsection
