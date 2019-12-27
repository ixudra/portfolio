
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ Translate::recursive('common.titles.basicInformation') }}
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        <div class='col-md-4'>{{ Translate::recursive('portfolio::members.birth_date') }}:</div>
                        <div class='col-md-8'>{{ $person->birth_date }}</div>
                    </div>
                    <div class="row col-md-12">
                        <div class='col-md-4'>{{ Translate::recursive('portfolio::members.email') }}:</div>
                        <div class='col-md-8'>{!! HTML::mailto($person->email, $person->email) !!}</div>
                    </div>
                    <div class="row col-md-12">
                        <div class='col-md-4'>{{ Translate::recursive('portfolio::members.cellphone') }}:</div>
                        <div class='col-md-8'>{{ $person->cellphone }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-12">&nbsp;</div>

    @if( !is_null($person->address) )

        @include('portfolio::addresses.data', array('address' => $person->address, 'title' => Translate::recursive('portfolio::models.address.singular')))

        <div class="row col-md-12">&nbsp;</div>
    @endif

    @if( !is_null($person->company) )

        @include('portfolio::companies.show.data', array('company' => $person->company, 'title' => Translate::recursive('portfolio::models.company.singular'), 'includeName' => true))

        <div class="row col-md-12">&nbsp;</div>
    @endif

    @include('portfolio::customers.show.projects', array('projects' => $person->projects))
