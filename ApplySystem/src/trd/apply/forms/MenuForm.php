<?php


namespace trd\apply\forms;

use jojoe77777\FormAPI\SimpleForm;
use pocketmine\player\Player;


class MenuForm{

    public function MenuForm($player){
        $form = new SimpleForm(function (Player $player, $data = null){
            if($data === null){
                return;
            }
            switch ($data){
                case "0":
                    $send = new SendApply();
                    $send->SendApply($player);
                    break;
                case "1":
                    $sendform = new AdminListApply();
                    $sendform->AdminListApply($player);
            }
        });
        $form->setTitle("§6ApplyMenu");
        $form->addButton("Send Apply");
        if($player->hasPermission("apply.command.admin")){
            $form->addButton("§cSee Applys");
        }
        $form->sendToPlayer($player);
    }
}