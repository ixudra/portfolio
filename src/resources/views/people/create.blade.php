@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'person')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'person')) }}
@endsection


@section('content')

    @include('portfolio::people.form', array('route' => array('admin.people.index'), 'method' => 'post', 'input' => $input, 'formId' => 'createPerson', 'redirectUrl' => 'admin.people.index', 'redirectParameters' => array()))

@endsection
