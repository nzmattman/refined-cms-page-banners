<?php

namespace RefinedDigital\PageBanners\Module\Providers;

use Illuminate\Support\ServiceProvider;
use RefinedDigital\CMS\Modules\Pages\Aggregates\PageAggregate;

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

        $fields = [
            [ 'name' => 'Image', 'page_content_type_id' => 4, 'field' => 'image', 'hide_label' => true ]
        ];

        if (config('page-banners.extra_fields')) {
            $fields = array_merge($fields, config('page-banners.extra_fields'));
        }

        app(PageAggregate::class)
            ->addModule('Banners', [
                'tab' => 'banners',
                'type' => 'repeatable',
                'config' => 'page-banners',
                'fields' => $fields
            ]);
    }
}
