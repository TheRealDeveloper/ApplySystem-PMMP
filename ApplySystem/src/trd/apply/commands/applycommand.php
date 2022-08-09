<?php

namespace trd\apply\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use trd\apply\forms\MenuForm;

class applycommand extends Command{
    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [], string $permsmsg = "", string $perms = "")
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->setPermission($perms);
        $this->setPermissionMessage($permsmsg);
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if($sender instanceof Player){
            $send = new MenuForm();
            $send->MenuForm($sender);
        }
    }
}