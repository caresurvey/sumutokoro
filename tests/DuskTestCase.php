<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;
    private static $isSetup = false;

    /**
     * 初期設定
     *
     */
    public function setUp()
        {
        parent::setUp();

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
    
    protected function baseUrl()
    {
        return 'http://web';
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        //static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        // ノーオプションでOK
        $options = (new ChromeOptions)->addArguments([
            //'--disable-gpu',
            //'--privileged',
            //'--disable-setuid-sandbox',
            //'--headless',
            //'--no-sandbox',
            //'--lang=ja_JP',
            '--no-pings',
            //'--enable-features=NetworkService,NetworkServiceInProcess',
            //'--window-size=1600,4000',
        ]);

        return RemoteWebDriver::create(
            'http://selenium:4444/wd/hub', DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }

}
