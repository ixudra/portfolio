@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'person')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'person')) }}
@endsection


@section('content')

    @include('portfolio::people.form', array('route' => array('admin.people.show', $person->id), 'method' => 'put', 'input' => $input, 'formId' => 'editPerson', 'redirectUrl' => 'admin.people.show', 'redirectParameters' => array($person->id)))

@endsection
