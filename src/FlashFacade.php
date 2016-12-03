<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Flash;

use Illuminate\Support\Facades\Facade;

/**
 * Class FlashFacade
 * @see     FlashServiceProvider
 * @package Ruogu\Flash
 */
class FlashFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ruogu.flash';
    }
}
