<?php
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\ContainerBuilder;

if ($container->getParameter('mode') == 'cli') {
	$container
    	->register('input_validator', 'OfferProcessor\Services\InputValidator\Validators\CLIValidator');
	$container
    	->register('input_loader', 'OfferProcessor\Services\InputLoader\Loaders\CLILoader')
    	->addArgument(new Reference('input_validator'));
}

    $container
    ->register('order_model', 'OfferProcessor\Models\Order');

    $container
    ->register('product_model', 'OfferProcessor\Models\Product');

$container
    ->register('order_gateway_factory', 'OfferProcessor\Gateways\Order\OrderGatewayFactory')
        ->addArgument(new Reference('order_model'))
    	->addArgument(new Reference('product_model'));

$container
    ->register('order_calculator_factory', 'OfferProcessor\Services\OrderCalculator\OrderCalculatorFactory');

$container
    ->register('data_access_factory', 'OfferProcessor\Services\DataAccess\Factory\XMLDataAccessFactory');

$container
    ->register('order_processor', 'OfferProcessor\Services\OrderProcessor\OrderProcessor')
    ->addArgument(new Reference('data_access_factory'))
    ->addArgument(new Reference('input_loader'))
    ->addArgument(new Reference('order_calculator_factory'))
    ->addArgument(new Reference('order_gateway_factory'));