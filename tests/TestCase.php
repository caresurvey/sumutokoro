<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Application;

abstract class TestCase extends BaseTestCase
{
  use CreatesApplication;
  private static $isSetup = false;

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
