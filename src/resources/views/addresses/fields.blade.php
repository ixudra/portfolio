
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{ $title }}
            </div>
            <div class="card-body">
                {!! Form::openFormGroup($prefix .'street_1', $errors, $requiredFields) !!}
                    {!! Form::label($prefix .'street_1', Translate::recursive('portfolio::members.street') .': ', array('class' => 'control-label col-lg-3')) !!}
                    <div class="col-sm-6">
                        {!! Form::text($prefix .'street_1', $input[$prefix .'street_1'], array('class' => 'form-control')) !!}
                    </div>
                {!! Form::closeFormGroup($prefix .'street_1', $errors) !!}
                {!! Form::openFormGroup($prefix .'street_2', $errors, $requiredFields) !!}
                    {!! Form::label($prefix .'street_2', '&nbsp;', array('class' => 'control-label col-lg-3')) !!}
                    <div class="col-sm-6">
                        {!! Form::text($prefix .'street_2', $input[$prefix .'street_2'], array('class' => 'form-control')) !!}
                    </div>
                {!! Form::closeFormGroup($prefix .'street_2', $errors) !!}
                {!! Form::openFormGroup($prefix .'number', $errors, $requiredFields) !!}
                    {!! Form::label($prefix .'number', Translate::recursive('portfolio::members.number') .': ', array('class' => 'control-label col-sm-3')) !!}
                    <div class="col-sm-2">
                        {!! Form::text($prefix .'number', $input[$prefix .'number'], array('class' => 'form-control')) !!}
                    </div>
                {!! Form::closeFormGroup($prefix .'number', $errors) !!}
                {!! Form::openFormGroup($prefix .'box', $errors, $requiredFields) !!}
                    {!! Form::label($prefix .'box', Translate::recursive('portfolio::members.box') .': ', array('class' => 'control-label col-lg-3')) !!}
                    <div class="col-sm-6">
                        {!! Form::text($prefix .'box', $input[$prefix .'box'], array('class' => 'form-control')) !!}
                    </div>
                {!! Form::closeFormGroup($prefix .'box', $errors) !!}
                {!! Form::openFormGroup($prefix .'district', $errors, $requiredFields) !!}
                    {!! Form::label($prefix .'district', Translate::recursive('portfolio::members.district') .': ', array('class' => 'control-label col-lg-3')) !!}
                    <div class="col-sm-4">
                        {!! Form::text($prefix .'district', $input[$prefix .'district'], array('class' => 'form-control')) !!}
                    </div>
                {!! Form::closeFormGroup($prefix .'district', $errors) !!}
                {!! Form::openFormGroup($prefix .'postal_code', $errors, $requiredFields) !!}
                    {!! Form::label($prefix .'postal_code', Translate::recursive('portfolio::members.postal_code') .': ', array('class' => 'control-label col-lg-3')) !!}
                    <div class="col-sm-3">
                        {!! Form::text($prefix .'postal_code', $input[$prefix .'postal_code'], array('class' => 'form-control')) !!}
                    </div>
                {!! Form::closeFormGroup($prefix .'postal_code', $errors) !!}
                {!! Form::openFormGroup($prefix .'city', $errors, $requiredFields) !!}
                    {!! Form::label($prefix .'city', Translate::recursive('portfolio::members.city') .': ', array('class' => 'control-label col-sm-3')) !!}
                    <div class="col-sm-6">
                        {!! Form::text($prefix .'city', $input[$prefix .'city'], array('class' => 'form-control')) !!}
                    </div>
                {!! Form::closeFormGroup($prefix .'city', $errors) !!}
                {!! Form::openFormGroup($prefix .'country', $errors, $requiredFields) !!}
                    {!! Form::label($prefix .'country', Translate::recursive('portfolio::members.country') .': ', array('class' => 'control-label col-sm-3')) !!}
                    <div class="col-sm-4">
                        {!! Form::select($prefix .'country', $countries, $input[$prefix .'country'], array('class' => 'form-control')) !!}
                    </div>
                {!! Form::closeFormGroup($prefix .'country', $errors) !!}
            </div>
        </div>
    </div>
</div>
