<?php


use Ixudra\Portfolio\Models\Customer;

class CustomerViewFactoryTest extends BaseViewFactoryTestCase {

    protected $customerViewFactory;


    public function setUp()
    {
        parent::setUp();

        $this->customerViewFactory = App::make('\Ixudra\Portfolio\Services\Html\CustomerViewFactory');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Html\CustomerViewFactory::index()
     * @covers \Ixudra\Portfolio\Services\Html\CustomerViewFactory::prepareFilter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testIndex()
    {
        $input = array(
            'query'             => ''
        );

        $this->createFilterMocks( $input );

        $view = $this->customerViewFactory->index();

        $this->assertViewName( $view, 'portfolio::customers.index' );

        $this->assertFilterMocks( $view, $input );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\CustomerViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\CustomerViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesInputIfInputIsNotNull()
    {
        $this->createFormMocks();

        $view = $this->customerViewFactory->create('Foo');

        $this->assertViewName( $view, 'portfolio::customers.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\CustomerViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\CustomerViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesDefaultValuesIfInputIsNull()
    {
        $customerInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\CustomerInputHelper');
        $customerInputHelperMock->shouldReceive('getDefaultInput')->once()->andReturn('Foo');
        App::instance('\Ixudra\Portfolio\Services\Input\CustomerInputHelper', $customerInputHelperMock);

        $this->createFormMocks();

        $view = $this->customerViewFactory->create( null );

        $this->assertViewName( $view, 'portfolio::customers.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\CustomerViewFactory::show()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testShow()
    {
        $customer = new Customer( array(  'name' => 'Foo' ) );

        $view = $this->customerViewFactory->show($customer);

        $this->assertViewName( $view, 'portfolio::customers.show' );
        $this->assertViewData( $view, 'customer', $customer );
        $this->assertEquals( 'Foo', $view['customer']->name );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\CustomerViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\CustomerViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesInputValuesIfInputIsNotNull()
    {
        $customer = new Customer( array( 'name' => 'Foo' ) );

        $this->createFormMocks();

        $view = $this->customerViewFactory->edit($customer, 'Bar');

        $this->assertViewName( $view, 'portfolio::customers.edit' );
        $this->assertViewData( $view, 'customer', $customer );
        $this->assertViewData( $view, 'input', 'Bar' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\CustomerViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\CustomerViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesCustomerValuesIfInputIsNull()
    {
        $customerInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\CustomerInputHelper');
        $customerInputHelperMock->shouldReceive('getInputForModel')->once()->andReturn('Bar');
        App::instance('\Ixudra\Portfolio\Services\Input\CustomerInputHelper', $customerInputHelperMock);

        $customer = new Customer( array('name' => 'Bar') );

        $this->createFormMocks();

        $view = $this->customerViewFactory->edit($customer, null);

        $this->assertViewName( $view, 'portfolio::customers.edit' );
        $this->assertViewData( $view, 'customer', $customer );
        $this->assertViewData( $view, 'input', 'Bar');
        $this->assertFormMocks( $view );
    }

    protected function createFilterMocks($input)
    {
        $searchInput = array( 'Fow' => 'Baw' );

        $customerInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\CustomerInputHelper');
        $customerInputHelperMock->shouldReceive('getInputForSearch')->once()->with($input)->andReturn($searchInput);
        App::instance('\Ixudra\Portfolio\Services\Input\CustomerInputHelper', $customerInputHelperMock);

        $customer1 = new Customer( array( 'name' => 'Foo' ) );
        $customer2 = new Customer( array( 'name' => 'Bar' ) );
        $customers = new \Illuminate\Support\Collection( array( $customer1, $customer2 ) );

        $customerInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository');
        $customerInputHelperMock->shouldReceive('search')->once()->with($searchInput, 25)->andReturn($customers);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository', $customerInputHelperMock);
    }

    protected function assertFilterMocks($view, $input)
    {
        $this->assertViewData( $view, 'input', $input );
        $this->assertViewDataSize( $view, 'customers', 2 );
        $this->assertEquals( 'Foo', $view['customers'][0]->name );
        $this->assertEquals( 'Bar', $view['customers'][1]->name );
    }

    protected function createFormMocks()
    {
        // ...
    }

    protected function assertFormMocks($view)
    {
        // ...
    }

}