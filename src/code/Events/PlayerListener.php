<?php

namespace code\Events;

use code\FuzePVP;
use code\Manager\Kill;
use code\Manager\Scoreboard;
use code\Manager\ServeurStat;
use code\Task\PlayerTask;
use jasonwynn10\ScoreboardAPI\ScoreboardAPI;
use onebone\economyapi\EconomyAPI;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\event\server\DataPacketSendEvent;
use pocketmine\level\sound\AnvilBreakSound;
use pocketmine\level\sound\BlazeShootSound;
use pocketmine\network\mcpe\protocol\ContainerClosePacket;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class PlayerListener implements Listener
{

    private $cancel_send;
    private array $players = [];
    private array $combo = [];
    const COLOR =  [
        TextFormat::RED,
        TextFormat::BLUE,
        TextFormat::DARK_PURPLE,
        TextFormat::LIGHT_PURPLE,
        TextFormat::YELLOW,
        TextFormat::AQUA,
        TextFormat::YELLOW,
        TextFormat::YELLOW,
        TextFormat::AQUA,
        TextFormat::AQUA,
        TextFormat::RED,
        TextFormat::BLUE,
        TextFormat::DARK_PURPLE,
        TextFormat::LIGHT_PURPLE,
        TextFormat::YELLOW,
        TextFormat::YELLOW,
        TextFormat::YELLOW,
        TextFormat::AQUA,
        TextFormat::AQUA,TextFormat::AQUA,
        TextFormat::YELLOW,
        TextFormat::AQUA,
        TextFormat::AQUA
    ];

    public function onKill(PlayerDeathEvent $event){
        $player = $event->getPlayer();
        $damager = $player->getLastDamageCause()->getEntity();

        if($damager instanceof Player){
            EconomyAPI::getInstance()->addMoney($damager, 5);
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
        $player->addTitle("§k§c#§r§4§fFuze §4P§fvP§k§c#§r", "§7§nAbonne Toi !");
        Scoreboard::BaseScoreboard($player);
        //FuzePVP::getInstance()->getScheduler()->scheduleRepeatingTask(new PlayerTask($player), 20);
    }


    public function onBreak(BlockBreakEvent $event){
        $player = $event->getPlayer();

        if($player->isAdventure() || $player->isSurvival() || !$player->isOp()){
            $event->setCancelled();
        }
    }


    /**
     * @param DataPacketSendEvent $event
     * @priority NORMAL
     * @ignoreCancelled true
     */
    public function onDataPacketSend(DataPacketSendEvent $event) : void{
        if($this->cancel_send && $event->getPacket() instanceof ContainerClosePacket){
            $event->setCancelled();
        }
    }

    /**
     * @param DataPacketReceiveEvent $event
     * @priority NORMAL
     * @ignoreCancelled true
     */
    public function onDataPacketReceive(DataPacketReceiveEvent $event) : void{
        if($event->getPacket() instanceof ContainerClosePacket){
            $this->cancel_send = false;
            $event->getPlayer()->sendDataPacket($event->getPacket(), false, true);
            $this->cancel_send = true;
        }
    }

    public function onDamage(EntityDamageByEntityEvent $event): void {
        $victim = $event->getEntity();
        $damager = $event->getDamager();
        if ($victim instanceof Player && $damager instanceof Player) {
            if (isset($this->players[$damager->getXuid()])) {
                if ($this->players[$damager->getXuid()] < time()) {
                    EconomyAPI::getInstance()->addMoney($damager, 1);
                    $damager->sendTip('§a+ 1 ');
                    $this->players[$damager->getXuid()] = time() + 1;
                }
            } else {
                EconomyAPI::getInstance()->addMoney($damager, 1);
                $damager->sendTip('§a+ 1 ');
                $this->players[$damager->getXuid()] = time() + 1;
            }

            if (isset($this->combo[$damager->getXuid()])) {
                if ($this->combo[$damager->getXuid()][1] > time()) {
                    $combo = $this->combo[$damager->getXuid()][0];
                    $color = self::COLOR[array_rand()];
                    $damager->getLevel()->addSound(new BlazeShootSound(), [$damager]);
                    $damager->sendPopup($color . " X" . $combo);
                    $combo++;
                    $this->combo[$damager->getXuid()] = [$combo, time() + 2];
                } else {
                    $color = self::COLOR[array_rand()];
                    $damager->sendPopup($combo . "COMBO PERDU !");
                    $damager->getLevel()->addSound(new AnvilBreakSound(), [$damager]);
                    $this->combo[$damager->getXuid()] = [1, time() + 2];
                }
            } else {
                $color = self::COLOR[array_rand()];
                $damager->getLevel()->addSound(new BlazeShootSound(), [$damager]);
                $damager->sendPopup($combo . "COMBOOOOOOOO");
                $this->combo[$damager->getXuid()] = [1, time() + 2];
            }
        }
    }

}