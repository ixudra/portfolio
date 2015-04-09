<?php


use Ixudra\Portfolio\Services\Factories\CompanyFactory;
use Ixudra\Portfolio\Models\Company;

class CompanyFactoryTest extends BaseFunctionalTestCase {

    protected $companyFactory;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('companies', 'addresses', 'people');

        $this->companyFactory = App::make('\Ixudra\Portfolio\Services\Factories\CompanyFactory');;
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Factories\CompanyFactory::create()
     * @covers \Ixudra\Portfolio\Services\Factories\CompanyFactory::extractAddressInput()
     * @covers \Ixudra\Portfolio\Services\Factories\CompanyFactory::extractCompanyInput()
     */
    public function testCreate()
    {
        $input = array(
            'name'                          => 'Foo_name',
            'email'                         => 'foo@bar.com',
            'phone'                         => '011223344',

            'street_1'                      => 'Foo_street_1',
            'street_2'                      => 'Foo_street_2',
            'number'                        => 15,
            'box'                           => 'Foo_box',
            'district'                      => 'Foo_district',
            'postal_code'                   => 'Foo_postal_code',
            'city'                          => 'Foo_city',
            'country'                       => 'us',
        );

        $company = $this->companyFactory->make( $input );

        $companyRepository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository');
        $this->assertEquals( 1, $companyRepository->all()->count() );
        $this->assertInstanceOf( '\Ixudra\Portfolio\Models\Company', $company );

        $addressRepository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
        $this->assertEquals( 1, $addressRepository->all()->count() );
        $this->assertInstanceOf( '\Ixudra\Portfolio\Models\Address', $company->corporateAddress );
        $this->assertInstanceOf( '\Ixudra\Portfolio\Models\Address', $company->billingAddress );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Factories\CompanyFactory::modify()
     * @covers \Ixudra\Portfolio\Services\Factories\CompanyFactory::extractAddressInput()
     * @covers \Ixudra\Portfolio\Services\Factories\CompanyFactory::extractCompanyInput()
     */
    public function testModify()
    {
        $company = new Company(
            array(
                'name'                          => 'Foo_name',
                'email'                         => 'foo@bar.com',
                'phone'                         => '011223344',

                'street_1'                      => 'Foo_street_1',
                'street_2'                      => 'Foo_street_2',
                'number'                        => 15,
                'box'                           => 'Foo_box',
                'district'                      => 'Foo_district',
                'postal_code'                   => 'Foo_postal_code',
                'city'                          => 'Foo_city',
                'country'                       => 'us',
            )
        );
        $company->save();

        $input = array(
            'name'                          => 'Bar_name',
            'email'                         => 'foz@baz.com',
            'phone'                         => '022334455',

            'street_1'                      => 'Bar_street_1',
            'street_2'                      => 'Bar_street_2',
            'number'                        => 17,
            'box'                           => 'Bar_box',
            'district'                      => 'Bar_district',
            'postal_code'                   => 'Bar_postal_code',
            'city'                          => 'Bar_city',
            'country'                       => 'be',
        );

        $this->companyFactory->modify( $company, $input );

        $companyRepository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository');
        $this->assertEquals( 1, $companyRepository->all()->count() );
        $this->assertEquals( 'Bar_name', $companyRepository->all()->first()->name );

        $addressRepository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
        $this->assertEquals( 1, $addressRepository->all()->count() );
        $this->assertEquals( 'Bar_street_1', $company->corporateAddress->street_1 );
        $this->assertEquals( 'Bar_street_1', $company->billingAddress->street_1 );
    }

}