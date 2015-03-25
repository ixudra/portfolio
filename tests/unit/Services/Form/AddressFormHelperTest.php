<?php


use Ixudra\Portfolio\Models\Address;

class AddressFormHelperTest extends BaseUnitTestCase {

    const ADDRESS_ID_1 = 15;

    const ADDRESS_ID_2 = 17;


    /**
     * @covers \Ixudra\Portfolio\Services\Form\AddressFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Portfolio\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetAllAsSelectList()
    {
        $this->setUpMocks();

        $result = App::make('\Ixudra\Portfolio\Services\Form\AddressFormHelper')->getAllAsSelectList();

        $this->assertEquals(
            array(
                self::ADDRESS_ID_1      => 'Foo_street 25, Foo city (us)',
                self::ADDRESS_ID_2      => 'Bar_street 27, Bar-city (us)'
            ), $result
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Form\AddressFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Portfolio\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetAllAsSelectList_includesNullValueIfRequired()
    {
        $this->setUpMocks();

        $result = App::make('\Ixudra\Portfolio\Services\Form\AddressFormHelper')->getAllAsSelectList(true);

        $this->assertEquals(
            array(
                0                       => '',
                self::ADDRESS_ID_1      => 'Foo_street 25, Foo city (us)',
                self::ADDRESS_ID_2      => 'Bar_street 27, Bar-city (us)'
            ), $result
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Form\AddressFormHelper::getCitiesAsSelectList()
     */
    public function testGetCitiesAsSelectList()
    {
        $this->setUpMocks();

        $result = App::make('\Ixudra\Portfolio\Services\Form\AddressFormHelper')->getCitiesAsSelectList();

        $this->assertEquals(
            array(
                self::ADDRESS_ID_1          => 'Foo city',
                self::ADDRESS_ID_2          => 'Bar-city'
            ), $result
        );
    }


    protected function setUpMocks()
    {
        $address1 = new Address(
            array(
                'street_1'              => 'Foo_street',
                'number'                => 25,
                'postal_code'           => 'Foo_postal_code',
                'city'                  => 'Foo city',
                'country'               => 'us',
            )
        );
        $address1->id = self::ADDRESS_ID_1;

        $address2 = new Address(
            array(
                'street_1'              => 'Bar_street',
                'number'                => 27,
                'postal_code'           => 'Bar_postal_code',
                'city'                  => 'Bar-city',
                'country'               => 'us',
            )
        );
        $address2->id = self::ADDRESS_ID_2;

        $address3 = new Address(
            array(
                'street_1'              => 'Foz_street',
                'number'                => 37,
                'postal_code'           => 'Foz_postal_code',
                'city'                  => 'Foo city',
                'country'               => 'us',
            )
        );
        $address3->id = self::ADDRESS_ID_2;

        $addresses = new \Illuminate\Support\Collection( array( $address1, $address2 ) );

        $addressRepository = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
        $addressRepository->shouldReceive('all')->once()->andReturn($addresses);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository', $addressRepository);
    }

}