
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $title }}
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        {{ $address->present()->street }}
                    </div>
                    <div class="row col-md-12">
                        {{ $address->postal_code }} {{ $address->city }} ({{ $address->present()->countryName }})
                    </div>
                </div>
            </div>
        </div>
    </div>
