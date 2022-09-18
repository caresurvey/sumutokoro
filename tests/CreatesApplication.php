<?php

namespace Tests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Artisan;

trait CreatesApplication
{
    /**
     * @var bool
     */
    protected $isSetUpDatabase = false;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        Hash::setRounds(4);

        //$this->setUpDatabase();

        return $app;
    }

    /**
     * Run migration once
     */
    protected function setUpDatabase(): void
    {
        if ($this->isSetUpDatabase) {
            return;
        }

        //Artisan::call('migrate:fresh --seed');

        $this->isSetUpDatabase = true;
    }
}
