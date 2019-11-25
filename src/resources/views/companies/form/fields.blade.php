
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ Translate::recursive('portfolio::common.titles.basicInformation') }}
                </div>
                <div class="card-body">
                    {!! Form::openFormGroup($prefix .'name', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'name', Translate::recursive('portfolio::members.name') .': ', array('class' => 'control-label col-lg-3')) !!}
                        <div class="col-sm-6">
                            {!! Form::text($prefix .'name', $input[$prefix .'name'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'name', $errors) !!}
                    {!! Form::openFormGroup($prefix .'vat_nr', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'vat_nr', Translate::recursive('portfolio::members.vat_nr') .': ', array('class' => 'control-label col-lg-3')) !!}
                        <div class="col-sm-6">
                            {!! Form::text($prefix .'vat_nr', $input[$prefix .'vat_nr'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'vat_nr', $errors) !!}
                    {!! Form::openFormGroup($prefix .'email', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'email', Translate::recursive('members.email') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-6">
                            {!! Form::text($prefix .'email', $input[$prefix .'email'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'email', $errors) !!}
                    {!! Form::openFormGroup($prefix .'url', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'url', Translate::recursive('portfolio::members.url') .': ', array('class' => 'control-label col-lg-3')) !!}
                        <div class="col-sm-6">
                            {!! Form::text($prefix .'url', $input[$prefix .'url'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'url', $errors) !!}
                    {!! Form::openFormGroup($prefix .'phone', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'phone', Translate::recursive('portfolio::members.phone') .': ', array('class' => 'control-label col-lg-3')) !!}
                        <div class="col-sm-4">
                            {!! Form::text($prefix .'phone', $input[$prefix .'phone'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'phone', $errors) !!}
                    {!! Form::openFormGroup($prefix .'fax', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'fax', Translate::recursive('portfolio::members.fax') .': ', array('class' => 'control-label col-lg-3')) !!}
                        <div class="col-sm-6">
                            {!! Form::text($prefix .'fax', $input[$prefix .'fax'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'fax', $errors) !!}
                </div>
            </div>
        </div>
    </div>
