<?php


namespace trd\apply\forms;

use jojoe77777\FormAPI\CustomForm;
use pocketmine\player\Player;
use pocketmine\Server;
use trd\apply\Apply;

class SendApply{

    public function SendApply($player){
        $form = new CustomForm(function (Player $player, $data = null){
            if($data === null){
                return;
            }
            $list = ["Supporter", "Builder", "Developer", "Administrator"];
            $selected = $list[$data[1]];
            Apply::$applys->setNested("{$player->getName()}.want", $selected);
            Apply::$applys->setNested("{$player->getName()}.message", $data[2]);
            Apply::$applys->save();
            Apply::$applys->reload();
            foreach (Server::getInstance()->getOps() as $op) {
                if($op instanceof Player){
                    $op->sendMessage("§6{$player->getName()}§a has sent an Apply.");
                }
            }
            $player->sendMessage("§aYou have sent your Apply successfully!");
        });
        $list = ["Supporter", "Builder", "Developer", "Administrator"];
        $form->setTitle("§6ApplyMenu §7| §6Send Apply");
        $form->addLabel("Send an Apply here");
        $form->addDropdown("You want to be:", $list);
        $form->addInput("Your Apply Message", "I'am Elia and are cool :D");
        $form->sendToPlayer($player);
    }
}