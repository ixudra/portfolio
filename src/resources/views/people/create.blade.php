@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.new', array('model' => 'person')) }}
@endsection


@section('content')

@include('portfolio::people.form', array('url' => 'admin/people/', 'method' => 'post', 'input' => $input, 'formId' => 'createPerson', 'redirectUrl' => 'admin.people.index', 'redirectParameters' => array()))

@endsection