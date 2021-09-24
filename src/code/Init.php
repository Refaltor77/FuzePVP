<?php

namespace code;

use code\Commands\KitCommand;
use code\Events\PlayerListener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;

trait init
{
    private function initCore(){
        self::initEvents();
        self::initFolder();
        self::initCommands();
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

    private function initCommands(){
        Server::getInstance()->getCommandMap()->register("kit", new KitCommand("kit", "Achéte ton kit pour pvp ! "));
    }
}