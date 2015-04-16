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

    @include('portfolio::people.show.content', array('person' => $person))

@endsection