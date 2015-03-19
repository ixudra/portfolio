<?php


class CustomerInputHelperTest extends BaseUnitTestCase {

    protected $customerInputHelper;


    public function setUp()
    {
        parent::setUp();

        $this->customerInputHelper = App::make('\Ixudra\Portfolio\Services\Input\CustomerInputHelper');
    }


    /**
     * @covers \Ixudra\Portfolio\Services\Input\CustomerInputHelper::getInputForSearch()
     */
    public function testGetInputForSearch()
    {
        $input = array(
            '_token'        => 'Foo_token',
            'name'          => '',
        );

        $result = $this->customerInputHelper->getInputForSearch( $input );

        $this->assertEquals(
            array(
            'name'          => '',
            ), $result
        );
    }

}