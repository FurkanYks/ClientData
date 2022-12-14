<?php

namespace FurkanYks\ClientDatas;

use pocketmine\plugin\PluginBase;

use FurkanYks\ClientDatas\ClientData;
use FurkanYks\ClientDatas\ClientDataCommand;
use FurkanYks\ClientDatas\DPReceiveEvent;

class Main extends PluginBase
{

    public array $property = [];

    public static $instance;

    public static function getInstance()
    {
        return self::$instance;
    }

    public function onLoad(): void
    {
        $this->getLogger()->info("§cClientData is loading..");
        self::$instance = $this;
    }

    public function onEnable(): void
    {
        $this->getLogger()->info("§cClientData is loaded!");
        $this->getServer()->getCommandMap()->register("clientdata", new ClientDataCommand($this));
        $this->getServer()->getPluginManager()->registerEvents(new DPReceiveEvent($this), $this);
    }
}