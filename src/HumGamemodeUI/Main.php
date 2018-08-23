<?php

namespace HumGamemodeUI;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use jojoe77777\FormAPI;

Class Main extends PluginBase{
  
  public function onEnable(){
    $this->getLogger()->info("[§eGamemode§bUI§f] §aEnable");
  }
  
  public function onCommand(CommandSender $sender, Command $command, String $label, array $args) : bool {
    if($command->getName() === "gmui"){
      if($sender->hasPermission("gmui.cmd")){
        $formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $formapi->createCustomForm(function(Player $sender, $data){
          $result = $data[0];
          if( !is_null($data)) {
            switch($result) {
            case 0:
              $sender->sendMessage("Cretive mode §aChange gamemode to gm 1");
              $sender->addTitle("§eCreative mode", "§fCreative mode is enable");
              $sender->setGamemode(1);
              break;
            case 1:
              $sender->sendMessage("Survival mode §aChange gamemode to gm 0");
              $sender->addTitle("§eSurvival mode", "§fSurvival mode is enable");
              $sender->setGamemode(0);
              break;
            case 2:
              $sender->sendMessage("Adventure mode §aChange gamemode to gm 2");
              $sender->addTitle("§eAdventure mode", "§fAdventure mode is enable");
              $sender->setGamemode(2);
              break;
            case 3:
              $sender->sendMessage("Spector mode §aChange gamemode to gm 3");
              $sender->addTitle("§eSpector mode", "§fSpector mode is enable");
              $sender->setGamemode(3);
              default:
                return;
                }
           }
          });
          $form->setTitle("§7§lGamemodeUI");
          $form->addDropdown("Gamemode", ["Creative", "Survival", "Adventure", "Spector"]);
          $form->sendToPlayer($sender);
      } else {
        $sender->sendMessage("§cYou did not operater or you don't have permission!");
      }
    }
    return true;
  }
}

 
