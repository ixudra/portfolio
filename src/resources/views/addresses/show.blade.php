@extends('bootstrap.layouts.master')


@section('content-title')
    {{ $address->present()->name }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('url' => '/admin/addresses/'. $address->id, 'method' => 'delete')) !!}
            {!! HTML::linkRoute('admin.addresses.edit', Translate::recursive('common.edit'), array($address->id), array('class' => 'btn btn-default')) !!}
            {!! Form::submit(Translate::recursive('common.delete'), array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    @include('portfolio::addresses.data')

@endsection