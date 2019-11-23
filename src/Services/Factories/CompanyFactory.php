<?php namespace Ixudra\Portfolio\Services\Factories;


use Ixudra\Core\Services\Factories\BaseFactory;
use Ixudra\Portfolio\Interfaces\Services\Factories\AddressFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\CompanyFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\CustomerFactoryInterface;
use Ixudra\Portfolio\Interfaces\Services\Factories\PersonFactoryInterface;
use Ixudra\Portfolio\Interfaces\Models\CompanyInterface;

use App;
use Config;

class CompanyFactory extends BaseFactory implements CompanyFactoryInterface {

    protected $addressFactory;

    protected $personFactory;

    protected $customerFactory;


    public function __construct(AddressFactoryInterface $addressFactory, PersonFactoryInterface $personFactory, CustomerFactoryInterface $customerFactory)
    {
        $this->addressFactory = $addressFactory;
        $this->personFactory = $personFactory;
        $this->customerFactory = $customerFactory;
    }


    public function make($input, $prefix = '')
    {
        $company = $this->createModel();
        $company->fill( $this->extractCompanyInput( $input, $prefix ) );
        $company->save();

        $address = $this->addressFactory->make( $this->extractCorporateAddressInput( $input, true ), $company );
        $representative = $this->personFactory->make( $this->extractRepresentativeInput( $input, true ), '' );

        $company->corporate_address_id = $address->id;
        $company->billing_address_id = $address->id;
        $company->representative_id = $representative->id;
        $company->save();

        $this->customerFactory->make( $company );

        return $company;
    }

    public function modify(CompanyInterface $company, $input, $prefix = '')
    {
        $this->addressFactory->modify( $company->corporateAddress, $this->extractCorporateAddressInput( $input ) );
        $this->personFactory->modify( $company->representative, $this->extractRepresentativeInput( $input ), '' );

        return $company->update( $this->extractCompanyInput( $company->corporateAddress, $company->representative, $input, $prefix ) );
    }

    protected function extractCorporateAddressInput($input, $includeDefaults = false)
    {
        $addressClassName = Config::get('bindings.models.address');

        return $this->extractInput( $input, $addressClassName::getDefaults(), 'corporate_address', $includeDefaults );
    }

    protected function extractRepresentativeInput($input, $includeDefaults = false)
    {
        $personClassName = Config::get('bindings.models.person');

        return $this->extractInput( $input, $personClassName::getDefaults(), 'representative', $includeDefaults );
    }

    protected function extractCompanyInput($input, $prefix, $includeDefaults = false)
    {
        $companyClassName = Config::get('bindings.models.company');

        $results = $this->extractInput( $input, $companyClassName::getDefaults(), $prefix, $includeDefaults );

        return $results;
    }

    protected function createModel()
    {
        return App::make( CompanyInterface::class );
    }

}
