<?php


use Ixudra\Portfolio\Models\Project;

class ProjectViewFactoryTest extends BaseViewFactoryTestCase {

    protected $projectViewFactory;


    public function setUp()
    {
        parent::setUp();

        $this->projectViewFactory = App::make('\Ixudra\Portfolio\Services\Html\ProjectViewFactory');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectViewFactory::index()
     * @covers \Ixudra\Portfolio\Services\Html\ProjectViewFactory::prepareFilter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testIndex()
    {
        $input = array(
            'query'                 => '',
            'customer_id'           => '',
            'project_type_id'       => ''
        );

        $this->createFilterMocks( $input );

        $view = $this->projectViewFactory->index();

        $this->assertViewName( $view, 'bootstrap.projects.index' );

        $this->assertFilterMocks( $view, $input );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\ProjectViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesInputIfInputIsNotNull()
    {
        $this->createFormMocks();

        $view = $this->projectViewFactory->create('Foo');

        $this->assertViewName( $view, 'bootstrap.projects.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\ProjectViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesDefaultValuesIfInputIsNull()
    {
        $projectInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\ProjectInputHelper');
        $projectInputHelperMock->shouldReceive('getDefaultInput')->once()->andReturn('Foo');
        App::instance('\Ixudra\Portfolio\Services\Input\ProjectInputHelper', $projectInputHelperMock);

        $this->createFormMocks();

        $view = $this->projectViewFactory->create(null);

        $this->assertViewName( $view, 'bootstrap.projects.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectViewFactory::show()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testShow()
    {
        $project = new Project( array(  'name' => 'Foo' ) );

        $view = $this->projectViewFactory->show($project);

        $this->assertViewName( $view, 'bootstrap.projects.show' );
        $this->assertViewData( $view, 'project', $project );
        $this->assertEquals( 'Foo', $view['project']->name );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\ProjectViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesInputValuesIfInputIsNotNull()
    {
        $project = new Project( array( 'name' => 'Foo' ) );

        $this->createFormMocks();

        $view = $this->projectViewFactory->edit($project, 'Bar');

        $this->assertViewName( $view, 'bootstrap.projects.edit' );
        $this->assertViewData( $view, 'project', $project );
        $this->assertViewData( $view, 'input', 'Bar' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\ProjectViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesProjectValuesIfInputIsNull()
    {
        $projectInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\ProjectInputHelper');
        $projectInputHelperMock->shouldReceive('getInputForModel')->once()->andReturn('Bar');
        App::instance('\Ixudra\Portfolio\Services\Input\ProjectInputHelper', $projectInputHelperMock);

        $project = new Project( array('name' => 'Bar') );

        $this->createFormMocks();

        $view = $this->projectViewFactory->edit($project, null);

        $this->assertViewName( $view, 'bootstrap.projects.edit' );
        $this->assertViewData( $view, 'project', $project );
        $this->assertViewData( $view, 'input', 'Bar');
        $this->assertFormMocks( $view );
    }

    protected function createFilterMocks($input)
    {
        $searchInput = array( 'Fow' => 'Baw' );

        $projectInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\ProjectInputHelper');
        $projectInputHelperMock->shouldReceive('getInputForSearch')->once()->with($input)->andReturn($searchInput);
        App::instance('\Ixudra\Portfolio\Services\Input\ProjectInputHelper', $projectInputHelperMock);

        $customerFormHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Form\CustomerFormHelper');
        $customerFormHelperMock->shouldReceive('getAllAsSelectList')->once()->with(true)->andReturn('CustomerList');
        App::instance('\Ixudra\Portfolio\Services\Form\CustomerFormHelper', $customerFormHelperMock);

        $projectTypeFormHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Form\ProjectInputHelper');
        $projectTypeFormHelperMock->shouldReceive('getAllAsSelectList')->once()->with(true)->andReturn('ProjectTypeList');
        App::instance('\Ixudra\Portfolio\Services\Form\ProjectInputHelper', $projectTypeFormHelperMock);

        $project1 = new Project( array( 'name' => 'Foo' ) );
        $project2 = new Project( array( 'name' => 'Bar' ) );
        $projects = new \Illuminate\Support\Collection( array( $project1, $project2 ) );

        $projectRepositoryMock = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository');
        $projectRepositoryMock->shouldReceive('search')->once()->with($searchInput, 25)->andReturn($projects);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectRepository', $projectRepositoryMock);
    }

    protected function assertFilterMocks($view, $input)
    {
        $this->assertViewData( $view, 'input', $input );
        $this->assertViewDataSize( $view, 'projects', 2 );
        $this->assertEquals( 'Foo', $view['projects'][0]->name );
        $this->assertEquals( 'Bar', $view['projects'][1]->name );
    }

    protected function createFormMocks()
    {
        $projectFormHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Form\ProjectFormHelper');
        $projectFormHelperMock->shouldReceive('getStatusesAsSelectList')->once()->andReturn('ProjectStatusList');
        App::instance('\Ixudra\Portfolio\Services\Form\ProjectFormHelper', $projectFormHelperMock);

        $customerFormHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Form\CustomerFormHelper');
        $customerFormHelperMock->shouldReceive('getAllAsSelectList')->once()->andReturn('CustomerList');
        App::instance('\Ixudra\Portfolio\Services\Form\CustomerFormHelper', $customerFormHelperMock);

        $projectTypeFormHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Form\ProjectFormHelper');
        $projectTypeFormHelperMock->shouldReceive('getAllAsSelectList')->once()->andReturn('ProjectTypeList');
        App::instance('\Ixudra\Portfolio\Services\Form\ProjectFormHelper', $projectTypeFormHelperMock);
    }

    protected function assertFormMocks($view)
    {
        $this->assertViewData( $view, 'statuses', 'ProjectStatusList' );
        $this->assertViewData( $view, 'projectTypes', 'ProjectTypeList' );
    }

}