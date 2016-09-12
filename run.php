<?php
namespace OfferProcessor;

require("vendor/autoload.php");

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

use OfferProcessor\Exceptions\ExceptionHandler;
use OfferProcessor\Services\OrderProcessor\OrderProcessor;

$container = new ContainerBuilder();
$container->setParameter('mode','cli');
$loader = new PhpFileLoader($container, new FileLocator(__DIR__));
$loader->load('services.php');


$exceptionHandler = new ExceptionHandler();
set_exception_handler([$exceptionHandler, "handle"]);


$orderProcessor = $container->get('order_processor');
$orderProcessor->setParameters($argv);
$orderProcessor->process();

