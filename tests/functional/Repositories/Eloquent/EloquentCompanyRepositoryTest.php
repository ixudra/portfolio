<?php


use Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository;
use Ixudra\Portfolio\Models\Company;

class EloquentCompanyRepositoryTest extends BaseRepositoryTestCase {

    protected $companyRepository;


    public function setUp()
    {
        parent::setUp();

        $this->truncateTables('companies');

        $this->companyRepository = new EloquentCompanyRepository();
    }


    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository::all()
     */
    public function testAll()
    {
        $company1 = Company::create( array( 'name' => 'Company 1' ) );
        $company2 = Company::create( array( 'name' => 'Company 2' ) );
        $company3 = Company::create( array( 'name' => 'Company 3' ) );
        $company4 = Company::create( array( 'name' => 'Company 4' ) );
        $company5 = Company::create( array( 'name' => 'Company 5' ) );

        $companies = $this->companyRepository->all();

        $this->assertCount(5, $companies);
        $this->assertContainsOnlyInstancesOf('\Ixudra\Portfolio\Models\Company', $companies);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository::find()
     */
    public function testFind()
    {
        $company = Company::create( array( 'name' => 'Company 1' ) );

        $result = $this->companyRepository->find($company->id);

        $this->assertInstanceOf('\Ixudra\Portfolio\Models\Company', $result);
        $this->assertEquals('Company 1', $result->name);
    }

    /**
     * @covers EloquentCompanyRepository::find()
     */
    public function testFind_returnsNullIfCompanyDoesNotExist()
    {
        $result = $this->companyRepository->find(100);

        $this->assertNull($result);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository::findByFilter()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter()
    {
        $company1 = Company::create( array( 'name' => 'Company 1' ) );
        $company2 = Company::create( array( 'name' => 'Company 2' ) );
        $company3 = Company::create( array( 'name' => 'Company 3' ) );
        $company4 = Company::create( array( 'name' => 'Company 4' ) );
        $company5 = Company::create( array( 'name' => 'Company 5' ) );

        $filter = array( 'name' => 'Company 2' );

        $companies = $this->companyRepository->findByFilter($filter);

        $this->assertCount(1, $companies);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Company', $companies);
        $this->assertCollectionContains( array($company2), $companies );
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository::findByFilter()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::preProcessFilters()
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\BaseRepository::applyFilters()
     */
    public function testFindByFilter_returnsEmptyArrayIfNoCompaniesMatchFilter()
    {
        $company1 = Company::create( array( 'name' => 'Company 1' ) );
        $company2 = Company::create( array( 'name' => 'Company 2' ) );

        $filter = array( 'name' => 'Company 3' );

        $companies = $this->companyRepository->findByFilter($filter);

        $this->assertCount(0, $companies);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository::search()
     */
    public function testSearch()
    {
        $company1 = Person::create( array( 'name' => 'Foo_first_name', 'email' => 'foz@bar.com', 'url' => 'http://bar.com' ) );
        $company2 = Person::create( array( 'name' => 'Bar_first_name', 'email' => 'baz@bar.com', 'url' => 'http://foo.com' ) );
        $company3 = Person::create( array( 'name' => 'Foz_first_name', 'email' => 'fow@bar.com', 'url' => 'http://baz.com' ) );
        $company4 = Person::create( array( 'name' => 'Baz_first_name', 'email' => 'baw@bar.com', 'url' => 'http://fow.com' ) );
        $company5 = Person::create( array( 'name' => 'Fow_first_name', 'email' => 'foz@foo.com', 'url' => 'http://fow.com' ) );

        $filters = array(
            'query'             => 'Foo'
        );

        $paginator = $this->companyRepository->search($filters, 50, true);
        $companies = $paginator->getCollection();

        $this->assertCount(5, $companies);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Company', $companies);
        $this->assertCollectionContains( array($company1, $company2, $company5), $companies );
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository::search()
     */
    public function testSearch_returnsAllResultsIfNoFiltersProvided()
    {
        $company1 = Company::create( array( 'name' => 'Foo_Company 1' ) );
        $company2 = Company::create( array( 'name' => 'Bar_Company 2' ) );
        $company3 = Company::create( array( 'name' => 'Bar_Company 3' ) );
        $company4 = Company::create( array( 'name' => 'Foo_Company 4' ) );
        $company5 = Company::create( array( 'name' => 'Foz_Company 5' ) );

        $filters = array();

        $paginator = $this->companyRepository->search($filters, 50, true);
        $companies = $paginator->getCollection();

        $this->assertCount(5, $companies);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Company', $companies);
    }

    /**
     * @covers \Ixudra\Portfolio\Repositories\Eloquent\EloquentCompanyRepository::search()
     */
    public function testSearch_usesPagination()
    {
        $company1 = Company::create( array( 'name' => 'Foo_Company 1' ) );
        $company2 = Company::create( array( 'name' => 'Bar_Company 2' ) );
        $company3 = Company::create( array( 'name' => 'Bar_Company 3' ) );
        $company4 = Company::create( array( 'name' => 'Foo_Company 4' ) );
        $company5 = Company::create( array( 'name' => 'Foz_Company 5' ) );

        $filters = array();

        $paginator = $this->companyRepository->search($filters, 2, true);
        $companies = $paginator->getCollection();

        $this->assertCount(2, $companies);
        $this->assertCollectionWithOnlyInstancesOf('\Ixudra\Portfolio\Models\Company', $companies);
    }

}
