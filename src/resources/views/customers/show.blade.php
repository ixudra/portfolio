@extends('bootstrap.layouts.master')


@section('content-title')
    {{ $customer->present()->fullName }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('url' => '/admin/customers/'. $customer->id, 'method' => 'delete')) !!}
            {!! HTML::linkRoute('admin.customers.edit', Translate::recursive('common.edit'), array($customer->id), array('class' => 'btn btn-default')) !!}
            {!! Form::submit(Translate::recursive('common.delete'), array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row">
        <div class="well well-large col-md-12">
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('members.email') }}:</div>
                <div class='col-md-8'>{{ $customer->email }}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('members.cellphone') }}:</div>
                <div class='col-md-8'>{{ $customer->cellphone }}</div>
            </div>
        </div>
    </div>

@endsection