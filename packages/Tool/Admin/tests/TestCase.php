<?php

namespace Tool\Admin\tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    private static bool $isSetup = false;

    /**
     * 初期設定
     *
     */
    public function setUp(): void
    {
        if (!$this->app) {
            $this->refreshApplication();
        }

        // テストの最初だけマイグレーションを行う
        if (self::$isSetup === false) {
            $this->artisan('migrate:refresh');
            $this->artisan('db:seed');
            self::$isSetup = true;
        }
    }

}
