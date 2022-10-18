<?php

namespace Tool\User\tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

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
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            //'--privileged',
            //'--disable-setuid-sandbox',
            '--headless',
            //'--no-sandbox',
            '--lang=ja_JP',
            '--enable-features=NetworkService,NetworkServiceInProcess',
            '--window-size=1600,4000',
        ]);

        /*
        return RemoteWebDriver::create(
                'http://localhost:9515', DesiredCapabilities::chrome()
        );
        return RemoteWebDriver::create(
                'http://localhost:4444', DesiredCapabilities::chrome()
        );
        return RemoteWebDriver::create(
            'http://selenium:4444/wd/hub', DesiredCapabilities::chrome()
        );
        */
        return RemoteWebDriver::create(
            'http://selenium:4444/wd/hub', DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }
}
