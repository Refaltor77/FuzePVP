<?php

namespace code\Events;

use code\FuzePVP;
use code\Manager\Kill;
use code\Manager\Scoreboard;
use code\Manager\ServeurStat;
use code\Task\PlayerTask;
use jasonwynn10\ScoreboardAPI\ScoreboardAPI;
use onebone\economyapi\EconomyAPI;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;

class PlayerListener implements Listener
{

    public function onKill(PlayerDeathEvent $event){
        $player = $event->getPlayer();
        $damager = $player->getLastDamageCause()->getEntity();

        if($damager instanceof Player){
            EconomyAPI::getInstance()->addMoney($damager, 500);
            Kill::addkill($player);
            $player->setXpLevel(Kill::getKill($damager));
        }
    }

    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();

        if(!$player->hasPlayedBefore()){
            $config = new Config(FuzePVP::getInstance()->getDataFolder() . "player/" . $player->getName() . ".json", Config::JSON);
            $config->set("kill", 0);
            $config->save();

            ServeurStat::addUniquePlayer();
            Server::getInstance()->broadcastMessage(" §f§l[§r§4F§f§l]§r §l§4>>§r§f Bienvenue, §e@" . $player->getName(). "§r§f Sur Fuze PVP  !, On est §b" . ServeurStat::getUniquePlayer() . " Joueur Unique");
        }

        Scoreboard::BaseScoreboard($player);
        FuzePVP::getInstance()->getScheduler()->scheduleRepeatingTask(new PlayerTask($player), 20);
    }

    public function onMessage(PlayerChatEvent $event){
        $player = $event->getPlayer();
        $message = $event->getMessage();

        $event->setCancelled();

        Server::getInstance()->broadcastMessage("§l§f[§r§e". Kill::getKill($player) ."§l§f][§r§7Novice§f§l]§r§7 " . $player->getName() . "§8:§7 " . $message);
    }
}