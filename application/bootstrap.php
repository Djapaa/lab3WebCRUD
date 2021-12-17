<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once ('../lab3Web/application/core/router.php');

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once '../lab3web/application/config/connect.php';

$routes = new Route();
$routes ->run();

// подключаем файлы ядра



/*
Здесь обычно подключаются дополнительные модули, реализующие различный функционал:
	> аутентификацию
	> кеширование
	> работу с формами
	> абстракции для доступа к данным
	> ORM
	> Unit тестирование
	> Benchmarking
	> Работу с изображениями
	> Backup
	> и др.
*/



//Route::start(); // запускаем маршрутизатор
