<?php


use Ixudra\Portfolio\Models\Project;

class ProjectFormHelperTest extends BaseUnitTestCase {

    const PROJECT_ID_1 = 15;

    const PROJECT_ID_2 = 17;


    protected $projectFormHelper;


    public function setUp()
    {
        parent::setUp();

        $this->projectFormHelper = App::make('\Ixudra\Portfolio\Services\Form\ProjectFormHelper');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Form\ProjectFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Core\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetProjectsAsSelectList()
    {
        $this->setUpMocks();

        $result = $this->projectFormHelper->getProjectsAsSelectList();

        $this->assertEquals(
            array(
                self::PROJECT_ID_1     => 'Foo',
                self::PROJECT_ID_2     => 'Bar'
            ), $result
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Form\ProjectFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Core\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetProjectsAsSelectList_includesNullValueIfRequired()
    {
        $this->setUpMocks();

        $result = $this->projectFormHelper->getProjectsAsSelectList(true);

        $this->assertEquals(
            array(
                0                       => 'Choose ...',
                self::PROJECT_ID_1      => 'Foo',
                self::PROJECT_ID_2      => 'Bar'
            ), $result
        );
    }


    protected function setUpMocks()
    {
        $project1 = new Project();
        $project1->id = self::PROJECT_ID_1;
        $project1->name = 'Foo';

        $project2 = new Project();
        $project2->id = self::PROJECT_ID_2;
        $project2->name = 'Bar';

        $projects = new \Illuminate\Support\Collection( array( $project1, $project2 ) );

        $projectRepository = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository');
        $projectRepository->shouldReceive('all')->once()->andReturn($projects);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository', $projectRepository);
    }

}