<?php

#use Illuminate\Foundation\Testing\TestCase;
use Orchestra\Testbench\TestCase;

/**
 * Class TestCaseDB
 */
abstract class PackageTestCase extends TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
#    protected function getPackageProviders($app)
#    {
#        return [Timegridio\ICalReader\ICalReaderServiceProvider::class];
#    }

    /**
     * Setup the DB before each test.
     */
#    public function setUp()
#    {
#        parent::setUp();
#    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        #       $app['config']->set('database.default', 'testbench');
 #       $app['config']->set('database.connections.testbench', [
 #           'driver'   => 'sqlite',
 #           'database' => ':memory:',
 #           'prefix'   => '',
 #       ]);
    }

    /**
     * Rollback transactions after each test.
     */
    public function tearDown()
    {
        #        app('db')->rollback();
    }

    /**
     * Get application timezone.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return string|null
     */
    protected function getApplicationTimezone($app)
    {
        return 'UTC';
    }
}
