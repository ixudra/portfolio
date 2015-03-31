@extends('bootstrap.layouts.master')


@section('content-title')
    {{ $person->present()->fullName }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('url' => '/admin/people/'. $person->id, 'method' => 'delete')) !!}
            {!! HTML::linkRoute('admin.people.edit', Translate::recursive('common.edit'), array($person->id), array('class' => 'btn btn-default')) !!}
            {!! Form::submit(Translate::recursive('common.delete'), array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row">
        <div class="well well-large col-md-12">
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('members.birth_date') }}:</div>
                <div class='col-md-8'>{{ $person->birth_date }}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('members.email') }}:</div>
                <div class='col-md-8'>{!! link_to('mailto:'. $person->email, $person->email) !!}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('members.cellphone') }}:</div>
                <div class='col-md-8'>{{ $person->cellphone }}</div>
            </div>
        </div>
    </div>

    @include('portfolio::addresses.data', array('address' => $person->address))

@endsection