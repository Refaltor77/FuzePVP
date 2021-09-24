<?php

namespace code;

use pocketmine\plugin\PluginBase;

class FuzePVP extends PluginBase
{
    use Init;

    private static $instance;

    public function  onEnable(): void
    {
        $this->initCore();
    }

    public function onLoad(): void
    {
        self::$instance = $this;
    }

    public static function getInstance() : self
    {
        return self::$instance;
    }
}