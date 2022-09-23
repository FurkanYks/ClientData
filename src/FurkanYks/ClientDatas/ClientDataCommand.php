<?php

namespace FurkanYks\ClientDatas;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;

use FurkanYks\ClientDatas\ClientData;
use FurkanYks\ClientDatas\Main;

class ClientDataCommand extends Command implements ClientData
{
    private $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
        parent::__construct("clientdata", "You can view client information!", "/clientdata");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        $playername = $sender->getName();
        if (!$sender instanceof Player) {
            $sender->sendMessage("§cYou can only use this command in game.");
            return false;
        }
        if (isset($args[0])) {
        } else {
            $name = Server::getInstance()->getPlayerByPrefix($sender->getName());
            $data = $this->getPlayerData($name);
            $sender->sendMessage("§cHi §f{$playername}§c! Your Login Information:");
            $sender->sendMessage("§cClient Language: §f" . (self::LANGUAGES[$data["LanguageCode"]] ?? self::UNKNOWN));
            $sender->sendMessage("§cOS: §f" . (self::OS[$data["DeviceOS"]] ?? self::UNKNOWN));
            $sender->sendMessage("§cDevice Type: §f" . (self::DEVICES[$data["CurrentInputMode"]] ?? self::UNKNOWN));
            $sender->sendMessage("§cThird Party Name: §f" . (self::THIRD_PARTY[$data["ThirdPartyName"]] ?? self::UNKNOWN));
        }
        return false;
    }

    public function getPlayerData(Player $player): array
    {
        $property = $this->plugin->property[$player->getName()] ?? [];
        return [
            "Name" => $player->getName(),
            "UUID" => $player->getUniqueId(),
            "DeviceOS" => $property["DeviceOS"] ?? self::UNKNOWN,
            "ThirdPartyName" => $property["ThirdPartyName"] ?? self::UNKNOWN,
            "Ping" => $player->getNetworkSession()->getPing(),
            "LanguageCode" => $property["LanguageCode"] ?? self::UNKNOWN,
            "CurrentInputMode" => $property["CurrentInputMode"] ?? self::UNKNOWN,
            "DeviceModel" => $property["DeviceModel"] ?? self::UNKNOWN,
            "GameVersion" => $property["GameVersion"] ?? self::UNKNOWN,
            "UIProfile" => $property["UIProfile"] ?? self::UNKNOWN,
            "GuiScale" => $property["GuiScale"] ?? self::UNKNOWN
        ];
    }
}