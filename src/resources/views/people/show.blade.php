@extends('bootstrap.layouts.master')


@section('page-title')
    {{ $person->present()->fullName }}
@endsection


@section('content-title')
    {{ $person->present()->fullName }}
@endsection


@section('content')

    <div class="row">
        {!! Form::open(array('route' => array('admin.people.show', $person->id), 'method' => 'delete')) !!}
            {!! HTML::iconRoute('admin.people.edit', Translate::recursive('common.edit'), 'edit', array($person->id), array('class' => 'btn btn-default')) !!}
            {!! Form::iconSubmit(Translate::recursive('common.delete'), 'trash', array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row col-md-12">&nbsp;</div>

    @include('portfolio::people.show.content', array('person' => $person))

@endsection
