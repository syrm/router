<?php

require_once 'Router/Destination.php';
require_once 'Router/Origin.php';
require_once 'Router/Route.php';
require_once 'Router/RouterInterface.php';
require_once 'Router/Router.php';
require_once 'Router/Traveler.php';

require_once 'Sample/Controller/Command.php';
require_once 'Sample/Controller/Hello.php';
require_once 'Sample/Destination/Controller.php';
require_once 'Sample/Origin/Command.php';
require_once 'Sample/Origin/Url.php';
require_once 'Sample/Route/Command.php';
require_once 'Sample/Route/Dynamic.php';
require_once 'Sample/Route/Url.php';
require_once 'Sample/Traveler/Controller.php';

$router = (new Router\Router())
    ->newRoute(new Sample\Route\Url('/hello/world', new Sample\Destination\Controller('Hello', 'world')))
    ->newRoute(new Sample\Route\Url('/hello', new Sample\Destination\Controller('Hello', 'index')))
    ->newRoute(new Sample\Route\Command('hello:world', new Sample\Destination\Controller('Command', 'world')))
    ->newRoute(new Sample\Route\Command('hello:galaxy', new Sample\Destination\Controller('Hello', 'galaxy')))
    ->newRoute(new Sample\Route\Dynamic('/{controller}/{method}'))
;

$controllerTraveler = new Sample\Traveler\Controller();
$router->travelerIs($controllerTraveler)->destinationFor(new Sample\Origin\Url('/hello/world?Bouh=avion'));
$router->travelerIs($controllerTraveler)->destinationFor(new Sample\Origin\Command('hello:world'));
$router->travelerIs($controllerTraveler)->destinationFor(new Sample\Origin\Url('/user/show'));
