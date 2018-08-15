<?php

namespace RefinedDigital\PageBanners\Module\Providers;

use Illuminate\Support\ServiceProvider;
use RefinedDigital\CMS\Modules\Core\Models\PageAggregate;

class PageBannerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../../config/page-banners.php' => config_path('page-banners.php'),
        ], 'page-banners');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(__DIR__.'/../../../config/page-banners.php', 'page-banners');

        app(PageAggregate::class)
            ->addModule('Banners', [
                'tab' => 'banners',
                'type' => 'repeatable',
                'config' => 'page-banners',
                'fields' => [
                    [ 'name' => 'Image', 'page_content_type_id' => 4, 'field' => 'image' ]
                ]
            ]);
    }
}
