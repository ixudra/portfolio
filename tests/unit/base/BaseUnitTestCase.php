<?php


class BaseUnitTestCase extends Illuminate\Foundation\Testing\TestCase {

    public function setUp()
    {
        parent::setUp();

        App::setLocale('en');
    }

    public function createApplication()
    {
        $app = require __DIR__ .'/../../../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

}
