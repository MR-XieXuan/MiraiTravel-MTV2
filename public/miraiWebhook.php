<?php

/**
 * 收到消息时的启动文件
 */

namespace MiraiTravel\Webhook;

define("WEBHOOK_ERROR_REPORT_LEAVE", 0);        //webhook 模式下的错误报告级别
define("IGNORE_UNREPORTED_ERRORS", true);       //是否忽略未报告的错误
error_reporting(0);

// 设置运行目录
chdir(dirname(__FILE__) . "/../");
// 载入核心
require_once "./core/loadMiraiTravel.php";

use MiraiTravel\LogSystem\LogSystem;
use Error;
use MiraiTravel\adapter\QQ\standard\basic\QQObjManager as BasicQQObjManager;

// 检测 MiraiTravel 是否有线程开启了 Stay 模式
if (file_exists("./core/stay")) {
    $logSystem = new LogSystem("MiraiTravel", "System");
    $logSystem->write_log(
        "webhook",
        "webhookConfigManager",
        "MiraiTravel is running in Stay mode."
    );
    die();
}

try {
    // 获取消息
    $_DATA = json_decode(file_get_contents("php://input"), true);

    // 载入QQ
    $logSystem = new LogSystem("MiraiTravel", "System");
    $logSystem->write_log(
        "webhook",
        "webhookConfigManager",
        $_SERVER['HTTP_QQ'] . " Recive [" . json_encode($_DATA) . "] ."
    );
    $qqObjManager = new BasicQQObjManager();
    if (!$qqObjManager->config_qq_obj($_SERVER['HTTP_QQ'])) {
        $logSystem->write_log(
            "webhook",
            "webhookConfigManager",
            "Config [" .  $_SERVER['HTTP_QQ'] . "] Bot Faild.Because have not the bot script."
        );
        die();
    }
    $qqBot = $qqObjManager->get_qqobj($_SERVER['HTTP_QQ']);
    if (
        "[" . $qqBot->get_http_authorization() . "]"
        !==  $_SERVER['HTTP_AUTHORIZATION']
    ) {
        $logSystem->write_log(
            "webhook",
            "webhookConfigManager",
            "Config [" .  $_SERVER['HTTP_QQ'] . "] "
                . "Bot Faild.Because the bot authorization is"
                . " [" . $qqBot->get_http_authorization() . "]"
                . ", but the webhook given "
                . " [" . $_SERVER['HTTP_AUTHORIZATION'] . "]"
        );
        die();
    }
} catch (Error $e) {
    $logSystem = new LogSystem($_SERVER['HTTP_QQ'], "QQBot");
    $logSystem->write_log("webhook", "webhookError", "$e");
    die();
}

function get_var($var)
{
    global ${$var};
    return ${$var};
}

namespace MiraiTravel\WebhookAdapter;

$webhookBeUsed = false;

namespace MiraiTravel\Webhook;

use MiraiTravel\LogSystem\LogSystem;
use Error;

try {
    $qqBot->webhook($_DATA);
} catch (Error $e) {
    $logSystem = new LogSystem($qqBot->get_qq(), "QQBot");
    $logSystem->write_log("webhook", "webhookError", "$e");
}
