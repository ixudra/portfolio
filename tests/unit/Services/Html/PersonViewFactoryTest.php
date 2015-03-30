<?php


use Ixudra\Portfolio\Models\Person;

class PersonViewFactoryTest extends BaseViewFactoryTestCase {

    protected $personViewFactory;


    public function setUp()
    {
        parent::setUp();

        $this->personViewFactory = App::make('\Ixudra\Portfolio\Services\Html\PersonViewFactory');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Html\PersonViewFactory::index()
     * @covers \Ixudra\Portfolio\Services\Html\PersonViewFactory::prepareFilter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testIndex()
    {
        $input = array(
            'query'         => ''
        );

        $this->createFilterMocks( $input );

        $view = $this->personViewFactory->index();

        $this->assertViewName( $view, 'portfolio::people.index' );

        $this->assertFilterMocks( $view, $input );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\PersonViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\PersonViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesInputIfInputIsNotNull()
    {
        $this->createFormMocks();

        $view = $this->personViewFactory->create('Foo');

        $this->assertViewName( $view, 'portfolio::people.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\PersonViewFactory::create()
     * @covers \Ixudra\Portfolio\Services\Html\PersonViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testCreate_usesDefaultValuesIfInputIsNull()
    {
        $personInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\PersonInputHelper');
        $personInputHelperMock->shouldReceive('getDefaultInput')->once()->andReturn('Foo');
        App::instance('\Ixudra\Portfolio\Services\Input\PersonInputHelper', $personInputHelperMock);

        $this->createFormMocks();

        $view = $this->personViewFactory->create( null );

        $this->assertViewName( $view, 'portfolio::people.create' );
        $this->assertViewData( $view, 'input', 'Foo' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\PersonViewFactory::show()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testShow()
    {
        $person = new Person( array(  'first_name' => 'Foo' ) );

        $view = $this->personViewFactory->show($person);

        $this->assertViewName( $view, 'portfolio::people.show' );
        $this->assertViewData( $view, 'person', $person );
        $this->assertEquals( 'Foo', $view['person']->first_name );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\PersonViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\PersonViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesInputValuesIfInputIsNotNull()
    {
        $person = new Person( array( 'first_name' => 'Foo' ) );

        $this->createFormMocks();

        $view = $this->personViewFactory->edit($person, 'Bar');

        $this->assertViewName( $view, 'portfolio::people.edit' );
        $this->assertViewData( $view, 'person', $person );
        $this->assertViewData( $view, 'input', 'Bar' );
        $this->assertFormMocks( $view );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Html\PersonViewFactory::edit()
     * @covers \Ixudra\Portfolio\Services\Html\PersonViewFactory::prepareForm()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::addParameter()
     * @covers \Ixudra\Portfolio\Services\Html\BaseViewFactory::makeView()
     */
    public function testEdit_usesPersonValuesIfInputIsNull()
    {
        $personInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\PersonInputHelper');
        $personInputHelperMock->shouldReceive('getInputForModel')->once()->andReturn('Bar');
        App::instance('\Ixudra\Portfolio\Services\Input\PersonInputHelper', $personInputHelperMock);

        $person = new Person( array('first_name' => 'Bar') );

        $this->createFormMocks();

        $view = $this->personViewFactory->edit($person, null);

        $this->assertViewName( $view, 'portfolio::people.edit' );
        $this->assertViewData( $view, 'person', $person );
        $this->assertViewData( $view, 'input', 'Bar');
        $this->assertFormMocks( $view );
    }

    protected function createFilterMocks($input)
    {
        $searchInput = array( 'Fow' => 'Baw' );

        $personInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Services\Input\PersonInputHelper');
        $personInputHelperMock->shouldReceive('getInputForSearch')->once()->with($input)->andReturn($searchInput);
        App::instance('\Ixudra\Portfolio\Services\Input\PersonInputHelper', $personInputHelperMock);

        $person1 = new Person( array( 'first_name' => 'Foo' ) );
        $person2 = new Person( array( 'first_name' => 'Bar' ) );
        $people = new \Illuminate\Support\Collection( array( $person1, $person2 ) );

        $personInputHelperMock = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository');
        $personInputHelperMock->shouldReceive('search')->once()->with($searchInput, 25)->andReturn($people);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository', $personInputHelperMock);
    }

    protected function assertFilterMocks($view, $input)
    {
        $this->assertViewData( $view, 'input', $input );
        $this->assertViewDataSize( $view, 'people', 2 );
        $this->assertEquals( 'Foo', $view['people'][0]->first_name );
        $this->assertEquals( 'Bar', $view['people'][1]->first_name );
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