@extends('bootstrap.layouts.master')


@section('content-title')
    {{ Translate::recursive('admin.menu.title.new', array('model' => 'address')) }}
@endsection


@section('content')

@include('portfolio::addresses.form', array('url' => 'admin/addresses/', 'method' => 'post', 'input' => $input, 'formId' => 'createAddress', 'redirectUrl' => 'admin.addresses.index', 'redirectParameters' => array()))

@endsection