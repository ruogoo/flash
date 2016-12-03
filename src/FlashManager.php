<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Flash;

use Illuminate\Support\Facades\Session;

/**
 * Class FlashManager
 * A flash manager for web.
 * It support to flash a message with levels (info, success, warning, error).
 * Or only flash normal data.
 */
class FlashManager
{
    // ------------------ Setting Method ------------------ //

    public function data($data)
    {
        Session::flash(FlashKey::DATA, $data);
    }

    public function info($message)
    {
        $this->setMessage($message);
    }

    public function success($message)
    {
        $this->setMessage($message, FlashLevel::SUCCESS);
    }

    public function warning($message)
    {
        $this->setMessage($message, FlashLevel::WARNING);
    }

    public function error($message)
    {
        $this->setMessage($message, FlashLevel::ERROR);
    }

    // ------------------ Getting Method ------------------ //

    /**
     * Check if flash with level exist or not.
     *
     * @param null $level
     *
     * @return bool
     */
    public function exist($level = null)
    {
        if ($level) {
            return Session::get(FlashKey::LEVEL) === $level;
        }

        return Session::has(FlashKey::MESSAGE);
    }

    /**
     * Get the flash message with level.
     *
     * @param null $level
     *
     * @return mixed|null
     */
    public function message($level = null)
    {
        if ($level && Session::get(FlashKey::LEVEL) !== $level) {
            return;
        }

        return Session::get(FlashKey::MESSAGE);
    }

    public function level()
    {
        return Session::get(FlashKey::LEVEL);
    }

    // ------------------ Private Method ------------------ //
    private function setMessage($message, $level = 'info')
    {
        Session::flash(FlashKey::MESSAGE, $message);
        Session::flash(FlashKey::LEVEL, $level);
    }
}

class FlashKey
{
    const DATA = 'ruogu.notification.data';
    const LEVEL = 'ruogu.notification.level';
    const MESSAGE = 'ruogu.notification.message';
}

class FlashLevel
{
    const SUCCESS = 'success';
    const INFO = 'info';
    const WARNING = 'warning';
    const ERROR = 'error';
}
