<?php

namespace code;

use code\Lib\muqsit\invmenu\InvMenuHandler;
use code\Task\ScoreboardTask;
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
        $this->getScheduler()->scheduleRepeatingTask(new ScoreboardTask(), 40);
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