
    <div class="row">
        <h2>{{ Translate::recursive('portfolio::members.representative') }}</h2>
    </div>

    <div class="row">
        <div class="well well-large col-md-12">
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.name') }}:</div>
                <div class='col-md-8'>{{ $person->present()->fullName }}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.birth_date') }}:</div>
                <div class='col-md-8'>{{ $person->birth_date }}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.email') }}:</div>
                <div class='col-md-8'>{!! link_to('mailto:'. $person->email, $person->email) !!}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.cellphone') }}:</div>
                <div class='col-md-8'>{{ $person->cellphone }}</div>
            </div>
        </div>
    </div>