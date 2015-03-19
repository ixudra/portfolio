@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('admin.menu.title.edit', array('model' => 'projectType')) }}
@endsection


@section('content')

@include('portfolio::projectTypes.form', array('url' => 'admin/projectTypes/'.$projectType->id, 'method' => 'put', 'input' => $input, 'formId' => 'editProjectType', 'redirectUrl' => 'admin.projectTypes.show', 'redirectParameters' => array($projectType->id)))

@endsection