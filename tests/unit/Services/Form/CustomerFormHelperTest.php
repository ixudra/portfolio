<?php


use Ixudra\Portfolio\Models\Customer;

class CustomerFormHelperTest extends BaseUnitTestCase {

    const CUSTOMER_ID_1 = 15;

    const CUSTOMER_ID_2 = 17;


    protected $customerFormHelper;


    public function setUp()
    {
        parent::setUp();

        $this->customerFormHelper = App::make('\Ixudra\Portfolio\Services\Form\CustomerFormHelper');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Form\CustomerFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Core\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetCustomersAsSelectList()
    {
        $this->setUpMocks();

        $result = $this->customerFormHelper->getCustomersAsSelectList();

        $this->assertEquals(
            array(
                self::CUSTOMER_ID_1     => 'Foo',
                self::CUSTOMER_ID_2     => 'Bar'
            ), $result
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Form\CustomerFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Core\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetCustomersAsSelectList_includesNullValueIfRequired()
    {
        $this->setUpMocks();

        $result = $this->customerFormHelper->getCustomersAsSelectList(true);

        $this->assertEquals(
            array(
                0                       => 'Choose ...',
                self::CUSTOMER_ID_1     => 'Foo Bar',
                self::CUSTOMER_ID_2     => 'Foz Baz'
            ), $result
        );
    }


    protected function setUpMocks()
    {
        $customer1 = new Customer();
        $customer1->id = self::CUSTOMER_ID_1;
        $customer1->first_name = 'Foo';
        $customer1->last_name = 'Bar';

        $customer2 = new Customer();
        $customer2->id = self::CUSTOMER_ID_2;
        $customer2->first_name = 'Foz';
        $customer2->last_name = 'Baz';

        $customers = new \Illuminate\Support\Collection( array( $customer1, $customer2 ) );

        $customerRepository = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository');
        $customerRepository->shouldReceive('all')->once()->andReturn($customers);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository', $customerRepository);
    }

}