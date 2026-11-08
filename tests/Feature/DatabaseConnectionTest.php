<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseConnectionTest extends TestCase
{
    public function test_testing_database_uses_sqlite(): void
    {
        $driver = DB::connection()->getDriverName();

        $this->assertSame('sqlite', $driver);
    }
}
