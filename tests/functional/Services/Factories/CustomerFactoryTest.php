<?php


use Ixudra\Portfolio\Services\Factories\CustomerFactory;
use Ixudra\Portfolio\Models\Customer;

class CustomerFactoryTest extends BaseFunctionalTestCase {

    protected $customerFactory;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('customers');

        $this->customerFactory = new CustomerFactory();
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Factories\CustomerFactory::create()
     */
    public function testCreate()
    {
        $input = array(
            'name'                  => 'Foo',
        );

        $customer = $this->customerFactory->make( $input );

        $customerRepository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository');
        $this->assertEquals( 1, $customerRepository->all()->count() );
        $this->assertInstanceOf( '\Ixudra\Portfolio\Models\Customer', $customer );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Factories\CustomerFactory::modify()
     */
    public function testModify()
    {
        $customer = new Customer(
            array(
                'name'                  => 'Foo',
            )
        );
        $customer->save();

        $input = array(
            'name'                  => 'Bar',
        );

        $this->customerFactory->modify( $customer, $input );

        $customerRepository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository');
        $this->assertEquals( 1, $customerRepository->all()->count() );
        $this->assertEquals( 'Bar', $customerRepository->all()->first()->name );
    }

}