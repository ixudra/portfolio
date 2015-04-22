<div class="row">
    <div class="well well-large col-md-12">
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('portfolio::members.street') }}:</div>
            <div class='col-md-8'>{{ $address->street_1 }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>&nbsp;</div>
            <div class='col-md-8'>{{ $address->street_2 }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('portfolio::members.number') }}:</div>
            <div class='col-md-8'>{{ $address->number }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('portfolio::members.box') }}:</div>
            <div class='col-md-8'>{{ $address->box }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('portfolio::members.district') }}:</div>
            <div class='col-md-8'>{{ $address->district }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('portfolio::members.postal_code') }}:</div>
            <div class='col-md-8'>{{ $address->postal_code }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('portfolio::members.city') }}:</div>
            <div class='col-md-8'>{{ $address->city }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('portfolio::members.country') }}:</div>
            <div class='col-md-8'>{{ $address->present()->countryName }}</div>
        </div>
    </div>
</div>