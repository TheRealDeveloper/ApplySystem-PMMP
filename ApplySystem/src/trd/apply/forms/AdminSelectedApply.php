<?php


namespace trd\apply\forms;

use jojoe77777\FormAPI\CustomForm;
use jojoe77777\FormAPI\ModalForm;
use pocketmine\player\Player;
use pocketmine\Server;
use trd\apply\Apply;

class AdminSelectedApply{

    public function AdminSelectedApply($player, $applyer){
        $form = new ModalForm(function (Player $player, $data = null) use ($applyer){
            if($data === null){
                return;
            }
            if($data === true){
                Apply::$applys->remove("$applyer");
                Apply::$applys->save();
                Apply::$applys->reload();
            }else{
                return;
            }
        });
        $applys = Apply::$applys;
        $form->setTitle("§6ApplyMenu §7| §6Rate Apply");
        $form->setContent("§6Player: §c{$applyer}\n§6Want to be: §c{$applys->getNested("{$applyer}.want")}\n\n§6Apply Message:\n§a{$applys->getNested("{$applyer}.message")}");
        $form->setButton1("§cClose Apply");
        $form->setButton2("§cLet it open");
        $form->sendToPlayer($player);
    }
}