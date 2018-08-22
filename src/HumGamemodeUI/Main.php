<?php

namespace HumGamemodeUI;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use jojoe77777\FormAPI;

Class Main extends PluginBase{
  
  public $prefix = "§b[§eGamemode§cUI§b]";
    
  public function onEnable(){
    $this->getLogger()->info("[§eGamemode§bUI§f] §aEnable");
  }
  
  public function onCommand(CommandSender $sender, Command $command, String $label, array $args) : bool {
    if($command->getName() === "gmui"){
      if($sender->hasPermission("gmui.cmd")){
        $formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $formapi->createSimpleForm(function(Player $sender, $data){
          $result = $data;
          if($result === null){
          }
          switch($result){
            case 0:
              $sender->sendMessage("§aChange gamemode to gm 1");
              $sender->addTitle("§eCreative mode", "§fCreative mode is enable");
        });
      } else {
        $sender->sendMessage("§cYou did not operater or you don't have permission!");
      }
    }
    return true;
  }
}