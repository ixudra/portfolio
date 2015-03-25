<?php


use Ixudra\Portfolio\Models\Address;

class AddressViewFactoryTest extends BaseViewFactoryTestCase {

    protected $addressViewFactory;


    public function setUp()
    {
        parent::setUp();

        $this->addressViewFactory = App::make('\Ixudra\Portfolio\Services\Html\AddressViewFactory');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Html\AddressViewFactory::index()
     * @covers \Ixudra\Portfolio\Services\Html\AddressViewFactory::prepareFilter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testIndex()
    {
        $input = array(
            'city_id'           => ''
        );

        $this->createFilterMocks( $input );

        $view = $this->addressViewFactory->index();

        $this->assertViewName( $view, 'bootstrap.addresses.index' );

        $this->assertFilterMocks( $view, $input );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\AddressViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\AddressViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesInputIfInputIsNotNull()
    {
        $this->createFormMocks();

        $view = $this->addressViewFactory->create('Foo');

        $this->assertViewName( $view, 'bootstrap.addresses.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\AddressViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\AddressViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesDefaultValuesIfInputIsNull()
    {
        $addressInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\AddressInputHelper');
        $addressInputHelperMock->shouldReceive('getDefaultInput')->once()->andReturn('Foo');
        App::instance('\Ixudra\Portfolio\Services\Input\AddressInputHelper', $addressInputHelperMock);

        $this->createFormMocks();

        $view = $this->addressViewFactory->create( null );

        $this->assertViewName( $view, 'bootstrap.addresses.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\AddressViewFactory::show()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testShow()
    {
        $address = new Address( array(  'street_1' => 'Foo' ) );

        $view = $this->addressViewFactory->show($address);

        $this->assertViewName( $view, 'bootstrap.addresses.show' );
        $this->assertViewData( $view, 'address', $address );
        $this->assertEquals( 'Foo', $view['address']->street_1 );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\AddressViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\AddressViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesInputValuesIfInputIsNotNull()
    {
        $address = new Address( array( 'street_1' => 'Foo' ) );

        $this->createFormMocks();

        $view = $this->addressViewFactory->edit($address, 'Bar');

        $this->assertViewName( $view, 'bootstrap.addresses.edit' );
        $this->assertViewData( $view, 'address', $address );
        $this->assertViewData( $view, 'input', 'Bar' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\AddressViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\AddressViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesAddressValuesIfInputIsNull()
    {
        $addressInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\AddressInputHelper');
        $addressInputHelperMock->shouldReceive('getInputForModel')->once()->andReturn('Bar');
        App::instance('\Ixudra\Portfolio\Services\Input\AddressInputHelper', $addressInputHelperMock);

        $address = new Address( array('street_1' => 'Bar') );

        $this->createFormMocks();

        $view = $this->addressViewFactory->edit($address, null);

        $this->assertViewName( $view, 'bootstrap.addresses.edit' );
        $this->assertViewData( $view, 'address', $address );
        $this->assertViewData( $view, 'input', 'Bar');
        $this->assertFormMocks( $view );
    }

    protected function createFilterMocks($input)
    {
        $searchInput = array( 'Fow' => 'Baw' );

        $addressInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\AddressInputHelper');
        $addressInputHelperMock->shouldReceive('getInputForSearch')->once()->with($input)->andReturn($searchInput);
        App::instance('\Ixudra\Portfolio\Services\Input\AddressInputHelper', $addressInputHelperMock);

        $addressInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Form\AddressFormHelper');
        $addressInputHelperMock->shouldReceive('getCitiesAsSelectList')->once()->with($input)->andReturn('CityList');
        App::instance('\Ixudra\Portfolio\Services\Form\AddressFormHelper', $addressInputHelperMock);

        $address1 = new Address( array( 'street_1' => 'Foo' ) );
        $address2 = new Address( array( 'street_1' => 'Bar' ) );
        $addresses = new \Illuminate\Support\Collection( array( $address1, $address2 ) );

        $addressInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
        $addressInputHelperMock->shouldReceive('search')->once()->with($searchInput, 25)->andReturn($addresses);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository', $addressInputHelperMock);
    }

    protected function assertFilterMocks($view, $input)
    {
        $this->assertViewData( $view, 'input', $input );
        $this->assertViewData( $view, 'cities', 'CityList' );
        $this->assertViewDataSize( $view, 'addresses', 2 );
        $this->assertEquals( 'Foo', $view['addresses'][0]->street_1 );
        $this->assertEquals( 'Bar', $view['addresses'][1]->street_1 );
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