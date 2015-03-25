<?php


use App\Services\Factories\AddressFactory;
use App\Models\Address;

class AddressFactoryTest extends BaseFunctionalTestCase {

    protected $addressFactory;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('addresses');

        $this->addressFactory = new AddressFactory();
    }


    /**
     * @covers \App\Services\Factories\AddressFactory::create()
     */
    public function testCreate()
    {
        $input = array(
            'street_1'              => 'Foo_street_1',
            'street_2'              => 'Foo_street_2',
            'number'                => 15,
            'box'                   => 'Foo_box',
            'district'              => 'Foo_district',
            'postal_code'           => 'Foo_postal_code',
            'city'                  => 'Foo_city',
            'country'               => 'us',
            'latitude'              => 'Foo_latitude',
            'longitude'             => 'Foo_longitude',
        );

        $address = $this->addressFactory->make( $input );

        $addressRepository = App::make('\App\Repositories\Eloquent\EloquentAddressRepository');
        $this->assertEquals( 1, $addressRepository->all()->count() );
        $this->assertInstanceOf( '\App\Models\Address', $address );
    }

    /**
     * @covers \App\Services\Factories\AddressFactory::modify()
     */
    public function testModify()
    {
        $address = new Address(
            array(
                'street_1'              => 'Foo_street_1',
                'street_2'              => 'Foo_street_2',
                'number'                => 15,
                'box'                   => 'Foo_box',
                'district'              => 'Foo_district',
                'postal_code'           => 'Foo_postal_code',
                'city'                  => 'Foo_city',
                'country'               => 'us',
                'latitude'              => 'Foo_latitude',
                'longitude'             => 'Foo_longitude',
            )
        );
        $address->save();

        $input = array(
            'street_1'              => 'Bar_street_1',
            'street_2'              => 'Bar_street_2',
            'number'                => 17,
            'box'                   => 'Bar_box',
            'district'              => 'Bar_district',
            'postal_code'           => 'Bar_postal_code',
            'city'                  => 'Bar_city',
            'country'               => 'be',
            'latitude'              => 'Bar_latitude',
            'longitude'             => 'Bar_longitude',
        );

        $this->addressFactory->modify( $address, $input );

        $addressRepository = App::make('\App\Repositories\Eloquent\EloquentAddressRepository');
        $this->assertEquals( 1, $addressRepository->all()->count() );
        $this->assertEquals( 'Bar_street_1', $addressRepository->all()->first()->street_1 );
    }

}