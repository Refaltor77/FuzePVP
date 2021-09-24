<?php

namespace code\Task;

use code\Manager\Scoreboard;
use pocketmine\scheduler\Task;
use pocketmine\Server;

class ScoreboardTask extends Task
{
    public function onRun(int $currentTick)
    {
        foreach (Server::getInstance()->getOnlinePlayers() as $player) {
            Scoreboard::BaseScoreboard($player);
        }
    }
}