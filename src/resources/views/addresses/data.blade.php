<div class="row">
    <div class="well well-large col-md-12">
        <div class='col-md-12'>
            {{ $address->present()->street }}
        </div>
        <div class='col-md-12'>
            {{ $address->postal_code }} {{ $address->city }} ({{ $address->present()->countryName }})
        </div>
    </div>
</div>