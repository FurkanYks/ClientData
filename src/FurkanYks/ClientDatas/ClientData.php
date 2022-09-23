<?php

namespace FurkanYks\ClientDatas;

use pocketmine\utils\TextFormat;

interface ClientData
{

    public const UNKNOWN = TextFormat::DARK_RED . "Unknown Or Not Registered";

    public const LANGUAGES = [ #example registered language codes.
        "tr_TR" => "Turkish",
        "az_AZ" => "Azerbaijani",
        "de_DE" => "German",
        "en_AU" => "Australian English",
        "en_CA" => "Canadian English",
        "en_GB" => "British English",
        "en_NZ" => "New Zealand English",
        "en_7S" => "English",
        "en_US" => "American English",
        "es_ES" => "Spanish",
        "es_MX" => "Spanish",
        "da_DK" => "Danish",
        "fr_FR" => "French",
        "fr_CA" => "French",
        "id_ID" => "Indonesia",
        "it_IT" => "Italy",
        "ja_JP" => "Japanese",
        "ka_GE" => "Georgia",
        "kk_KZ" => "Kazakh",
        "ko_KR" => "Korean"
    ];

    public const OS = [
        1 => "Android",
        2 => "IOS",
        3 => "MacOS",
        4 => "Fire OS",
        5 => "Gear VR",
        6 => "HoloLens",
        7 => "Windows 10",
        8 => "Windows 32",
        9 => "Dedicated - VDS",
        10 => "Orbis",
        11 => "NX"
    ];

    public const DEVICES = [
        1 => "Computer",
        2 => "Phone",
        3 => "XBox",
        4 => "VR"
    ];

    public const THIRD_PARTY = [
        "Minecraft" => "Minecraft",
        "Toolbox" => "Toolbox"
    ];

    public const GUI_SCALE = [
        "Maximum",
        "Mid",
        "Minimum"
    ];

    public const UI_PROFILE = [
        "Classic",
        "Pocket"
    ];
}