<?php


use Ixudra\Portfolio\Models\Project;

class ProjectFactoryTest extends BaseFunctionalTestCase {

    protected $projectFactory;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('projects');

        $this->personFactory = App::make('\Ixudra\Portfolio\Services\Factories\ProjectFactory');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Factories\ProjectFactory::create()
     */
    public function testCreate()
    {
        $input = array(
            'name'                  => 'Foo',
            'contractor_id'         => 1,
            'customer_id'           => 2
        );

        $project = $this->projectFactory->make( $input );

        $projectRepository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository');
        $this->assertEquals( 1, $projectRepository->all()->count() );
        $this->assertInstanceOf( '\Ixudra\Portfolio\Models\Project', $project );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Factories\ProjectFactory::modify()
     */
    public function testModify()
    {
        $project = new Project(
            array(
                'name'                  => 'Foo',
                'contractor_id'         => 1,
                'customer_id'           => 2,
            )
        );
        $project->save();

        $input = array(
            'name'                  => 'Bar',
            'contractor_id'         => 3,
            'customer_id'           => 4,
        );

        $this->projectFactory->modify( $project, $input );

        $projectRepository = App::make('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository');
        $this->assertEquals( 1, $projectRepository->all()->count() );
        $this->assertEquals( 'Bar', $projectRepository->all()->first()->name );
    }

}