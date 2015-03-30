<?php


use Ixudra\Portfolio\Models\Person;

class PersonFormHelperTest extends BaseUnitTestCase {

    const PERSON_ID_1 = 15;

    const PERSON_ID_2 = 17;


    /**
     * @covers \Ixudra\Portfolio\Services\Form\PersonFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Portfolio\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetAllAsSelectList()
    {
        $this->setUpMocks();

        $result = App::make('\Ixudra\Portfolio\Services\Form\PersonFormHelper')->getAllAsSelectList();

        $this->assertEquals(
            array(
                self::PERSON_ID_1     => 'Foo',
                self::PERSON_ID_2     => 'Bar'
            ), $result
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Form\PersonFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Portfolio\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetAllAsSelectList_includesNullValueIfRequired()
    {
        $this->setUpMocks();

        $result = App::make('\Ixudra\Portfolio\Services\Form\PersonFormHelper')->getAllAsSelectList(true);

        $this->assertEquals(
            array(
                0                                    => '',
                self::PERSON_ID_1     => 'Foo Bar',
                self::PERSON_ID_2     => 'Foz Baz'
            ), $result
        );
    }


    protected function setUpMocks()
    {
        $person1 = new Person();
        $person1->id = self::PERSON_ID_1;
        $person1->first_name = 'Foo';
        $person1->last_name = 'Bar';

        $person2 = new Person();
        $person2->id = self::PERSON_ID_2;
        $person2->first_name = 'Foz';
        $person2->last_name = 'Baz';

        $people = new \Illuminate\Support\Collection( array( $person1, $person2 ) );

        $personRepository = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository');
        $personRepository->shouldReceive('all')->once()->andReturn($people);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentPersonRepository', $personRepository);
    }

}