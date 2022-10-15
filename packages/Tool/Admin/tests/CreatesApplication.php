<?php

namespace Tool\Admin\tests;

use Illuminate\Contracts\Console\Kernel;

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

        return $app;
    }
}
