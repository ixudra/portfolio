<?php


use Ixudra\Portfolio\Models\Person;
use Ixudra\Portfolio\Models\Address;

class PersonFactoryTest extends BaseFunctionalTestCase {

    protected $personFactory;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('people');

        $this->personFactory = App::make('\Ixudra\Portfolio\Services\Factories\PersonFactory');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Factories\PersonFactory::create()
     * @covers \Ixudra\Portfolio\Services\Factories\PersonFactory::extractAddressInput()
     * @covers \Ixudra\Portfolio\Services\Factories\PersonFactory::extractApartmentInput()
     */
    public function testCreate()
    {
        $input = array(
            'first_name'                    => 'Foo_first_name',
            'last_name'                     => 'Foo_last_name',
            'birth_date'                    => '2015-03-22',
            'email'                         => 'foo@bar.com',
            'cellphone'                     => '011223344',

            'street_1'                      => 'Foo_street_1',
            'street_2'                      => 'Foo_street_2',
            'number'                        => 15,
            'box'                           => 'Foo_box',
            'district'                      => 'Foo_district',
            'postal_code'                   => 'Foo_postal_code',
            'city'                          => 'Foo_city',
            'country'                       => 'us',
        );

        $person = $this->personFactory->make( $input );

        $personRepository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository');
        $this->assertEquals( 1, $personRepository->all()->count() );
        $this->assertInstanceOf( '\Ixudra\Portfolio\Models\Person', $person );

        $addressRepository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentAddressRepository');
        $this->assertEquals( 1, $addressRepository->all()->count() );
        $this->assertInstanceOf( '\Ixudra\Portfolio\Models\Address', $person->address );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Factories\PersonFactory::modify()
     * @covers \Ixudra\Portfolio\Services\Factories\PersonFactory::extractAddressInput()
     * @covers \Ixudra\Portfolio\Services\Factories\PersonFactory::extractApartmentInput()
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
            )
        );
        $address->save();

        $person = new Person(
            array(
                'first_name'                    => 'Foo_first_name',
                'last_name'                     => 'Foo_last_name',
                'birth_date'                    => '2015-03-22',
                'email'                         => 'foo@bar.com',
                'cellphone'                     => '011223344',
                'address_id'                    => $address->id,
            )
        );
        $person->save();

        $input = array(
            'first_name'                    => 'Bar_first_name',
            'last_name'                     => 'Bar_last_name',
            'birth_date'                    => '2015-03-29',
            'email'                         => 'foz@baz.com',
            'cellphone'                     => '022334455',

            'street_1'                      => 'Bar_street_1',
            'street_2'                      => 'Bar_street_2',
            'number'                        => 17,
            'box'                           => 'Bar_box',
            'district'                      => 'Bar_district',
            'postal_code'                   => 'Bar_postal_code',
            'city'                          => 'Bar_city',
            'country'                       => 'be',
        );

        $this->personFactory->modify( $person, $input );

        $personRepository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository');
        $this->assertEquals( 1, $personRepository->all()->count() );
        $this->assertEquals( 'Bar_first_name', $personRepository->all()->first()->first_name );
    }

}