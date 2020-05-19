<?php

namespace Palente\Furnace; 
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
use Palente\LuckyBlock\utils\Events;
class Main extends PluginBase
{
	public static $instance;
	public static $logger = null;
	public $mode_eco = false;
	public $prefix = TF::BLUE."[".TF::RED."Furnace".TF::BLUE."] ".TF::RESET;
	public function onLoad(){
		self::$logger = $this->getLogger();
		self::$instance =$this;
		$this->getServer()->getCommandMap()->register("Furnace", new Furnace_Command("furnace",$this));
	}

	public static function getInstance(){
		return self::$instance;
	}
}
