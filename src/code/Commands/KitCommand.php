<?php

namespace code\Commands;

use code\Lib\muqsit\invmenu\InvMenu;
use code\Lib\muqsit\invmenu\transaction\InvMenuTransaction;
use code\Lib\muqsit\invmenu\transaction\InvMenuTransactionResult;
use code\Manager\Kit;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\item\ItemBlock;
use pocketmine\item\ItemIds;
use pocketmine\Player;

class KitCommand extends Command
{
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player) return false;

        $menu = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);
        $inventory = $menu->getInventory();

        $kitNovice = Item::get(ItemIds::STONE_SWORD);
        $kitNovice->setCustomName("§r§n§4K§fit §2Novice: §l§aFREE");
        $kitNovice->setLore([
        " ",
        "§r§7- Casque en cuire",
        "§r§7- Plastron en cuire",
        "§r§7- Jambière en cuire",
        "§r§7- Bottes en cuire",
        "§r§7- Epée en pierre",
        ]);

        $kitAmateur = Item::get(ItemIds::GOLD_SWORD);
        $kitAmateur->setCustomName("§r§n§4K§fit §6Amateur: §e50");
        $kitAmateur->setLore([
            " ",
            "§r§7- Casque en or",
            "§r§7- Plastron en or",
            "§r§7- Jambière en or",
            "§r§7- Bottes en or",
            "§r§7- Epée en or",
        ]);

        $kitExperimenter = Item::get(ItemIds::IRON_SWORD);
        $kitExperimenter->setCustomName("§r§n§4K§fit §8Experimenter: §e500");
        $kitExperimenter->setLore([
            " ",
            "§r§7- Casque en fer",
            "§r§7- Plastron en fer",
            "§r§7- Jambière en fer",
            "§r§7- Bottes en fer",
            "§r§7- Epée en fer",
        ]);

        $kitTryhard = Item::get(ItemIds::DIAMOND_SWORD);
        $kitTryhard->setCustomName("§r§n§4K§fit §bTryhard: §e1000");
        $kitTryhard->setLore([
            " ",
            "§r§7- Casque en diamant",
            "§r§7- Plastron en diamant",
            "§r§7- Jambière en diamant",
            "§r§7- Bottes en diamant",
            "§r§7- Epée en diamant",
        ]);

        $kitEnchant = Item::get(ItemIds::ENCHANTED_BOOK);
        $kitEnchant->setCustomName("§r§n§4K§fit §5E§dn§5c§dh§5a§dn§5t§d: §e750");
        $kitEnchant->setLore([
            " ",
            "§r§7- Enchant Protection 4",
            "§r§7- Enchant Durabilté 3",
            "§r§7- Enchant tranchant 5",
        ]);

        $kitFuze = Item::get(ItemIds::SKULL, 3);
        $kitFuze->setCustomName("§r§n§4K§fit §4F§fuze: §e2000");
        $kitFuze->setLore([
            " ",
            "§r§7- Casque de Fuze",
            "§r§7- Plastron de Fuze",
            "§r§7- Jambière de Fuze",
            "§r§7- Bottes de Fuze",
            "§r§7- Epée de Fuze",
        ]);

        $kitDidier = Item::get(ItemIds::SKULL, 4);
        $kitDidier->setCustomName("§r§n§4K§fit §5Didier: §e5000");
        $kitDidier->setLore([
            " ",
            "§r§7- Casque de Didier",
            "§r§7- Plastron de Didier",
            "§r§7- Jambière de Didier",
            "§r§7- Bottes de Didier",
            "§r§7- Epée de Didier",
        ]);

        $kitTnt = Item::get(ItemBlock::TNT);
        $kitTnt->setCustomName("§r§n§4K§fit §cT§fN§cT§f: §e7000");
        $kitTnt->setLore([
            " ",
            "§r§7- Casque en TNT",
            "§r§7- Plastron en TNT",
            "§r§7- Jambière en TNT",
            "§r§7- Bottes en TNT",
            "§r§7- Epée en TNT",
        ]);

        $ironBars = Item::get(ItemBlock::IRON_BARS)->setCustomName(" ");
        $leave = Item::get(ItemIds::REDSTONE_DUST)->setCustomName("§cClose");

        for ($test = 0; $test <= 8; $test++){
            $inventory->setItem($test, $ironBars);
        }
        $inventory->setItem(9, $ironBars);
        $inventory->setItem(10, $kitNovice);
        $inventory->setItem(12, $kitAmateur);
        $inventory->setItem(14, $kitExperimenter);
        $inventory->setItem(16, $kitTryhard);
        $inventory->setItem(17, $ironBars);
        $inventory->setItem(18, $ironBars);
        $inventory->setItem(26, $ironBars);
        $inventory->setItem(27, $ironBars);
        $inventory->setItem(35, $ironBars);
        $inventory->setItem(36, $ironBars);
        $inventory->setItem(44, $ironBars);
        $inventory->setItem(28, $kitEnchant);
        $inventory->setItem(30, $kitFuze);
        $inventory->setItem(32, $kitDidier);
        $inventory->setItem(34, $kitTnt);
        $inventory->setItem(40, $leave);
        for ($test = 45; $test <= 53; $test++){
            $inventory->setItem($test, $ironBars);
        }
        $menu->setListener(function (InvMenuTransaction $transaction) : InvMenuTransactionResult{
            $player = $transaction->getPlayer();
            switch ($transaction->getAction()->getSlot()){
                case 10:
                    kit::giveNovicekit($player);
                    $player->removeWindow($transaction->getAction()->getInventory());
                    break;
                case 12:
                    kit::giveAmateurkit($player);
                    $player->removeWindow($transaction->getAction()->getInventory());
                    break;
                case 14:
                    kit::giveExperimenterkit($player);
                    $player->removeWindow($transaction->getAction()->getInventory());
                    break;
                case 16:
                    kit::giveTryhardKit($player);
                    $player->removeWindow($transaction->getAction()->getInventory());
                    break;
                case 28:
                    kit::giveEnchantKit($player);
                    $player->removeWindow($transaction->getAction()->getInventory());
                    break;
                case 30:
                    kit::giveFuzeKit($player);
                    $player->removeWindow($transaction->getAction()->getInventory());
                    break;
                case 32:
                    kit::giveDidierKit($player);
                    $player->removeWindow($transaction->getAction()->getInventory());
                    break;
                case 34:
                    kit::giveTntKit($player);
                    $player->removeWindow($transaction->getAction()->getInventory());
                    break;
                case 40:
                    $player->removeWindow($transaction->getAction()->getInventory());
                    break;
            }
            return $transaction->discard();
        });
        $menu->setName("§r§n§4K§fit");
        $menu->send($sender);

        return true;
    }
}