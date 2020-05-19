<?php

namespace Palente\Furnace;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase as Plugin;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\lang\TranslationContainer;
use pocketmine\item\Item;

class Furnace_Command extends Command{
	public function __construct(string $name, Plugin $caller){
		parent::__construct(
			$name,
			"Masak item di tangan Anda",
			"/furnace",
			[]
		);
	$this->cl = $caller;
	$this->setPermission("Furnace.use");
	}

	public function execute(CommandSender $sender, $command, array $args){
		$pr = $this->cl->prefix;
		if(!$this->testPermission($sender)){
			$sender->sendMessage(new TranslationContainer("commands.generic.permission"));
			return false;
		}
		if(!$sender instanceof Player){
			$sender->sendMessage($pr.TF::RED."Anda tidak dapat menggunakan perintah ini dari konsol ...");
			return;
		}
		$player = $sender;
		$item = $player->getInventory()->getItemInHand();
		if($item->getId() == ITEM::RAW_BEEF){
			$player->getInventory()->setItemInHand(Item::get(ITEM::COOKED_BEEF,0,$item->getCount()));
		}elseif($item->getId() == ITEM::RAW_PORKCHOP){			
			$player->getInventory()->setItemInHand(Item::get(ITEM::COOKED_PORKCHOP,0,$item->getCount()));
		}elseif($item->getId() == ITEM::RAW_FISH){
			$player->getInventory()->setItemInHand(Item::get(ITEM::COOKED_FISH,0,$item->getCount()));
		}elseif($item->getId() == ITEM::RAW_CHICKEN){
			$player->getInventory()->setItemInHand(Item::get(ITEM::COOKED_CHICKEN,0,$item->getCount()));
		}elseif($item->getId() == ITEM::RAW_RABBIT){
			$player->getInventory()->setItemInHand(Item::get(ITEM::COOKED_RABBIT,0,$item->getCount()));
		}elseif($item->getId() == ITEM::RAW_MUTTON){
			$player->getInventory()->setItemInHand(Item::get(ITEM::COOKED_MUTTON,0,$item->getCount()));
		}elseif($item->getId() == ITEM::RAW_SALMON){
			$player->getInventory()->setItemInHand(Item::get(ITEM::COOKED_SALMON,0,$item->getCount()));
		}elseif($item->getId() == ITEM::DIAMOND_ORE){			
			$player->getInventory()->setItemInHand(Item::get(ITEM::DIAMOND,0,$item->getCount()));
		}elseif($item->getId() == ITEM::IRON_ORE){			
			$player->getInventory()->setItemInHand(Item::get(ITEM::IRON_INGOT,0,$item->getCount()));
		}elseif($item->getId() == ITEM::GOLD_ORE){			
			$player->getInventory()->setItemInHand(Item::get(ITEM::GOLD_INGOT,0,$item->getCount()));
			}elseif($item->getId() == ITEM::QUARTZ_ORE){
		    $player->getInventory()->setItemInHand(Item::get(ITEM::QUARTZ,0,$item->getCount()));
		}elseif($item->getId() == ITEM::COBBLESTONE){			
			$player->getInventory()->setItemInHand(Item::get(ITEM::STONE,0,$item->getCount()));
		}elseif($item->getId() == ITEM::CLAY_BALL){
		    $player->getInventory()->setItemInHand(Item::get(ITEM::BRICK,0,$item->getCount()));
		}elseif($item->getId() == ITEM::NETHERRACK){
		    $player->getInventory()->setItemInHand(Item::get(ITEM::NETHERBRICK,0,$item->getCount()));
		}elseif($item->getId() == ITEM::SAND){
		    $player->getInventory()->setItemInHand(Item::get(ITEM::GLASS,0,$item->getCount()));
		}elseif($item->getId() == ITEM::REDSTONE_ORE){
		    $player->getInventory()->setItemInHand(Item::get(ITEM::REDSTONE,0,$item->getCount()));
		}elseif($item->getId() == ITEM::EMERALD_ORE){
		    $player->getInventory()->setItemInHand(Item::get(ITEM::EMERALD,0,$item->getCount()));
		}elseif($item->getId() == ITEM::COAL_ORE){
		    $player->getInventory()->setItemInHand(Item::get(ITEM::COAL,0,$item->getCount()));
		}elseif($item->getId() == ITEM::LOG){
		    $player->getInventory()->setItemInHand(Item::get(ITEM::COAL,0,$item->getCount()));
		}elseif($item->getId() == ITEM::CLAY){
		    $player->getInventory()->setItemInHand(Item::get(ITEM::HARDENED_CLAY,0,$item->getCount()));
		}else{
			$player->sendMessage($pr.TF::RED."Sayangnya, Item ini tidak dapat dimasak ...");
			return false;
		}
		$player->sendMessage($pr.TF::GREEN."Barang Anda telah berhasil dimasak!");
		return true;
	}
}
