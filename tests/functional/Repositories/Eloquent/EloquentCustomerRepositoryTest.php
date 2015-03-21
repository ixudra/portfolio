<?php


use Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository;
use Ixudra\Portfolio\Models\Customer;

class EloquentCustomerRepositoryTest extends BaseRepositoryTestCase {

    protected $customerRepository;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('customers');

        $this->customerRepository = new EloquentCustomerRepository();
    }


    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository::all()
     */
    public function testAll()
    {
        $customer1 = Customer::create( array( 'first_name' => 'Customer 1' ) );
        $customer2 = Customer::create( array( 'first_name' => 'Customer 2' ) );
        $customer3 = Customer::create( array( 'first_name' => 'Customer 3' ) );
        $customer4 = Customer::create( array( 'first_name' => 'Customer 4' ) );
        $customer5 = Customer::create( array( 'first_name' => 'Customer 5' ) );

        $customers = $this->customerRepository->all();

        $this->assertCount(5, $customers);
        $this->assertContainsOnlyInstancesOf('\Ixudra\Portfolio\Models\Customer', $customers);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository::find()
     */
    public function testFind()
    {
        $customer = Customer::create( array( 'first_name' => 'Foo_first_name' ) );

        $result = $this->customerRepository->find($customer->id);

        $this->assertInstanceOf('\Ixudra\Portfolio\Models\Customer', $result);
        $this->assertEquals('Foo_first_name', $result->first_name);
    }

    /**
     * @covers EloquentCustomerRepository::find()
     */
    public function testFind_returnsNullIfCustomerDoesNotExist()
    {
        $result = $this->customerRepository->find(100);

        $this->assertNull($result);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository::findByFilter()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter()
    {
        $customer1 = Customer::create( array( 'first_name' => 'Foo_first_name' ) );
        $customer2 = Customer::create( array( 'first_name' => 'Bar_first_name' ) );
        $customer3 = Customer::create( array( 'first_name' => 'Bar_first_name' ) );
        $customer4 = Customer::create( array( 'first_name' => 'Foo_first_name' ) );
        $customer5 = Customer::create( array( 'first_name' => 'Foz_first_name' ) );

        $filter = array( 'first_name' => 'Bar_first_name' );

        $customers = $this->customerRepository->findByFilter($filter);

        $this->assertCount(2, $customers);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Customer', $customers);
        $this->assertCollectionContains( array($customer2, $customer3), $customers );
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository::findByFilter()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter_returnsEmptyArrayIfNoCustomersMatchFilter()
    {
        $customer1 = Customer::create( array( 'first_name' => 'Foo_first_name' ) );
        $customer2 = Customer::create( array( 'first_name' => 'Foo_first_name' ) );

        $filter = array( 'first_name' => 'Bar_first_name' );

        $customers = $this->customerRepository->findByFilter($filter);

        $this->assertCount(0, $customers);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository::search()
     */
    public function testSearch()
    {
        $customer1 = Customer::create( array( 'first_name' => 'Foo_first_name', 'last_name' => 'Foo_last_name' ) );
        $customer2 = Customer::create( array( 'first_name' => 'Bar_first_name', 'last_name' => 'Bar_last_name' ) );
        $customer3 = Customer::create( array( 'first_name' => 'Bar_first_name', 'last_name' => 'Foo_last_name' ) );
        $customer4 = Customer::create( array( 'first_name' => 'Foo_first_name', 'last_name' => 'Bar_last_name' ) );
        $customer5 = Customer::create( array( 'first_name' => 'Foz_first_name', 'last_name' => 'Foz_last_name' ) );

        $filters = array(
            'first_name'            => 'Foo_first_name',
            'last_name'             => 'Bar_last_name'
        );

        $paginator = $this->customerRepository->search($filters, 50, true);
        $customers = $paginator->getCollection();

        $this->assertCount(1, $customers);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Customer', $customers);
        $this->assertCollectionContains( array($customer4), $customers );
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository::search()
     */
    public function testSearch_returnsAllResultsIfNoFiltersProvided()
    {
        $customer1 = Customer::create( array( 'first_name' => 'Foo_first_name' ) );
        $customer2 = Customer::create( array( 'first_name' => 'Bar_first_name' ) );
        $customer3 = Customer::create( array( 'first_name' => 'Bar_first_name' ) );
        $customer4 = Customer::create( array( 'first_name' => 'Foo_first_name' ) );
        $customer5 = Customer::create( array( 'first_name' => 'Foz_first_name' ) );

        $filters = array();

        $paginator = $this->customerRepository->search($filters, 50, true);
        $customers = $paginator->getCollection();

        $this->assertCount(5, $customers);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Customer', $customers);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository::search()
     */
    public function testSearch_usesPagination()
    {
        $customer1 = Customer::create( array( 'first_name' => 'Foo_first_name' ) );
        $customer2 = Customer::create( array( 'first_name' => 'Bar_first_name' ) );
        $customer3 = Customer::create( array( 'first_name' => 'Bar_first_name' ) );
        $customer4 = Customer::create( array( 'first_name' => 'Foo_first_name' ) );
        $customer5 = Customer::create( array( 'first_name' => 'Foz_first_name' ) );

        $filters = array();

        $paginator = $this->customerRepository->search($filters, 2, true);
        $customers = $paginator->getCollection();

        $this->assertCount(2, $customers);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Customer', $customers);
    }

}
