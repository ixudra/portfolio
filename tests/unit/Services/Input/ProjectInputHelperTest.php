<?php


class ProjectInputHelperTest extends BaseUnitTestCase {

    protected $projectInputHelper;


    public function setUp()
    {
        parent::setUp();

        $this->projectInputHelper = App::make('\Ixudra\Portfolio\Services\Input\ProjectInputHelper');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Input\ProjectInputHelper::getInputForSearch()
     */
    public function testGetInputForSearch()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'name'          => '',
        );

        $result = $this->projectInputHelper->getInputForSearch( $input );

        $this->assertEquals(
            array(
            'name'          => '',
            ), $result
        );
    }

}