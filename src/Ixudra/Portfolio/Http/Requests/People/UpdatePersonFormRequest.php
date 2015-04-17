<?php namespace Ixudra\Portfolio\Http\Requests\People;


use Ixudra\Core\Http\Requests\BaseRequest;
use Ixudra\Portfolio\Models\Person;

class UpdatePersonFormRequest extends BaseRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $addressRules = array(
            'address_street_1'              => 'required_with:address_street_2,address_number,address_box,address_district,address_postal_code,address_city|max:256',
            'address_street_2'              => 'max:256',
            'address_number'                => 'required_with:address_street_1,address_street_2,address_box,address_district,address_postal_code,address_city|integer',
            'address_box'                   => 'max:32',
            'address_district'              => 'max:128',
            'address_postal_code'           => 'required_with:address_street_1,address_street_2,address_number,address_box,address_district,address_city|max:32',
            'address_city'                  => 'required_with:address_street_1,address_street_2,address_number,address_box,address_district,address_postal_code|max:128',
            'address_country'               => 'required|max:2',
        );

        return array_merge(
            $this->getPrefixedRules( Person::getRules() ),
            $addressRules
        );
    }

}
