<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Interfaces\Services\Factories\AddressFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\CustomerFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\PersonFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\PersonInterface;

use App;
use Config;

class PersonFactory extends BaseFactory implements PersonFactoryInterface {

    protected $addressFactory;

    protected $customerFactory;


    public function __construct(AddressFactoryInterface $addressFactory, CustomerFactoryInterface $customerFactory)
    {
        $this->addressFactory = $addressFactory;
        $this->customerFactory = $customerFactory;
    }


    public function make($input, $prefix = '')
    {
        $person = $this->createModel();
        $person->fill( $this->extractPersonInput( $input, $prefix, true ) );
        $person->save();

        $address = null;
        if( $this->includeAddress( $input ) ) {
            $address = $this->addressFactory->make( $this->extractAddressInput( $input, 'address', true ), $person );
            $person->address_id = $address->id;
            $person->save();
        }

        $this->customerFactory->make( $person );

        return $person;
    }

    public function modify(PersonInterface $person, $input, $prefix = '')
    {
        $address = $person->address;
        if( $this->includeAddress($input) ) {
            if( $address === null ) {
                $address = $this->addressFactory->make( $this->extractAddressInput( $input, 'address', true ), $person );
            } else {
                $this->addressFactory->modify( $address, $this->extractAddressInput( $input, 'address' ) );
            }
        } else {
            if( $address !== null ) {
                $address->delete();
                $address = null;
            }
        }

        return $person->update( $this->extractPersonInput( $input, $prefix ) );
    }

    protected function includeAddress($input)
    {
        return array_key_exists('address_street_1', $input) && $input[ 'address_street_1' ] !== '';
    }

    protected function extractAddressInput($input, $prefix = '', $includeDefaults = false)
    {
        $addressClassName = Config::get('bindings.models.address');

        return $this->extractInput( $input, $addressClassName::getDefaults(), $prefix, $includeDefaults );
    }

    protected function extractPersonInput($input, $prefix, $includeDefaults = false)
    {
        $personClassName = Config::get('bindings.models.person');

        $results = $this->extractInput( $input, $personClassName::getDefaults(), $prefix, $includeDefaults );

        return $results;
    }

    protected function createModel()
    {
        return App::make( PersonInterface::class );
    }

}
