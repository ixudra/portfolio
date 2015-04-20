
    <div class="row">
        <div class="well well-large col-md-12">
            @if( $includeName )
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.name') }}:</div>
                <div class='col-md-8'>{{ $company->name }}</div>
            </div>
            @endif
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.vat_nr') }}:</div>
                <div class='col-md-8'>{{ $company->vat_nr }}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.email') }}:</div>
                <div class='col-md-8'>{!! link_to('mailto:'. $company->email, $company->email) !!}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.url') }}:</div>
                <div class='col-md-8'>{!! link_to($company->url, $company->url, array('target' => '_blank')) !!}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.phone') }}:</div>
                <div class='col-md-8'>{{ $company->phone }}</div>
            </div>
            <div class='col-md-12'>
                <div class='col-md-4'>{{ Translate::recursive('portfolio::members.fax') }}:</div>
                <div class='col-md-8'>{{ $company->fax }}</div>
            </div>
        </div>
    </div>