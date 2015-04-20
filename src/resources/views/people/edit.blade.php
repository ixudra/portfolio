@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'person')) }}
@endsection


@section('content')

@include('portfolio::people.form', array('url' => 'admin/people/'.$person->id, 'method' => 'put', 'input' => $input, 'formId' => 'editPerson', 'redirectUrl' => 'admin.people.show', 'redirectParameters' => array($person->id)))

@endsection