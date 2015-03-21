<?php


use Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository;
use Ixudra\Portfolio\Models\ProjectType;

class EloquentProjectTypeRepositoryTest extends BaseRepositoryTestCase {

    protected $projectTypeRepository;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('project_types');

        $this->projectTypeRepository = new EloquentProjectTypeRepository();
    }


    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository::all()
     */
    public function testAll()
    {
        $projectType1 = ProjectType::create( array( 'name' => 'ProjectType 1' ) );
        $projectType2 = ProjectType::create( array( 'name' => 'ProjectType 2' ) );
        $projectType3 = ProjectType::create( array( 'name' => 'ProjectType 3' ) );
        $projectType4 = ProjectType::create( array( 'name' => 'ProjectType 4' ) );
        $projectType5 = ProjectType::create( array( 'name' => 'ProjectType 5' ) );

        $projectTypes = $this->projectTypeRepository->all();

        $this->assertCount(5, $projectTypes);
        $this->assertContainsOnlyInstancesOf('\Ixudra\Portfolio\Models\ProjectType', $projectTypes);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository::find()
     */
    public function testFind()
    {
        $projectType = ProjectType::create( array( 'name' => 'ProjectType 1' ) );

        $result = $this->projectTypeRepository->find($projectType->id);

        $this->assertInstanceOf('\Ixudra\Portfolio\Models\ProjectType', $result);
        $this->assertEquals('ProjectType 1', $result->name);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository::find()
     */
    public function testFind_returnsNullIfProjectTypeDoesNotExist()
    {
        $result = $this->projectTypeRepository->find(100);

        $this->assertNull($result);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository::findByFilter()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter()
    {
        $projectType1 = ProjectType::create( array( 'name' => 'ProjectType 1' ) );
        $projectType2 = ProjectType::create( array( 'name' => 'ProjectType 2' ) );
        $projectType3 = ProjectType::create( array( 'name' => 'ProjectType 3' ) );
        $projectType4 = ProjectType::create( array( 'name' => 'ProjectType 4' ) );
        $projectType5 = ProjectType::create( array( 'name' => 'ProjectType 5' ) );

        $filter = array( 'name' => 'ProjectType 2' );

        $projectTypes = $this->projectTypeRepository->findByFilter($filter);

        $this->assertCount(1, $projectTypes);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\ProjectType', $projectTypes);
        $this->assertCollectionContains( array($projectType2), $projectTypes );
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository::findByFilter()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter_returnsEmptyArrayIfNoProjectTypesMatchFilter()
    {
        $projectType1 = ProjectType::create( array( 'name' => 'ProjectType 1' ) );
        $projectType2 = ProjectType::create( array( 'name' => 'ProjectType 2' ) );

        $filter = array( 'name' => 'ProjectType 3' );

        $projectTypes = $this->projectTypeRepository->findByFilter($filter);

        $this->assertCount(0, $projectTypes);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository::search()
     */
    public function testSearch()
    {
        $projectType1 = ProjectType::create( array( 'name' => 'Foo_ProjectType 1' ) );
        $projectType2 = ProjectType::create( array( 'name' => 'Bar_ProjectType 2' ) );
        $projectType3 = ProjectType::create( array( 'name' => 'Bar_ProjectType 3' ) );
        $projectType4 = ProjectType::create( array( 'name' => 'Foo_ProjectType 4' ) );
        $projectType5 = ProjectType::create( array( 'name' => 'Foz_ProjectType 5' ) );

        $filters = array(
            'name'          => 'foo',
        );

        $paginator = $this->projectTypeRepository->search($filters, 50, true);
        $projectTypes = $paginator->getCollection();

        $this->assertCount(2, $projectTypes);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\ProjectType', $projectTypes);
        $this->assertCollectionContains( array($projectType1, $projectType4), $projectTypes );
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository::search()
     */
    public function testSearch_returnsAllResultsIfNoFiltersProvided()
    {
        $projectType1 = ProjectType::create( array( 'name' => 'Foo_ProjectType 1' ) );
        $projectType2 = ProjectType::create( array( 'name' => 'Bar_ProjectType 2' ) );
        $projectType3 = ProjectType::create( array( 'name' => 'Bar_ProjectType 3' ) );
        $projectType4 = ProjectType::create( array( 'name' => 'Foo_ProjectType 4' ) );
        $projectType5 = ProjectType::create( array( 'name' => 'Foz_ProjectType 5' ) );

        $filters = array();

        $paginator = $this->projectTypeRepository->search($filters, 50, true);
        $projectTypes = $paginator->getCollection();

        $this->assertCount(5, $projectTypes);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\ProjectType', $projectTypes);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository::search()
     */
    public function testSearch_usesPagination()
    {
        $projectType1 = ProjectType::create( array( 'name' => 'Foo_ProjectType 1' ) );
        $projectType2 = ProjectType::create( array( 'name' => 'Bar_ProjectType 2' ) );
        $projectType3 = ProjectType::create( array( 'name' => 'Bar_ProjectType 3' ) );
        $projectType4 = ProjectType::create( array( 'name' => 'Foo_ProjectType 4' ) );
        $projectType5 = ProjectType::create( array( 'name' => 'Foz_ProjectType 5' ) );

        $filters = array();

        $paginator = $this->projectTypeRepository->search($filters, 2, true);
        $projectTypes = $paginator->getCollection();

        $this->assertCount(2, $projectTypes);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\ProjectType', $projectTypes);
    }

}
