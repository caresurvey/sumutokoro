<?php
namespace Tool\General;

use Illuminate\Support\ServiceProvider;


class GeneralServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom( __DIR__ . '/routes/web.php');
        $this->loadViewsFrom( __DIR__ . '/resources/views', 'general');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            Domain\Models\City\CityRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentCityRepository::class
        );

        $this->app->bind(
            Domain\Models\Contact\ContactRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentContactRepository::class
        );

        $this->app->bind(
            Domain\Models\ForgetPassword\ForgetPasswordRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentForgetPasswordRepository::class
        );

        $this->app->bind(
            Domain\Models\Icon\IconRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentIconRepository::class
        );

        $this->app->bind(
            Domain\Models\Prefecture\PrefectureRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentPrefectureRepository::class
        );

        $this->app->bind(
            Domain\Models\News\NewsRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentNewsRepository::class
        );

        $this->app->bind(
            Domain\Models\ResetPassword\ResetPasswordRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentResetPasswordRepository::class
        );

        $this->app->bind(
            Domain\Models\Spot\SpotRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentSpotRepository::class
        );

        //$this->app->bind(
        //    Domain\Models\User\UserRepository::class,
        //    Infrastructure\Repositories\Domain\Eloquent\EloquentUserRepository::class
        //);

        $this->app->bind(
            Domain\Models\Register\RegisterRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentRegisterRepository::class
        );

        $this->app->bind(
            Domain\Models\Common\ResponseRepository::class,
            Infrastructure\Repositories\Domain\Logic\LogicResponseRepository::class
        );

        $this->app->bind(
            Domain\Models\Spot\SpotSearchRepository::class,
            Infrastructure\Search\SearchSpotSearchRepository::class
        );
        $this->app->bind(
            Domain\Models\Delivery\DeliveryRepository::class,
            Infrastructure\Mail\MailDeliveryRepository::class
        );
    }
}
