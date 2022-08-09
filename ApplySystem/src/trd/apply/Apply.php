<?php

namespace trd\apply;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;
use trd\apply\commands\applycommand;


class Apply extends PluginBase{

    public static Config $applys;
    public static Config $forms;

    protected function onEnable(): void{
        self::$applys = new Config($this->getDataFolder()."applys.yml", 2);
        self::$forms = new Config($this->getDataFolder()."forms.yml", 2);
        Server::getInstance()->getCommandMap()->register("", new applycommand("apply", "opens the apply menu", "", [], "", "apply.command"));
    }
}