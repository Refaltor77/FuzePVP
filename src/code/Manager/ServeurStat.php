<?php

namespace code\Manager;

use code\FuzePVP;
use pocketmine\Server;
use pocketmine\utils\Config;

final class ServeurStat
{
    public static function getUniquePlayer(){
        $config = new Config(FuzePVP::getInstance()->getDataFolder() . "server.json", Config::JSON);
        return $config->get("total_joueur");
    }

    public static function addUniquePlayer(){
        $config = new Config(FuzePVP::getInstance()->getDataFolder() . "server.json", Config::JSON);
        $config->set("total_joueur", self::getUniquePlayer() + 1);
        $config->save();
    }

}