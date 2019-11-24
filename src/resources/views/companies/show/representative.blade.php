
    <div class="row">
        <div class="col-md-12">
            <h2>{{ Translate::recursive('portfolio::members.representative') }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="well well-large col-md-12">
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.name') }}:</div>
                <div class='col-md-8'>{!! HTML::linkRoute('admin.customers.show', $person->present()->fullName, array($person->customer->id)) !!}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.birth_date') }}:</div>
                <div class='col-md-8'>{{ $person->birth_date }}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.email') }}:</div>
                <div class='col-md-8'>{!! HTML::email($person->email) !!}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.cellphone') }}:</div>
                <div class='col-md-8'>{{ $person->cellphone }}</div>
            </div>
        </div>
    </div>
