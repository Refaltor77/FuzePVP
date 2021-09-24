<?php

namespace code;

use code\Lib\muqsit\invmenu\InvMenuHandler;
use pocketmine\plugin\PluginBase;

class FuzePVP extends PluginBase
{
    use Init;

    private static $instance;

    public function  onEnable(): void
    {
        if(!InvMenuHandler::isRegistered()){
            InvMenuHandler::register($this);
        }
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