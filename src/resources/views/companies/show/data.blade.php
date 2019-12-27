
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{ $title }}
            </div>
            <div class="card-body">
                @if( $includeName )
                <div class='row col-md-12'>
                    <div class='col-md-4'>{{ Translate::recursive('portfolio::members.name') }}:</div>
                    <div class='col-md-8'>{!! HTML::linkRoute('admin.customers.show', $company->name, array($company->customer->id)) !!}</div>
                </div>
                @endif
                <div class='row col-md-12'>
                    <div class='col-md-4'>{{ Translate::recursive('portfolio::members.vat_nr') }}:</div>
                    <div class='col-md-8'>{{ $company->vat_nr }}</div>
                </div>
                <div class='row col-md-12'>
                    <div class='col-md-4'>{{ Translate::recursive('portfolio::members.email') }}:</div>
                    <div class='col-md-8'>{!! HTML::mailto($company->email, $company->email) !!}</div>
                </div>
                <div class='row col-md-12'>
                    <div class='col-md-4'>{{ Translate::recursive('portfolio::members.url') }}:</div>
                    <div class='col-md-8'>@if( !empty($company->url) ) {!! HTML::link($company->url, $company->url, array('target' => '_blank')) !!} @endif</div>
                </div>
                <div class='row col-md-12'>
                    <div class='col-md-4'>{{ Translate::recursive('portfolio::members.phone') }}:</div>
                    <div class='col-md-8'>{{ $company->phone }}</div>
                </div>
                <div class='row col-md-12'>
                    <div class='col-md-4'>{{ Translate::recursive('portfolio::members.fax') }}:</div>
                    <div class='col-md-8'>{{ $company->fax }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
