<?php


use Ixudra\Portfolio\Models\Customer;

class CustomerControllerTest extends BaseUnitTestCase {

    const CUSTOMER_ID = 10;


    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::index()
     */
    public function testIndex()
    {
        $customerViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\CustomerViewFactory');
        $customerViewFactoryMock->shouldReceive('index')->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CustomerViewFactory', $customerViewFactoryMock);

        $response = $this->call('GET', 'admin/customers');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::filter()
     */
    public function testFilter_get()
    {
        $input = array(
            'Foo'       => 'Bar',
        );

        $filterCustomerRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Customer\FilterCustomerFormRequest');
        $filterCustomerRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Customer\FilterCustomerFormRequest', $filterCustomerRequestFormMock);

        $customerViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\CustomerViewFactory');
        $customerViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CustomerViewFactory', $customerViewFactoryMock);

        $response = $this->call('GET', 'admin/customers/filter?foo=bar');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::filter()
     */
    public function testFilter_post()
    {
        $input = array(
            '_token'    => 'Foo_token',
            'Foo'       => 'Bar',
        );

        $filterCustomerRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Customer\FilterCustomerFormRequest');
        $filterCustomerRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Customer\FilterCustomerFormRequest', $filterCustomerRequestFormMock);

        $customerViewFactoryMock = Mockery::mock('App\Services\Html\CustomerViewFactory');
        $customerViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CustomerViewFactory', $customerViewFactoryMock);

        $response = $this->call('POST', 'admin/customers/filter', $input);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::create()
     */
    public function testCreate()
    {
        $customerViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\CustomerViewFactory');
        $customerViewFactoryMock->shouldReceive('create')->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CustomerViewFactory', $customerViewFactoryMock);

        $response = $this->call('GET', 'admin/customers/create');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::store()
     */
    public function testStore()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $customer = new Customer();
        $customer->id = self::CUSTOMER_ID;

        $createCustomerRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Customer\CreateCustomerFormRequest');
        $createCustomerRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Customer\CreateCustomerFormRequest', $createCustomerRequestFormMock);

        $userFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Factories\CustomerFactory');
        $userFactoryMock->shouldReceive('make')->once()->with($input)->andReturn($customer);
        App::instance('Ixudra\Portfolio\Services\Factories\CustomerFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('customer.create.success')->andReturn('Foo_message');

        $response = $this->call('POST', 'admin/customers', $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.customers.show',
            array(self::CUSTOMER_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::show()
     */
    public function testShow()
    {
        $customer = new Customer();

        $customerRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository');
        $customerRepositoryMock->shouldReceive('find')->with(self::CUSTOMER_ID)->once()->andReturn($customer);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository', $customerRepositoryMock);

        $customerViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\CustomerViewFactory');
        $customerViewFactoryMock->shouldReceive('show')->with($customer)->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CustomerViewFactory', $customerViewFactoryMock);

        $response = $this->call('GET', 'admin/customers/'. self::CUSTOMER_ID);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::show()
     * @covers Ixudra\Portfolio\Http\Controllers\CustomerController::modelNotFound()
     * @covers Ixudra\Core\Http\Controllers\BaseController::redirect()
     */
    public function testShow_returnsCustomerNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/customers/'. self::CUSTOMER_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::edit()
     */
    public function testEdit()
    {
        $customer = new Customer();

        $customerRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository');
        $customerRepositoryMock->shouldReceive('find')->with(self::CUSTOMER_ID)->once()->andReturn($customer);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository', $customerRepositoryMock);

        $customerViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\CustomerViewFactory');
        $customerViewFactoryMock->shouldReceive('edit')->with($customer)->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\CustomerViewFactory', $customerViewFactoryMock);

        $response = $this->call('GET', 'admin/customers/'. self::CUSTOMER_ID .'/edit');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::edit()
     * @covers Ixudra\Portfolio\Http\Controllers\CustomerController::modelNotFound()
     * @covers Ixudra\Core\Http\Controllers\BaseController::redirect()
     */
    public function testEdit_returnsCustomerNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/customers/'. self::CUSTOMER_ID .'/edit');

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::update()
     */
    public function testUpdate()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $customer = new Customer();
        $customer->id = self::CUSTOMER_ID;

        $customerRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository');
        $customerRepositoryMock->shouldReceive('find')->with(self::CUSTOMER_ID)->once()->andReturn($customer);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository', $customerRepositoryMock);

        $updateCustomerRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Customer\UpdateCustomerFormRequest');
        $updateCustomerRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Customer\UpdateCustomerFormRequest', $updateCustomerRequestFormMock);

        $userFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Factories\CustomerFactory');
        $userFactoryMock->shouldReceive('modify')->once()->with($customer, $input);
        App::instance('Ixudra\Portfolio\Services\Factories\CustomerFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('customer.edit.success')->andReturn('Foo_message');

        $response = $this->call('PUT', 'admin/customers/'. self::CUSTOMER_ID, $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.customers.show',
            array(self::CUSTOMER_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::update()
     * @covers Ixudra\Portfolio\Http\Controllers\CustomerController::modelNotFound()
     * @covers Ixudra\Core\Http\Controllers\BaseController::redirect()
     */
    public function testUpdate_returnsCustomerNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/customers/'. self::CUSTOMER_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::destroy()
     */
    public function testDestroy()
    {
        $customerMock = Mockery::mock('Ixudra\Portfolio\Models\Customer');
        $customerMock->shouldReceive('delete')->once();

        $customerRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository');
        $customerRepositoryMock->shouldReceive('find')->with(self::CUSTOMER_ID)->once()->andReturn($customerMock);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository', $customerRepositoryMock);

        Translate::shouldReceive('model')->with('customer.delete.success')->andReturn('Foo_message');

        $response = $this->call('DELETE', 'admin/customers/'. self::CUSTOMER_ID .'?_token=Foo_token');

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.customers.index',
            array(),
            array(
                'messageType' => 'success',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\CustomerController::destroy()
     * @covers Ixudra\Portfolio\Http\Controllers\CustomerController::modelNotFound()
     * @covers Ixudra\Core\Http\Controllers\BaseController::redirect()
     */
    public function testDestroy_returnsToIndexIfCustomerIsNotFound()
    {
        $this->setupModelNotFound();

        $response = $this->call('DELETE', 'admin/customers/'. self::CUSTOMER_ID .'?_token=Foo_token');

        $this->assertModelNotFound($response);
    }

    protected function setupModelNotFound()
    {
        $customerRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository');
        $customerRepositoryMock->shouldReceive('find')->with(self::CUSTOMER_ID)->once()->andReturn(null);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentCustomerRepository', $customerRepositoryMock);

        Translate::shouldReceive('model')->with('customer.error.notFound')->andReturn('Foo_message');
    }

    protected function assertModelNotFound($response)
    {
        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.customers.index',
            array(),
            array(
                'messageType' => 'error',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

}