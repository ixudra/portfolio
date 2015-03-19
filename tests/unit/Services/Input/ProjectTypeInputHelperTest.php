<?php


class ProjectTypeInputHelperTest extends BaseUnitTestCase {

    protected $projectTypeInputHelper;


    public function setUp()
    {
        parent::setUp();

        $this->projectTypeInputHelper = App::make('\Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Input\ProjectTypeInputHelper::getInputForSearch()
     */
    public function testGetInputForSearch()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'name'          => '',
        );

        $result = $this->projectTypeInputHelper->getInputForSearch( $input );

        $this->assertEquals(
            array(
            'name'          => '',
            ), $result
        );
    }

}