<?php


use Ixudra\Portfolio\Models\ProjectType;

class ProjectTypeFormHelperTest extends BaseUnitTestCase {

    const PROJECT_TYPE_ID_1 = 15;

    const PROJECT_TYPE_ID_2 = 17;


    protected $projectTypeFormHelper;


    public function setUp()
    {
        parent::setUp();

        $this->projectTypeFormHelper = App::make('\Ixudra\Portfolio\Services\Form\ProjectTypeFormHelper');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Form\ProjectTypeFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Core\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetProjectTypesAsSelectList()
    {
        $this->setUpMocks();

        $result = $this->projectTypeFormHelper->getProjectTypesAsSelectList();

        $this->assertEquals(
            array(
                self::PROJECT_TYPE_ID_1         => 'Foo',
                self::PROJECT_TYPE_ID_2         => 'Bar'
            ), $result
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Form\ProjectTypeFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Core\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetProjectTypesAsSelectList_includesNullValueIfRequired()
    {
        $this->setUpMocks();

        $result = $this->projectTypeFormHelper->getProjectTypesAsSelectList(true);

        $this->assertEquals(
            array(
                0                               => 'Choose ...',
                self::PROJECT_TYPE_ID_1         => 'Foo',
                self::PROJECT_TYPE_ID_2         => 'Bar'
            ), $result
        );
    }


    protected function setUpMocks()
    {
        $projectType1 = new ProjectType();
        $projectType1->id = self::PROJECT_TYPE_ID_1;
        $projectType1->name = 'Foo';

        $projectType2 = new ProjectType();
        $projectType2->id = self::PROJECT_TYPE_ID_2;
        $projectType2->name = 'Bar';

        $projectTypes = new \Illuminate\Support\Collection( array( $projectType1, $projectType2 ) );

        $projectTypeRepository = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository');
        $projectTypeRepository->shouldReceive('all')->once()->andReturn($projectTypes);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository', $projectTypeRepository);
    }

}