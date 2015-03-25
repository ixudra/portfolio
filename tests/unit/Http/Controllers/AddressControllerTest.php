<?php


use Ixudra\Portfolio\Models\Address;

class AddressControllerTest extends BaseUnitTestCase {

    const ADDRESS_ID = 10;


    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::index()
     */
    public function testIndex()
    {
        $addressViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\AddressViewFactory');
        $addressViewFactoryMock->shouldReceive('index')->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\AddressViewFactory', $addressViewFactoryMock);

        $response = $this->call('GET', 'admin/addresses');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::filter()
     */
    public function testFilter_get()
    {
        $input = array(
            'Foo'       => 'Bar',
        );

        $filterAddressRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Addresses\FilterAddressFormRequest');
        $filterAddressRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Addresses\FilterAddressFormRequest', $filterAddressRequestFormMock);

        $addressViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\AddressViewFactory');
        $addressViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\AddressViewFactory', $addressViewFactoryMock);

        $response = $this->call('GET', 'admin/addresses/filter?foo=bar');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::filter()
     */
    public function testFilter_post()
    {
        $input = array(
            '_token'    => 'Foo_token',
            'Foo'       => 'Bar',
        );

        $filterAddressRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Addresses\FilterAddressFormRequest');
        $filterAddressRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Addresses\FilterAddressFormRequest', $filterAddressRequestFormMock);

        $addressViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\AddressViewFactory');
        $addressViewFactoryMock->shouldReceive('index')->once()->with($input)->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\AddressViewFactory', $addressViewFactoryMock);

        $response = $this->call('POST', 'admin/addresses/filter', $input);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::create()
     */
    public function testCreate()
    {
        $addressViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\AddressViewFactory');
        $addressViewFactoryMock->shouldReceive('create')->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\AddressViewFactory', $addressViewFactoryMock);

        $response = $this->call('GET', 'admin/addresses/create');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::store()
     */
    public function testStore()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $address = new Address();
        $address->id = self::ADDRESS_ID;

        $createAddressRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Addresses\CreateAddressFormRequest');
        $createAddressRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Addresses\CreateAddressFormRequest', $createAddressRequestFormMock);

        $userFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Factories\AddressFactory');
        $userFactoryMock->shouldReceive('make')->once()->with($input)->andReturn($address);
        App::instance('Ixudra\Portfolio\Services\Factories\AddressFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('address.create.success')->andReturn('Foo_message');

        $response = $this->call('POST', 'admin/addresses', $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.addresses.show',
            array(self::ADDRESS_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::show()
     */
    public function testShow()
    {
        $address = new Address();

        $addressRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
        $addressRepositoryMock->shouldReceive('find')->with(self::ADDRESS_ID)->once()->andReturn($address);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository', $addressRepositoryMock);

        $addressViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\AddressViewFactory');
        $addressViewFactoryMock->shouldReceive('show')->with($address)->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\AddressViewFactory', $addressViewFactoryMock);

        $response = $this->call('GET', 'admin/addresses/'. self::ADDRESS_ID);

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::show()
     */
    public function testShow_returnsAddressNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/addresses/'. self::ADDRESS_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::edit()
     */
    public function testEdit()
    {
        $address = new Address();

        $addressRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
        $addressRepositoryMock->shouldReceive('find')->with(self::ADDRESS_ID)->once()->andReturn($address);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository', $addressRepositoryMock);

        $addressViewFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Html\AddressViewFactory');
        $addressViewFactoryMock->shouldReceive('edit')->with($address)->once()->andReturn('factoryFoo');
        App::instance('Ixudra\Portfolio\Services\Html\AddressViewFactory', $addressViewFactoryMock);

        $response = $this->call('GET', 'admin/addresses/'. self::ADDRESS_ID .'/edit');

        $this->assertTrue($response->isOk());
        $this->assertEquals('factoryFoo', $response->getContent());
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::edit()
     */
    public function testEdit_returnsAddressNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/addresses/'. self::ADDRESS_ID .'/edit');

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::update()
     */
    public function testUpdate()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'Foo'           => 'Bar',
        );

        $address = new Address();
        $address->id = self::ADDRESS_ID;

        $addressRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
        $addressRepositoryMock->shouldReceive('find')->with(self::ADDRESS_ID)->once()->andReturn($address);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository', $addressRepositoryMock);

        $updateAddressRequestFormMock = Mockery::mock('Ixudra\Portfolio\Http\Requests\Addresses\UpdateAddressFormRequest');
        $updateAddressRequestFormMock->shouldReceive('getInput')->once()->andReturn($input);
        App::instance('Ixudra\Portfolio\Http\Requests\Addresses\UpdateAddressFormRequest', $updateAddressRequestFormMock);

        $userFactoryMock = Mockery::mock('Ixudra\Portfolio\Services\Factories\AddressFactory');
        $userFactoryMock->shouldReceive('modify')->once()->with($address, $input);
        App::instance('Ixudra\Portfolio\Services\Factories\AddressFactory', $userFactoryMock);

        Translate::shouldReceive('model')->with('address.edit.success')->andReturn('Foo_message');

        $response = $this->call('PUT', 'admin/addresses/'. self::ADDRESS_ID, $input);

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.addresses.show',
            array(self::ADDRESS_ID),
            array(
                'messageType'       => 'success',
                'messages'          => array('Foo_message')
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::update()
     */
    public function testUpdate_returnsAddressNotFoundIfRepositoryReturnsNull()
    {
        $this->setupModelNotFound();

        $response = $this->call('GET', 'admin/addresses/'. self::ADDRESS_ID);

        $this->assertModelNotFound($response);
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::destroy()
     */
    public function testDestroy()
    {
        $addressMock = Mockery::mock('Ixudra\Portfolio\Models\Address');
        $addressMock->shouldReceive('delete')->once();

        $addressRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
        $addressRepositoryMock->shouldReceive('find')->with(self::ADDRESS_ID)->once()->andReturn($addressMock);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository', $addressRepositoryMock);

        Translate::shouldReceive('model')->with('address.delete.success')->andReturn('Foo_message');

        $response = $this->call('DELETE', 'admin/addresses/'. self::ADDRESS_ID .'?_token=Foo_token');

        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.addresses.index',
            array(),
            array(
                'messageType' => 'success',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Http\Controllers\AddressController::destroy()
     */
    public function testDestroy_returnsToIndexIfAddressIsNotFound()
    {
        $this->setupModelNotFound();

        $response = $this->call('DELETE', 'admin/addresses/'. self::ADDRESS_ID .'?_token=Foo_token');

        $this->assertModelNotFound($response);
    }

    protected function setupModelNotFound()
    {
        $addressRepositoryMock = Mockery::mock('Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
        $addressRepositoryMock->shouldReceive('find')->with(self::ADDRESS_ID)->once()->andReturn(null);
        App::instance('Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository', $addressRepositoryMock);

        Translate::shouldReceive('model')->with('address.error.notFound')->andReturn('Foo_message');
    }

    protected function assertModelNotFound($response)
    {
        $this->assertTrue($response->isRedirect());
        $this->assertRedirectedToRoute(
            'admin.addresses.index',
            array(),
            array(
                'messageType' => 'error',
                'messages'    => array( 'Foo_message' )
            )
        );
    }

}