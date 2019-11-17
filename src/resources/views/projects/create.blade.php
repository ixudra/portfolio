@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'project')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'project')) }}
@endsection


@section('content')

    @include('portfolio::projects.form', array('route' => array('admin.projects.index'), 'method' => 'post', 'formId' => 'createProject', 'redirectUrl' => 'admin.projects.index', 'redirectParameters' => array()))

@endsection
