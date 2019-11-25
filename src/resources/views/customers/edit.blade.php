@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'customer')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('portfolio::admin.menu.title.edit', array('model' => 'customer')) }}
@endsection


@section('content')

    {!! Form::open(array('route' => array('admin.customers.show', $customer->id), 'method' => 'put', 'id' => 'editCustomer', 'class' => 'form-horizontal', 'role' => 'form')) !!}

        {!! Form::hidden('customerType', $form['customerType']) !!}

        @include($form['template'], array('input' => $input, 'prefix' => $prefix))

        <div class="row col-md-12">&nbsp;</div>

        <div class="align-right">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('admin.customers.show', Translate::recursive('common.cancel'), array($customer->id), array('class' => 'btn btn-outline-secondary')) !!}
        </div>

    {!! Form::close() !!}

@endsection
