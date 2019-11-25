
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $title }}
                </div>
                <div class="card-body">
                    {!! Form::openFormGroup($prefix .'first_name', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'first_name', Translate::recursive('portfolio::members.first_name') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-6">
                            {!! Form::text($prefix .'first_name', $input[$prefix .'first_name'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'first_name', $errors) !!}
                    {!! Form::openFormGroup($prefix .'last_name', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'last_name', Translate::recursive('portfolio::members.last_name') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-4">
                            {!! Form::text($prefix .'last_name', $input[$prefix .'last_name'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'last_name', $errors) !!}
                    {!! Form::openFormGroup($prefix .'birth_date', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'birth_date', Translate::recursive('portfolio::members.birth_date') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-3">
                            {!! Form::text($prefix .'birth_date', $input[$prefix .'birth_date'], array('class' => 'form-control datePicker')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'birth_date', $errors) !!}
                    {!! Form::openFormGroup($prefix .'email', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'email', Translate::recursive('portfolio::members.email') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-6">
                            {!! Form::text($prefix .'email', $input[$prefix .'email'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'email', $errors) !!}
                    {!! Form::openFormGroup($prefix .'cellphone', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'cellphone', Translate::recursive('portfolio::members.cellphone') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-6">
                            {!! Form::text($prefix .'cellphone', $input[$prefix . 'cellphone'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'cellphone', $errors) !!}
                </div>
            </div>
        </div>
    </div>
