<?php

namespace code\Manager;

use onebone\economyapi\EconomyAPI;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Item;
use pocketmine\item\ItemIds;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\Player;

final class Kit
{
    public static function giveNovicekit(Player $player){

        $helmet = Item::get(ItemIds::LEATHER_HELMET);
        $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
        $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

        $chestplate = Item::get(ItemIds::LEATHER_CHESTPLATE);
        $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
        $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

        $leggings = Item::get(ItemIds::LEATHER_LEGGINGS);
        $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
        $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

        $boots = Item::get(ItemIds::LEATHER_BOOTS);
        $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
        $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

        $sword = Item::get(ItemIds::STONE_SWORD);
        $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::SHARPNESS), 2));
        $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

        $player->getInventory()->clearAll();
        $player->getArmorInventory()->clearAll();

        $player->getInventory()->setItem(4, $sword);
        $player->getArmorInventory()->setHelmet($helmet);
        $player->getArmorInventory()->setChestplate($chestplate);
        $player->getArmorInventory()->setLeggings($leggings);
        $player->getArmorInventory()->setBoots($boots);

        $sound =  new LevelSoundEventPacket();
        $sound->sound = LevelSoundEventPacket::SOUND_RANDOM_ANVIL_USE;
        $sound->position = $player;
        $player->sendDataPacket($sound);
    }

    public static function giveAmateurkit(Player $player){

        if(EconomyAPI::getInstance()->myMoney($player) >= 50) {

            EconomyAPI::getInstance()->reduceMoney($player, 50);

            $helmet = Item::get(ItemIds::GOLDEN_HELMET);
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $chestplate = Item::get(ItemIds::GOLDEN_CHESTPLATE);
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $leggings = Item::get(ItemIds::GOLDEN_LEGGINGS);
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $boots = Item::get(ItemIds::GOLDEN_BOOTS);
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $sword = Item::get(ItemIds::GOLD_SWORD);
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::SHARPNESS), 2));
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $player->getInventory()->clearAll();
            $player->getArmorInventory()->clearAll();

            $player->getInventory()->setItem(4, $sword);
            $player->getArmorInventory()->setHelmet($helmet);
            $player->getArmorInventory()->setChestplate($chestplate);
            $player->getArmorInventory()->setLeggings($leggings);
            $player->getArmorInventory()->setBoots($boots);

            $sound = new LevelSoundEventPacket();
            $sound->sound = LevelSoundEventPacket::SOUND_RANDOM_ANVIL_USE;
            $sound->position = $player;
            $player->sendDataPacket($sound);
        }else {$player->sendMessage("§f§l[§r§4F§f§l]§r §l§4>>§r§f Il te manque " . (50 - EconomyAPI::getInstance()->myMoney($player)) . "");}

    }

    public static function giveExperimenterkit(Player $player){

        if(EconomyAPI::getInstance()->myMoney($player) >= 500) {

            EconomyAPI::getInstance()->reduceMoney($player, 500);

            $helmet = Item::get(ItemIds::IRON_HELMET);
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $chestplate = Item::get(ItemIds::IRON_CHESTPLATE);
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $leggings = Item::get(ItemIds::IRON_LEGGINGS);
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $boots = Item::get(ItemIds::IRON_BOOTS);
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $sword = Item::get(ItemIds::IRON_SWORD);
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::SHARPNESS), 2));
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $player->getInventory()->clearAll();

            $player->getInventory()->setItem(4, $sword);
            $player->getArmorInventory()->setHelmet($helmet);
            $player->getArmorInventory()->setChestplate($chestplate);
            $player->getArmorInventory()->setLeggings($leggings);
            $player->getArmorInventory()->setBoots($boots);

            $sound = new LevelSoundEventPacket();
            $sound->sound = LevelSoundEventPacket::SOUND_RANDOM_ANVIL_USE;
            $sound->position = $player;
            $player->sendDataPacket($sound);
        }else {$player->sendMessage("§f§l[§r§4F§f§l]§r §l§4>>§r§f Il te manque " . (500 - EconomyAPI::getInstance()->myMoney($player)) . "");}
    }

    public static function giveTryhardKit(Player $player){

        if(EconomyAPI::getInstance()->myMoney($player) >= 1000) {

            EconomyAPI::getInstance()->reduceMoney($player, 1000);

            $helmet = Item::get(ItemIds::DIAMOND_HELMET);
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $chestplate = Item::get(ItemIds::DIAMOND_CHESTPLATE);
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $leggings = Item::get(ItemIds::DIAMOND_LEGGINGS);
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $boots = Item::get(ItemIds::DIAMOND_BOOTS);
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $sword = Item::get(ItemIds::DIAMOND_SWORD);
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::SHARPNESS), 2));
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $player->getInventory()->clearAll();
            $player->getArmorInventory()->clearAll();

            $player->getInventory()->setItem(4, $sword);
            $player->getArmorInventory()->setHelmet($helmet);
            $player->getArmorInventory()->setChestplate($chestplate);
            $player->getArmorInventory()->setLeggings($leggings);
            $player->getArmorInventory()->setBoots($boots);

            $sound = new LevelSoundEventPacket();
            $sound->sound = LevelSoundEventPacket::SOUND_RANDOM_ANVIL_USE;
            $sound->position = $player;
            $player->sendDataPacket($sound);
        }else {$player->sendMessage("§f§l[§r§4F§f§l]§r §l§4>>§r§f Il te manque " . (1000 - EconomyAPI::getInstance()->myMoney($player)) . "");}
    }

    public static function giveEnchantKit(Player $player){

        if(EconomyAPI::getInstance()->myMoney($player) >= 750) {

            EconomyAPI::getInstance()->reduceMoney($player, 750);

            $helmet = $player->getArmorInventory()->getHelmet();
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 4));
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $chestplate = $player->getArmorInventory()->getChestplate();
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 4));
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $leggings = $player->getArmorInventory()->getLeggings();
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 4));
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $boots = $player->getArmorInventory()->getBoots();
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 4));
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $sword = $player->getInventory()->getItem(4);
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::SHARPNESS), 5));
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $player->getInventory()->clearAll();
            $player->getArmorInventory()->clearAll();

            $player->getInventory()->setItem(4, $sword);
            $player->getArmorInventory()->setHelmet($helmet);
            $player->getArmorInventory()->setChestplate($chestplate);
            $player->getArmorInventory()->setLeggings($leggings);
            $player->getArmorInventory()->setBoots($boots);

            $sound = new LevelSoundEventPacket();
            $sound->sound = LevelSoundEventPacket::SOUND_RANDOM_ANVIL_USE;
            $sound->position = $player;
            $player->sendDataPacket($sound);
        }else {$player->sendMessage("§f§l[§r§4F§f§l]§r §l§4>>§r§f Il te manque " . (750 - EconomyAPI::getInstance()->myMoney($player)) . "");}
    }

    public static function giveFuzeKit(Player $player){

        if(EconomyAPI::getInstance()->myMoney($player) >= 2000) {

            EconomyAPI::getInstance()->reduceMoney($player, 2000);

            $helmet = Item::get(1001);
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $chestplate = Item::get(1002);
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $leggings = Item::get(1003);
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $boots = Item::get(1004);
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $sword = Item::get(1005);
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::SHARPNESS), 2));
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $player->getInventory()->clearAll();
            $player->getArmorInventory()->clearAll();

            $player->getInventory()->setItem(4, $sword);
            $player->getArmorInventory()->setHelmet($helmet);
            $player->getArmorInventory()->setChestplate($chestplate);
            $player->getArmorInventory()->setLeggings($leggings);
            $player->getArmorInventory()->setBoots($boots);

            $sound = new LevelSoundEventPacket();
            $sound->sound = LevelSoundEventPacket::SOUND_RANDOM_ANVIL_USE;
            $sound->position = $player;
            $player->sendDataPacket($sound);
        }else {$player->sendMessage("§f§l[§r§4F§f§l]§r §l§4>>§r§f Il te manque " . (2000 - EconomyAPI::getInstance()->myMoney($player)) . "");}
    }

    public static function giveDidierKit(Player $player){

        if(EconomyAPI::getInstance()->myMoney($player) >= 5000) {

            EconomyAPI::getInstance()->reduceMoney($player, 5000);

            $helmet = Item::get(1006);
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $chestplate = Item::get(1007);
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $leggings = Item::get(1008);
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $boots = Item::get(1009);
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $sword = Item::get(1010);
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::SHARPNESS), 2));
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $player->getInventory()->clearAll();
            $player->getArmorInventory()->clearAll();

            $player->getInventory()->setItem(4, $sword);
            $player->getArmorInventory()->setHelmet($helmet);
            $player->getArmorInventory()->setChestplate($chestplate);
            $player->getArmorInventory()->setLeggings($leggings);
            $player->getArmorInventory()->setBoots($boots);

            $sound = new LevelSoundEventPacket();
            $sound->sound = LevelSoundEventPacket::SOUND_RANDOM_ANVIL_USE;
            $sound->position = $player;
            $player->sendDataPacket($sound);
        }else {$player->sendMessage("§f§l[§r§4F§f§l]§r §l§4>>§r§f Il te manque " . (5000 - EconomyAPI::getInstance()->myMoney($player)) . "");}
    }

    public static function giveTntKit(Player $player){

        if(EconomyAPI::getInstance()->myMoney($player) >= 7000) {

            EconomyAPI::getInstance()->reduceMoney($player, 7000);

            $helmet = Item::get(1011);
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $helmet->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $chestplate = Item::get(1012);
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $leggings = Item::get(1013);
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $boots = Item::get(1014);
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::PROTECTION), 2));
            $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $sword = Item::get(1015);
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::SHARPNESS), 2));
            $sword->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 1));

            $player->getInventory()->clearAll();
            $player->getArmorInventory()->clearAll();

            $player->getInventory()->setItem(4, $sword);
            $player->getArmorInventory()->setHelmet($helmet);
            $player->getArmorInventory()->setChestplate($chestplate);
            $player->getArmorInventory()->setLeggings($leggings);
            $player->getArmorInventory()->setBoots($boots);

            $sound = new LevelSoundEventPacket();
            $sound->sound = LevelSoundEventPacket::SOUND_RANDOM_ANVIL_USE;
            $sound->position = $player;
            $player->sendDataPacket($sound);
        }else {$player->sendMessage("§f§l[§r§4F§f§l]§r §l§4>>§r§f Il te manque " . (7000 - EconomyAPI::getInstance()->myMoney($player)) . "");}
    }
}