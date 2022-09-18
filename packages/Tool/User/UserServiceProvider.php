<?php
namespace Tool\User;

use Illuminate\Support\ServiceProvider;


class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom( __DIR__ . '/routes/web.php');
        $this->loadViewsFrom( __DIR__ . '/resources/views', 'user');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            Domain\Models\Company\CompanyRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentCompanyRepository::class
        );

        $this->app->bind(
            Domain\Models\Icon\IconRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentIconRepository::class
        );

        $this->app->bind(
            Domain\Models\Password\PasswordRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentPasswordRepository::class
        );

        $this->app->bind(
            Domain\Models\Prefecture\PrefectureRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentPrefectureRepository::class
        );

        $this->app->bind(
            Domain\Models\Spot\SpotRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentSpotRepository::class
        );

        $this->app->bind(
            Domain\Models\SpotIconGenreComment\SpotIconGenreCommentRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentSpotIconGenreCommentRepository::class
        );

        $this->app->bind(
            Domain\Models\SpotIconStatus\SpotIconStatusRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentSpotIconStatusRepository::class
        );

        $this->app->bind(
            Domain\Models\SpotImage\SpotImageRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentSpotImageRepository::class
        );

        $this->app->bind(
            Domain\Models\SpotPrice\SpotPriceRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentSpotPriceRepository::class
        );

        $this->app->bind(
            Domain\Models\User\UserRepository::class,
            Infrastructure\Repositories\Domain\Eloquent\EloquentUserRepository::class
        );

        $this->app->bind(
            Domain\Models\Common\ResponseRepository::class,
            Infrastructure\Repositories\Domain\Logic\LogicResponseRepository::class
        );
    }
}
