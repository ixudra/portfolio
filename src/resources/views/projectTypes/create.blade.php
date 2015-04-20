@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'projectType')) }}
@endsection


@section('content')

@include('portfolio::projectTypes.form', array('url' => 'admin/projectTypes/', 'method' => 'post', 'input' => $input, 'formId' => 'createProjectType', 'redirectUrl' => 'admin.projectTypes.index', 'redirectParameters' => array()))

@endsection