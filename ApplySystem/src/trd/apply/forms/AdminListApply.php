<?php


namespace trd\apply\forms;

use jojoe77777\FormAPI\SimpleForm;
use pocketmine\player\Player;
use trd\apply\Apply;

class AdminListApply{

    public function AdminListApply($player){
        $form = new SimpleForm(function (Player $player, $data = null){
            if($data === null){
                return;
            }
            $sendto = new AdminSelectedApply();
            $sendto->AdminSelectedApply($player, $data);
        });
        $form->setTitle("§6ApplyMenu");
        foreach (Apply::$applys->getAll(true) as $players) {
            $form->addButton("§e{$players}§7'§es §6Apply", -1, "", $players);
        }
        $form->sendToPlayer($player);
    }
}