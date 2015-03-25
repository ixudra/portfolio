<div class="row">
    <div class="well well-large col-md-12">
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('members.street') }}:</div>
            <div class='col-md-8'>{{ $address->street_1 }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>&nbsp;</div>
            <div class='col-md-8'>{{ $address->street_2 }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('members.number') }}:</div>
            <div class='col-md-8'>{{ $address->number }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('members.box') }}:</div>
            <div class='col-md-8'>{{ $address->box }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('members.district') }}:</div>
            <div class='col-md-8'>{{ $address->district }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('members.postal_code') }}:</div>
            <div class='col-md-8'>{{ $address->postal_code }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('members.city') }}:</div>
            <div class='col-md-8'>{{ $address->city }}</div>
        </div>
        <div class='col-md-12'>
            <div class='col-md-4'>{{ Translate::recursive('members.country') }}:</div>
            <div class='col-md-8'>{{ $address->country }}</div>
        </div>
    </div>
</div>