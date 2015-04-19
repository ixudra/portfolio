@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'project')) }}
@stop


@section('content')

    @include('portfolio::projects.form', array('url' => 'admin/projects/', 'method' => 'post', 'formId' => 'createProject', 'redirectUrl' => 'admin.projects.index', 'redirectParameters' => array()))

@stop