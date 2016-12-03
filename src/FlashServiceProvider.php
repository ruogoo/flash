<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Flash;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->bind('ruogu.flash', function () {
            return new FlashManager();
        });
    }

    public function provides()
    {
        return ['ruogu.flash'];
    }
}
