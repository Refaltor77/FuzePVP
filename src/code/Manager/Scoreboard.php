<?php

namespace code\Manager;

use jasonwynn10\ScoreboardAPI\ScoreboardAPI;
use jasonwynn10\ScoreboardAPI\ScoreboardEntry;
use onebone\economyapi\EconomyAPI;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

final class Scoreboard
{
    /**
     * @param Player $player
     */
    public static function BaseScoreboard(Player $player)
    {

        $scoreboard = ScoreboardAPI::getInstance()->createScoreboard("serveur", "§n§4F§fuze PVP");
        ScoreboardAPI::getInstance()->sendScoreboard($scoreboard, [$player]);


        $entry1 = $scoreboard->createEntry(1, 1, ScoreboardEntry::TYPE_FAKE_PLAYER, "+§2-§a-§b-§3-§1-§9-§d-§5-§4-§c-§6-§e-+");
        $entry2 = $scoreboard->createEntry(2, 2, ScoreboardEntry::TYPE_FAKE_PLAYER, "§c>> §4Pseudo: §f" . $player->getName());
        $entry3 = $scoreboard->createEntry(3, 3, ScoreboardEntry::TYPE_FAKE_PLAYER, "§c>> §4Grade: §fUndefined");
        $entry4 = $scoreboard->createEntry(4, 4, ScoreboardEntry::TYPE_FAKE_PLAYER, "§c>> §4Ping: §f" . $player->getPing());
        $entry5 = $scoreboard->createEntry(5, 5, ScoreboardEntry::TYPE_FAKE_PLAYER, " ");
        $entry6 = $scoreboard->createEntry(6, 6, ScoreboardEntry::TYPE_FAKE_PLAYER, "§c>> §4Argent: §f" . EconomyAPI::getInstance()->myMoney($player) . " ");
        $entry7 = $scoreboard->createEntry(7, 7, ScoreboardEntry::TYPE_FAKE_PLAYER, "§c>> §4Kill: §e20 ");
        $entry8 = $scoreboard->createEntry(8, 8, ScoreboardEntry::TYPE_FAKE_PLAYER, "  ");
        $entry9 = $scoreboard->createEntry(9, 9, ScoreboardEntry::TYPE_FAKE_PLAYER, "§c>> §4Mode: §fKit PVP ");
        $entry10 = $scoreboard->createEntry(10, 10, ScoreboardEntry::TYPE_FAKE_PLAYER, "§c>> §4Online: §f" . count(Server::getInstance()->getOnlinePlayers()) . " ");
        $entry11 = $scoreboard->createEntry(11, 11, ScoreboardEntry::TYPE_FAKE_PLAYER, "+§e-§6-§c-§4-§5-§d-§9-§1-§3-§b-§a-§2-+");

        $entrys = [$entry1, $entry2, $entry3, $entry4, $entry5, $entry6, $entry7, $entry8, $entry9, $entry10, $entry11];
        foreach ($entrys as $entry) {
            $scoreboard->addEntry($entry, [$player]);
            $scoreboard->updateEntry($entry, [$player]);
        }
    }
}