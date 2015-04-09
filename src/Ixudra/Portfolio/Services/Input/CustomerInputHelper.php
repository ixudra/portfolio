<?php namespace Ixudra\Portfolio\Services\Input;


use Ixudra\Core\Services\Input\BaseInputHelper;

use Ixudra\Portfolio\Models\Customer;

class CustomerInputHelper extends BaseInputHelper {

    public function getDefaultInput($prefix = '')
    {
        return Customer::getDefaults();
    }

}