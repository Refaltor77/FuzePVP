<?php

namespace code;

use code\Events\PlayerListener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;

trait init
{
    private function initCore(){
        self::initEvents();
        self::initFolder();
    }

    private function initEvents(){
        FuzePVP::getInstance()->getServer()->getPluginManager()->registerEvents(new PlayerListener(), FuzePVP::getInstance());
    }

    private function initFolder(){
        @mkdir(FuzePVP::getInstance()->getDataFolder() . "player");
        $config = new Config(FuzePVP::getInstance()->getDataFolder() . "server.json", Config::JSON);
        $config->set("total_joueur", $config->get("total_joueur") + 0);
        $config->save();
    }
}