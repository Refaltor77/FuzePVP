<?php

namespace code\Manager;

use code\FuzePVP;
use pocketmine\Player;
use pocketmine\utils\Config;

final class Kill
{
    public static function getKill(Player $player){
        $config = new Config(FuzePVP::getInstance()->getDataFolder() . "player/" . $player->getName() . ".json", Config::JSON);
        return $config->get("kill");
    }

    public static function addkill(Player $player){
        $config = new Config(FuzePVP::getInstance()->getDataFolder() . "player/" . $player->getName() . ".json", Config::JSON);
        $config->set("kill", self::getKill($player) + 1);
        $config->save();
    }
}