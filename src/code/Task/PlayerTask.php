<?php

namespace code\Task;

use code\Manager\Scoreboard;
use jasonwynn10\ScoreboardAPI\ScoreboardAPI;
use onebone\economyapi\EconomyAPI;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Player;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class PlayerTask extends Task
{
    private $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function onRun(int $currentTick)
    {
        if(Server::getInstance()->getPlayerExact($this->player->getName())){
            Scoreboard::BaseScoreboard($this->player);
        }else{
            $this->getHandler()->cancel();
        }
    }
}