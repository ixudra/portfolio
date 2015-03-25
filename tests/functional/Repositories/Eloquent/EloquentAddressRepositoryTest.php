<?php


use App\Repositories\Eloquent\EloquentAddressRepository;
use App\Models\Address;

class EloquentAddressRepositoryTest extends BaseRepositoryTestCase {

    protected $addressRepository;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('addresses');

        $this->addressRepository = new EloquentAddressRepository();
    }


    /**
     * @covers \App\Repositories\Eloquent\EloquentAddressRepository::all()
     */
    public function testAll()
    {
        $address1 = Address::create( array( 'street_1' => 'Street 1' ) );
        $address2 = Address::create( array( 'street_1' => 'Street 2' ) );
        $address3 = Address::create( array( 'street_1' => 'Street 3' ) );
        $address4 = Address::create( array( 'street_1' => 'Street 4' ) );
        $address5 = Address::create( array( 'street_1' => 'Street 5' ) );

        $addresses = $this->addressRepository->all();

        $this->assertCount(5, $addresses);
        $this->assertContainsOnlyInstancesOf('\App\Models\Address', $addresses);
    }

    /**
     * @covers \App\Repositories\Eloquent\EloquentAddressRepository::find()
     */
    public function testFind()
    {
        $address = Address::create( array( 'street_1' => 'Street 1' ) );

        $result = $this->addressRepository->find($address->id);

        $this->assertInstanceOf('\App\Models\Address', $result);
        $this->assertEquals('Street 1', $result->street_1);
    }

    /**
     * @covers EloquentAddressRepository::find()
     */
    public function testFind_returnsNullIfAddressDoesNotExist()
    {
        $result = $this->addressRepository->find(100);

        $this->assertNull($result);
    }

    /**
     * @covers \App\Repositories\Eloquent\EloquentAddressRepository::findByFilter()
     * @covers \App\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \App\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter()
    {
        $address1 = Address::create( array( 'street_1' => 'Street 1' ) );
        $address2 = Address::create( array( 'street_1' => 'Street 2' ) );
        $address3 = Address::create( array( 'street_1' => 'Street 3' ) );
        $address4 = Address::create( array( 'street_1' => 'Street 4' ) );
        $address5 = Address::create( array( 'street_1' => 'Street 5' ) );

        $filter = array( 'street_1' => 'Street 2' );

        $addresses = $this->addressRepository->findByFilter($filter);

        $this->assertCount(1, $addresses);
        $this->assertCollectionWithOnlyInstancesOf('\App\Models\Address', $addresses);
        $this->assertCollectionContains( array($address2), $addresses );
    }

    /**
     * @covers \App\Repositories\Eloquent\EloquentAddressRepository::findByFilter()
     * @covers \App\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \App\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter_returnsEmptyArrayIfNoAddressesMatchFilter()
    {
        $address1 = Address::create( array( 'street_1' => 'Street 1' ) );
        $address2 = Address::create( array( 'street_1' => 'Street 2' ) );

        $filter = array( 'street_1' => 'Street 3' );

        $addresses = $this->addressRepository->findByFilter($filter);

        $this->assertCount(0, $addresses);
    }

    /**
     * @covers \App\Repositories\Eloquent\EloquentAddressRepository::search()
     */
    public function testSearch()
    {
        $address1 = Address::create( array( 'city' => 'City 1' ) );
        $address2 = Address::create( array( 'city' => 'City 2' ) );
        $address3 = Address::create( array( 'city' => 'City 3' ) );
        $address4 = Address::create( array( 'city' => 'City 2' ) );
        $address5 = Address::create( array( 'city' => 'City 3' ) );

        $filters = array(
            'city'              => 'City 2'
        );

        $paginator = $this->addressRepository->search($filters, 50, true);
        $addresses = $paginator->getCollection();

        $this->assertCount(2, $addresses);
        $this->assertCollectionWithOnlyInstancesOf('\App\Models\Address', $addresses);
        $this->assertCollectionContains( array($address2, $address4), $addresses );
    }

    /**
     * @covers \App\Repositories\Eloquent\EloquentAddressRepository::search()
     */
    public function testSearch_returnsAllResultsIfNoFiltersProvided()
    {
        $address1 = Address::create( array( 'city' => 'City 1' ) );
        $address2 = Address::create( array( 'city' => 'City 2' ) );
        $address3 = Address::create( array( 'city' => 'City 3' ) );
        $address4 = Address::create( array( 'city' => 'City 2' ) );
        $address5 = Address::create( array( 'city' => 'City 3' ) );

        $filters = array();

        $paginator = $this->addressRepository->search($filters, 50, true);
        $addresses = $paginator->getCollection();

        $this->assertCount(5, $addresses);
        $this->assertCollectionWithOnlyInstancesOf('\App\Models\Address', $addresses);
    }

    /**
     * @covers \App\Repositories\Eloquent\EloquentAddressRepository::search()
     */
    public function testSearch_usesPagination()
    {
        $address1 = Address::create( array( 'city' => 'City 1' ) );
        $address2 = Address::create( array( 'city' => 'City 2' ) );
        $address3 = Address::create( array( 'city' => 'City 3' ) );
        $address4 = Address::create( array( 'city' => 'City 2' ) );
        $address5 = Address::create( array( 'city' => 'City 3' ) );

        $filters = array();

        $paginator = $this->addressRepository->search($filters, 2, true);
        $addresses = $paginator->getCollection();

        $this->assertCount(2, $addresses);
        $this->assertCollectionWithOnlyInstancesOf('\App\Models\Address', $addresses);
    }

}
