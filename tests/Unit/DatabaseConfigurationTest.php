<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class DatabaseConfigurationTest extends TestCase
{
    use RefreshDatabase;


    /**
     * Test the database connection by attempting to establish a connection using PDO.
     * This checks if the application can successfully connect to the database.
     *
     * @return void
     */
    public function testDatabaseConnection()
    {
        try {
            DB::connection()->getPdo();
            $this->assertTrue(true, 'Database connection established successfully.');
        } catch( \Exception $e ) {
            $this->fail('Could not establish a database connection: ' . $e->getMessage());
        }
    }

    /**
     * Test the database connection using the 'migrate:status' Artisan command.
     * This command checks the migration status, confirming that the database is reachable.
     *
     * @return void
     */
    public function testDatabaseConnectionViaArtisan()
    {
        $this->artisan('migrate:status')->assertExitCode(0);  // Exit code 0 means success.
    }


    /**
     * Test the database connection by running a simple query ('SELECT 1').
     * This ensures the application can execute queries and interact with the database.
     *
     * @return void
     */
    public function testDatabaseQuery()
    {
        try {
            $result = DB::select('SELECT 1');
            $this->assertNotEmpty($result, 'Database query executed successfully.');
        } catch( \Exception $e ) {
            $this->fail('Database query failed: ' . $e->getMessage());
        }
    }


}
