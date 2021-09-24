<?php

namespace code\Manager;

use code\FuzePVP;
use jasonwynn10\ScoreboardAPI\ScoreboardAPI;
use jasonwynn10\ScoreboardAPI\ScoreboardEntry;
use onebone\economyapi\EconomyAPI;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
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