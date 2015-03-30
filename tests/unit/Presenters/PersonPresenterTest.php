<?php


use Ixudra\Portfolio\Models\Person;

class PersonPresenterTest extends BaseUnitTestCase {

    /**
     * @covers \Ixudra\Portfolio\Presenters\PersonPresenter::fullName()
     */
    public function testFullName()
    {
        $user = new Person(
            array(
                'first_name'    => 'John',
                'last_name'     => 'Doe'
            )
        );

        $this->assertEquals( 'John Doe', $user->present()->fullName() );
    }

}