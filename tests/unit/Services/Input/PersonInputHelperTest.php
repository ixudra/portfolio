<?php


class PersonInputHelperTest extends BaseUnitTestCase {

    protected $personInputHelper;


    public function setUp()
    {
        parent::setUp();

        $this->personInputHelper = App::make('\Ixudra\Portfolio\Services\Input\PersonInputHelper');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Input\PersonInputHelper::getInputForSearch()
     */
    public function testGetInputForSearch()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'query'         => '',
        );

        $result = $this->personInputHelper->getInputForSearch( $input );

        $this->assertEquals(
            array(
            'query'         => '',
            ), $result
        );
    }

}