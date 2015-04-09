<?php


class CompanyInputHelperTest extends BaseUnitTestCase {

    protected $companyInputHelper;


    public function setUp()
    {
        parent::setUp();

        $this->companyInputHelper = App::make('\Ixudra\Portfolio\Services\Input\CompanyInputHelper');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Input\CompanyInputHelper::getInputForSearch()
     */
    public function testGetInputForSearch()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'name'          => '',
        );

        $result = $this->companyInputHelper->getInputForSearch( $input );

        $this->assertEquals(
            array(
            'name'          => '',
            ), $result
        );
    }

}