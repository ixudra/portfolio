
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