{!! Form::open(array('route' => $route, 'method' => $method, 'id' => $formId, 'class' => 'form-horizontal', 'role' => 'form')) !!}

    @include('portfolio::people.form.full', array('prefix' => $prefix))

    <div class="action-button pull-right">
        {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
        {!! HTML::linkRoute($redirectUrl, Translate::recursive('common.cancel'), $redirectParameters, array('class' => 'btn btn-default')) !!}
    </div>

{!! Form::close() !!}
