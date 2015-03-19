<?php


class BaseViewFactoryTestCase extends BaseUnitTestCase {

    protected function assertViewName($view, $expected)
    {
        $this->assertEquals( $expected, $view->getName() );
    }

    protected function assertViewData($view, $primary, $expected)
    {
        $this->assertEquals( $expected, $view->getData()[$primary] );
    }

    protected function assertViewArrayData($view, $primary, $secondary, $expected)
    {
        $this->assertTrue( isset( $view->getData()[$primary][$secondary]) );
        $this->assertEquals( $expected, $view->getData()[$primary][$secondary] );
    }

    protected function assertViewCount($view, $primary, $expected)
    {
        $this->assertCount( $expected, $view->getData()[$primary] );
    }

    protected function assertViewNotNull($view, $primary)
    {
        $this->assertNotNull( $view->getData()[$primary] );
    }

    protected function assertViewInstanceOf($view, $primary, $instance)
    {
        $this->assertInstanceOf( $instance, $view->getData()[$primary] );
    }

    protected function assertViewDataSize($view, $primary, $size)
    {
        $this->assertEquals( $size, sizeof($view->getData()[$primary]) );
    }

}
