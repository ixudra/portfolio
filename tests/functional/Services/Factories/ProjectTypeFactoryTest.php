<?php


use App\Services\Factories\ProjectTypeFactory;
use App\Models\ProjectType;

class ProjectTypeFactoryTest extends BaseFunctionalTestCase {

    protected $projectTypeFactory;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('project_types');

        $this->projectTypeFactory = new ProjectTypeFactory();
    }


    /**
     * @covers \App\Services\Factories\ProjectTypeFactory::create()
     */
    public function testCreate()
    {
        $input = array(
            'name'                  => 'Foo',
        );

        $projectType = $this->projectTypeFactory->make( $input );

        $projectTypeRepository = App::make('\App\Repositories\Eloquent\EloquentProjectTypeRepository');
        $this->assertEquals( 1, $projectTypeRepository->all()->count() );
        $this->assertInstanceOf( '\App\Models\ProjectType', $projectType );
    }

    /**
     * @covers \App\Services\Factories\ProjectTypeFactory::modify()
     */
    public function testModify()
    {
        $projectType = new ProjectType(
            array(
                'name'                  => 'Foo',
            )
        );
        $projectType->save();

        $input = array(
            'name'                  => 'Bar',
        );

        $this->projectTypeFactory->modify( $projectType, $input );

        $projectTypeRepository = App::make('\App\Repositories\Eloquent\EloquentProjectTypeRepository');
        $this->assertEquals( 1, $projectTypeRepository->all()->count() );
        $this->assertEquals( 'Bar', $projectTypeRepository->all()->first()->name );
    }

}