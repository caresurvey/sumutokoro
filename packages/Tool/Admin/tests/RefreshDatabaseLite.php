<?php

declare(strict_types=1);

namespace Tool\Admin\tests;


use App\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\RefreshDatabaseState;

trait RefreshDatabaseLite
{
    use RefreshDatabase;

    /**
     * トランザクションロールバック対象のDBコネクション
     * @see RefreshDatabase@connectionsToTransact
     */
    protected $connectionsToTransact = [
      'mysql',
      'testing',
    ];

    /**
     * Refresh a conventional test database.
     *
     * @return void
     */
    protected function refreshTestDatabase()
    {
        if (! RefreshDatabaseState::$migrated) {
            $this->artisan('migrate');

            $this->app[Kernel::class]->setArtisan(null);

            RefreshDatabaseState::$migrated = true;
        }

        $this->beginDatabaseTransaction();
    }
}
