<?php namespace Ixudra\Portfolio\Services\Validation;


use Ixudra\Core\Services\Validation\BaseValidationHelper;
use Ixudra\Portfolio\Models\Person;
use Ixudra\Portfolio\Models\Address;

class PersonValidationHelper extends BaseValidationHelper {

    public function getFilterValidationRules()
    {
        return array(
            'query'         => 'required'
        );
    }

    public function getFormValidationRules($formName)
    {
        if( $formName == 'create' ) {
            return array_merge(
                $this->getPrefixedRules( Person::getRules(), 'person' ),
                $this->getPrefixedRules( Address::getRules(), 'address' )
            );
        }

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