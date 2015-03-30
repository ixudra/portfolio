<?php


use Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository;
use Ixudra\Portfolio\Models\Person;

class EloquentPersonRepositoryTest extends BaseRepositoryTestCase {

    protected $personRepository;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('people');

        $this->personRepository = new EloquentPersonRepository();
    }


    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository::all()
     */
    public function testAll()
    {
        $person1 = Person::create( array( 'birth_date' => '2015-03-21' ) );
        $person2 = Person::create( array( 'birth_date' => '2015-03-22' ) );
        $person3 = Person::create( array( 'birth_date' => '2015-03-23' ) );
        $person4 = Person::create( array( 'birth_date' => '2015-03-22' ) );
        $person5 = Person::create( array( 'birth_date' => '2015-03-23' ) );

        $people = $this->personRepository->all();

        $this->assertCount(5, $people);
        $this->assertContainsOnlyInstancesOf('\Ixudra\Portfolio\Models\Person', $people);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository::find()
     */
    public function testFind()
    {
        $person = Person::create( array( 'birth_date' => '2015-03-21' ) );

        $result = $this->personRepository->find($person->id);

        $this->assertInstanceOf('\Ixudra\Portfolio\Models\Person', $result);
        $this->assertEquals('2015-03-21', $result->birth_date);
    }

    /**
     * @covers EloquentPersonRepository::find()
     */
    public function testFind_returnsNullIfPersonDoesNotExist()
    {
        $result = $this->personRepository->find(100);

        $this->assertNull($result);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository::findByFilter()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter()
    {
        $person1 = Person::create( array( 'birth_date' => '2015-03-21' ) );
        $person2 = Person::create( array( 'birth_date' => '2015-03-22' ) );
        $person3 = Person::create( array( 'birth_date' => '2015-03-23' ) );
        $person4 = Person::create( array( 'birth_date' => '2015-03-22' ) );
        $person5 = Person::create( array( 'birth_date' => '2015-03-23' ) );

        $filter = array( 'birth_date' => '2015-03-22' );

        $people = $this->personRepository->findByFilter($filter);

        $this->assertCount(1, $people);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Person', $people);
        $this->assertCollectionContains( array($person2), $people );
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository::findByFilter()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter_returnsEmptyArrayIfNoPeopleMatchFilter()
    {
        $person1 = Person::create( array( 'birth_date' => '2015-03-21' ) );
        $person2 = Person::create( array( 'birth_date' => '2015-03-22' ) );

        $filter = array( 'birth_date' => '2015-03-23' );

        $people = $this->personRepository->findByFilter($filter);

        $this->assertCount(0, $people);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository::search()
     */
    public function testSearch()
    {
        $person1 = Person::create( array( 'first_name' => 'Foo_first_name', 'last_name' => 'Bar_last_name', 'email' => 'foz@bar.com' ) );
        $person2 = Person::create( array( 'first_name' => 'Bar_first_name', 'last_name' => 'Foo_last_name', 'email' => 'baz@bar.com' ) );
        $person3 = Person::create( array( 'first_name' => 'Foz_first_name', 'last_name' => 'Baz_last_name', 'email' => 'fow@bar.com' ) );
        $person4 = Person::create( array( 'first_name' => 'Baz_first_name', 'last_name' => 'Fow_last_name', 'email' => 'baw@bar.com' ) );
        $person5 = Person::create( array( 'first_name' => 'Fow_first_name', 'last_name' => 'Fow_last_name', 'email' => 'foz@foo.com' ) );

        $filters = array(
            'query'             => 'Foo'
        );

        $paginator = $this->personRepository->search($filters, 50, true);
        $people = $paginator->getCollection();

        $this->assertCount(2, $people);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Person', $people);
        $this->assertCollectionContains( array($person1, $person2, $person5), $people );
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository::search()
     */
    public function testSearch_returnsAllResultsIfNoFiltersProvided()
    {
        $person1 = Person::create( array( 'birth_date' => '2015-03-21' ) );
        $person2 = Person::create( array( 'birth_date' => '2015-03-22' ) );
        $person3 = Person::create( array( 'birth_date' => '2015-03-23' ) );
        $person4 = Person::create( array( 'birth_date' => '2015-03-22' ) );
        $person5 = Person::create( array( 'birth_date' => '2015-03-23' ) );

        $filters = array();

        $paginator = $this->personRepository->search($filters, 50, true);
        $people = $paginator->getCollection();

        $this->assertCount(5, $people);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Person', $people);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository::search()
     */
    public function testSearch_usesPagination()
    {
        $person1 = Person::create( array( 'birth_date' => '2015-03-21' ) );
        $person2 = Person::create( array( 'birth_date' => '2015-03-22' ) );
        $person3 = Person::create( array( 'birth_date' => '2015-03-23' ) );
        $person4 = Person::create( array( 'birth_date' => '2015-03-22' ) );
        $person5 = Person::create( array( 'birth_date' => '2015-03-23' ) );

        $filters = array();

        $paginator = $this->personRepository->search($filters, 2, true);
        $people = $paginator->getCollection();

        $this->assertCount(2, $people);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Person', $people);
    }

}
