<?php
// +----------------------------------------------------------------------
// | service1.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------

require_once 'vendor/autoload.php';
$port = 12001;
$server = new swoole_server("0.0.0.0", $port);
$server->on('receive', function (swoole_server $server, $fd, $reactor_id, $data) use ($port) {
    $message = 'server.port=' . $port . PHP_EOL;
    $data = 'receive=' . $data . PHP_EOL;
    echo $data;
    $server->send($fd, $message . $data);
});
$server->start();
