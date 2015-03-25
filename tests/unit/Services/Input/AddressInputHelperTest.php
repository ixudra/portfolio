<?php


use Ixudra\Portfolio\Models\Address;

class AddressInputHelperTest extends BaseUnitTestCase {

    const ADDRESS_ID = 5;


    protected $addressInputHelper;


    public function setUp()
    {
        parent::setUp();

        $this->addressInputHelper = App::make('\Ixudra\Portfolio\Services\Input\AddressInputHelper');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Input\AddressInputHelper::getInputForSearch()
     */
    public function testGetInputForSearch()
    {
        $input = array(
            '_token'            => 'Foo_token',
            'city_id'           => self::ADDRESS_ID,
        );

        $address = new Address( array( 'city' => 'Foo_city' ) );

        $addressInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
        $addressInputHelperMock->shouldReceive('find')->once()->with(self::ADDRESS_ID)->andReturn($address);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository', $addressInputHelperMock);

        $result = $this->addressInputHelper->getInputForSearch( $input );

        $this->assertEquals(
            array(
            'city'              => 'Foo_city',
            ), $result
        );
    }

}