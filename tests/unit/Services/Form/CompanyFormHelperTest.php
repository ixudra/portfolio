<?php


use Ixudra\Portfolio\Models\Company;

class CompanyFormHelperTest extends BaseUnitTestCase {

    const COMPANY_ID_1 = 15;

    const COMPANY_ID_2 = 17;


    /**
     * @covers \Ixudra\Portfolio\Services\Form\CompanyFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Portfolio\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetAllAsSelectList()
    {
        $this->setUpMocks();

        $result = App::make('\Ixudra\Portfolio\Services\Form\CompanyFormHelper')->getAllAsSelectList();

        $this->assertEquals(
            array(
                self::COMPANY_ID_1     => 'Foo',
                self::COMPANY_ID_2     => 'Bar'
            ), $result
        );
    }

    /**
     * @covers \Ixudra\Portfolio\Services\Form\CompanyFormHelper::getAllAsSelectList()
     * @covers \Ixudra\Portfolio\Services\Form\BaseFormHelper::convertToSelectList()
     */
    public function testGetAllAsSelectList_includesNullValueIfRequired()
    {
        $this->setUpMocks();

        $result = App::make('\Ixudra\Portfolio\Services\Form\CompanyFormHelper')->getAllAsSelectList(true);

        $this->assertEquals(
            array(
                0                                    => '',
                self::COMPANY_ID_1     => 'Foo',
                self::COMPANY_ID_2     => 'Bar'
            ), $result
        );
    }


    protected function setUpMocks()
    {
        $company1 = new Company();
        $company1->id = self::COMPANY_ID_1;
        $company1->name = 'Foo';

        $company2 = new Company();
        $company2->id = self::COMPANY_ID_2;
        $company2->name = 'Bar';

        $companies = new \Illuminate\Support\Collection( array( $company1, $company2 ) );

        $companyRepository = Mockery::mock('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository');
        $companyRepository->shouldReceive('all')->once()->andReturn($companies);
        App::instance('\Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository', $companyRepository);
    }

}