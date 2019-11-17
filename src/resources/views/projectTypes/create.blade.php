@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'projectType')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'projectType')) }}
@endsection


@section('content')

    @include('portfolio::projectTypes.form', array('route' => array('admin.projectTypes.index'), 'method' => 'post', 'input' => $input, 'formId' => 'createProjectType', 'redirectUrl' => 'admin.projectTypes.index', 'redirectParameters' => array()))

@endsection
