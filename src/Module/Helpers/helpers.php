<?php

use \RefinedDigital\PageBanners\Module\Http\Repositories\PageBannerRepository;

if (! function_exists('pageBanners')) {
    function pageBanners()
    {
        return app(PageBannerRepository::class);
    }
}
