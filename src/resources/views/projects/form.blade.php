{!! Form::open(array('route' => $route, 'method' => $method, 'id' => $formId, 'class' => 'form-horizontal', 'role' => 'form', 'files' => true)) !!}

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ Translate::recursive('common.titles.basicInformation') }}
                </div>
                <div class="card-body">
                    {!! Form::openFormGroup($prefix .'name', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'name', Translate::recursive('members.name') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-6">
                            {!! Form::text($prefix .'name', $input[$prefix .'name'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'name', $errors) !!}
                    {!! Form::hidden('contractor_id', $input['contractor_id']) !!}
                    {!! Form::openFormGroup($prefix .'customer_id', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'customer_id', Translate::recursive('portfolio::members.customer_id') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-4">
                            {!! Form::select($prefix .'customer_id', $customers, $input['customer_id'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'customer_id', $errors) !!}
                    {!! Form::openFormGroup($prefix .'project_type_id', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'project_type_id', Translate::recursive('portfolio::members.project_type_id') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-6">
                            {!! Form::select($prefix .'project_type_id', $projectTypes, $input[$prefix .'project_type_id'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'project_type_id', $errors) !!}
                    {!! Form::openFormGroup($prefix .'start_date', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'start_date', Translate::recursive('portfolio::members.start_date') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-3">
                            {!! Form::text($prefix .'start_date', $input[$prefix .'start_date'], array('class' => 'form-control datePicker')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'start_date', $errors) !!}
                    {!! Form::openFormGroup($prefix .'end_date', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'end_date', Translate::recursive('portfolio::members.end_date') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-3">
                            {!! Form::text($prefix .'end_date', $input[$prefix .'end_date'], array('class' => 'form-control datePicker')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'end_date', $errors) !!}
                    {!! Form::openFormGroup($prefix .'status', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'status', Translate::recursive('portfolio::members.status') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-4">
                            {!! Form::select($prefix .'status', $statuses, $input[$prefix .'status'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'status', $errors) !!}
                    {!! Form::openFormGroup($prefix .'hidden', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'hidden', Translate::recursive('portfolio::members.hidden') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-4">
                            {!! Form::checkbox($prefix .'hidden', 'isHidden', $input[$prefix .'hidden'], array('class' => '')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'hidden', $errors) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ Translate::recursive('portfolio::members.description') }}
                </div>
                <div class="card-body">
                    {!! Form::openFormGroup($prefix .'description', $errors, $requiredFields) !!}
                        <div class="col-sm-12">
                            {!! Form::textarea($prefix .'description', $input[$prefix .'description'], array('class' => 'form-control', 'rows' => '6')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'description', $errors) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ Translate::recursive('portfolio::members.image') }}
                </div>
                <div class="card-body">
                    {!! Form::openFormGroup($prefix .'file', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'file', Translate::recursive('imageable::members.file') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-9">
                            {!! Form::file($prefix .'file', array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'file', $errors) !!}
                    {!! Form::openFormGroup($prefix .'title', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'title', Translate::recursive('imageable::members.title') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-9">
                            {!! Form::text($prefix .'title', $input[$prefix .'title'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'title', $errors) !!}
                    {!! Form::openFormGroup($prefix .'alt', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'alt', Translate::recursive('imageable::members.alt') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-9">
                            {!! Form::text($prefix .'alt', $input[$prefix .'alt'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'alt', $errors) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="align-right">
        {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
        {!! HTML::linkRoute($redirectUrl, Translate::recursive('common.cancel'), $redirectParameters, array('class' => 'btn btn-outline-secondary')) !!}
    </div>

{!! Form::close() !!}
