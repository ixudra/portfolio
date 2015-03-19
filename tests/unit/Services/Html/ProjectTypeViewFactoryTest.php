<?php


use Ixudra\Portfolio\Models\ProjectType;

class ProjectTypeViewFactoryTest extends BaseViewFactoryTestCase {

    protected $projectTypeViewFactory;


    public function setUp()
    {
        parent::setUp();

        $this->projectTypeViewFactory = App::make('\Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory::index()
     * @covers \Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory::prepareFilter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testIndex()
    {
        $input = array(
            //...
        );

        $this->createFilterMocks( $input );

        $view = $this->projectTypeViewFactory->index();

        $this->assertViewName( $view, 'portfolio::projectTypes.index' );

        $this->assertFilterMocks( $view, $input );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesInputIfInputIsNotNull()
    {
        $this->createFormMocks();

        $view = $this->projectTypeViewFactory->create('Foo');

        $this->assertViewName( $view, 'portfolio::projectTypes.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesDefaultValuesIfInputIsNull()
    {
        $projectTypeInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper');
        $projectTypeInputHelperMock->shouldReceive('getDefaultInput')->once()->andReturn('Foo');
        App::instance('\Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper', $projectTypeInputHelperMock);

        $this->createFormMocks();

        $view = $this->projectTypeViewFactory->create( null );

        $this->assertViewName( $view, 'portfolio::projectTypes.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory::show()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testShow()
    {
        $projectType = new ProjectType( array(  'name' => 'Foo' ) );

        $view = $this->projectTypeViewFactory->show($projectType);

        $this->assertViewName( $view, 'portfolio::projectTypes.show' );
        $this->assertViewData( $view, 'projectType', $projectType );
        $this->assertEquals( 'Foo', $view['projectType']->name );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesInputValuesIfInputIsNotNull()
    {
        $projectType = new ProjectType( array( 'name' => 'Foo' ) );

        $this->createFormMocks();

        $view = $this->projectTypeViewFactory->edit($projectType, 'Bar');

        $this->assertViewName( $view, 'portfolio::projectTypes.edit' );
        $this->assertViewData( $view, 'projectType', $projectType );
        $this->assertViewData( $view, 'input', 'Bar' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\ProjectTypeViewFactory::prepareForm()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Core\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesProjectTypeValuesIfInputIsNull()
    {
        $projectTypeInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper');
        $projectTypeInputHelperMock->shouldReceive('getInputForModel')->once()->andReturn('Bar');
        App::instance('\Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper', $projectTypeInputHelperMock);

        $projectType = new ProjectType( array('name' => 'Bar') );

        $this->createFormMocks();

        $view = $this->projectTypeViewFactory->edit($projectType, null);

        $this->assertViewName( $view, 'portfolio::projectTypes.edit' );
        $this->assertViewData( $view, 'projectType', $projectType );
        $this->assertViewData( $view, 'input', 'Bar');
        $this->assertFormMocks( $view );
    }

    protected function createFilterMocks($input)
    {
        $searchInput = array( 'Fow' => 'Baw' );

        $projectTypeInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper');
        $projectTypeInputHelperMock->shouldReceive('getInputForSearch')->once()->with($input)->andReturn($searchInput);
        App::instance('\Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper', $projectTypeInputHelperMock);

        $projectType1 = new ProjectType( array( 'name' => 'Foo' ) );
        $projectType2 = new ProjectType( array( 'name' => 'Bar' ) );
        $projectTypes = new \Illuminate\Support\Collection( array( $projectType1, $projectType2 ) );

        $projectTypeInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository');
        $projectTypeInputHelperMock->shouldReceive('search')->once()->with($searchInput, 25)->andReturn($projectTypes);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentProjectTypeRepository', $projectTypeInputHelperMock);
    }

    protected function assertFilterMocks($view, $input)
    {
        $this->assertViewData( $view, 'input', $input );
        $this->assertViewDataSize( $view, 'projectTypes', 2 );
        $this->assertEquals( 'Foo', $view['projectTypes'][0]->name );
        $this->assertEquals( 'Bar', $view['projectTypes'][1]->name );
    }

    protected function createFormMocks()
    {
        // ...
    }

    protected function assertFormMocks($view)
    {
        // ...
    }

}