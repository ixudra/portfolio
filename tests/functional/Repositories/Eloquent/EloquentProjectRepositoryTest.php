<?php


use Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository;
use Ixudra\Portfolio\Models\Project;

class EloquentProjectRepositoryTest extends BaseRepositoryTestCase {

    protected $projectRepository;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('projects');

        $this->projectRepository = new EloquentProjectRepository();
    }


    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository::all()
     */
    public function testAll()
    {
        $project1 = Project::create( array( 'name' => 'Project 1' ) );
        $project2 = Project::create( array( 'name' => 'Project 2' ) );
        $project3 = Project::create( array( 'name' => 'Project 3' ) );
        $project4 = Project::create( array( 'name' => 'Project 4' ) );
        $project5 = Project::create( array( 'name' => 'Project 5' ) );

        $projects = $this->projectRepository->all();

        $this->assertCount(5, $projects);
        $this->assertContainsOnlyInstancesOf('Ixudra\Portfolio\Models\Project', $projects);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository::find()
     */
    public function testFind()
    {
        $project = Project::create( array( 'name' => 'Project 1' ) );

        $result = $this->projectRepository->find($project->id);

        $this->assertInstanceOf('Ixudra\Portfolio\Models\Project', $result);
        $this->assertEquals('Project 1', $result->name);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository::find()
     */
    public function testFind_returnsNullIfProjectDoesNotExist()
    {
        $result = $this->projectRepository->find(100);

        $this->assertNull($result);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository::findByFilter()
     * @covers \Ixudra\Core\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \Ixudra\Core\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter()
    {
        $project1 = Project::create( array( 'name' => 'Project 1' ) );
        $project2 = Project::create( array( 'name' => 'Project 2' ) );
        $project3 = Project::create( array( 'name' => 'Project 3' ) );
        $project4 = Project::create( array( 'name' => 'Project 4' ) );
        $project5 = Project::create( array( 'name' => 'Project 5' ) );

        $filter = array( 'name' => 'Project 2' );

        $projects = $this->projectRepository->findByFilter($filter);

        $this->assertCount(1, $projects);
        $this->assertCollectionWithOnlyInstancesOf('Ixudra\Portfolio\Models\Project', $projects);
        $this->assertCollectionContains( array($project2), $projects );
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository::findByFilter()
     * @covers \Ixudra\Core\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \Ixudra\Core\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter_returnsEmptyArrayIfNoProjectsMatchFilter()
    {
        $project1 = Project::create( array( 'name' => 'Project 1' ) );
        $project2 = Project::create( array( 'name' => 'Project 2' ) );

        $filter = array( 'name' => 'Project 3' );

        $projects = $this->projectRepository->findByFilter($filter);

        $this->assertCount(0, $projects);
    }

//    /**
//     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository::search()
//     */
//    public function testSearch()
//    {
//        $project1 = Project::create( array( 'name' => 'Foo_Project 1' ) );
//        $project2 = Project::create( array( 'name' => 'Bar_Project 2' ) );
//        $project3 = Project::create( array( 'name' => 'Bar_Project 3' ) );
//        $project4 = Project::create( array( 'name' => 'Foo_Project 4' ) );
//        $project5 = Project::create( array( 'name' => 'Foz_Project 5' ) );
//
//        $filters = array(
//            'brand_id'          => 1,
//            'query'             => 'Foo'
//        );
//
//        $paginator = $this->projectRepository->search($filters, 50, true);
//        $projects = $paginator->getCollection();
//
//        $this->assertCount(5, $projects);
//        $this->assertCollectionWithOnlyInstancesOf('Ixudra\Portfolio\Project', $projects);
//        $this->assertCollectionContains( array($project1), $projects );
//    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository::search()
     */
    public function testSearch_returnsAllResultsIfNoFiltersProvided()
    {
        $project1 = Project::create( array( 'name' => 'Foo_Project 1' ) );
        $project2 = Project::create( array( 'name' => 'Bar_Project 2' ) );
        $project3 = Project::create( array( 'name' => 'Bar_Project 3' ) );
        $project4 = Project::create( array( 'name' => 'Foo_Project 4' ) );
        $project5 = Project::create( array( 'name' => 'Foz_Project 5' ) );

        $filters = array();

        $paginator = $this->projectRepository->search($filters, 50, true);
        $projects = $paginator->getCollection();

        $this->assertCount(5, $projects);
        $this->assertCollectionWithOnlyInstancesOf('Ixudra\Portfolio\Models\Project', $projects);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository::search()
     */
    public function testSearch_usesPagination()
    {
        $project1 = Project::create( array( 'name' => 'Foo_Project 1' ) );
        $project2 = Project::create( array( 'name' => 'Bar_Project 2' ) );
        $project3 = Project::create( array( 'name' => 'Bar_Project 3' ) );
        $project4 = Project::create( array( 'name' => 'Foo_Project 4' ) );
        $project5 = Project::create( array( 'name' => 'Foz_Project 5' ) );

        $filters = array();

        $paginator = $this->projectRepository->search($filters, 2, true);
        $projects = $paginator->getCollection();

        $this->assertCount(2, $projects);
        $this->assertCollectionWithOnlyInstancesOf('Ixudra\Portfolio\Models\Project', $projects);
    }

}
