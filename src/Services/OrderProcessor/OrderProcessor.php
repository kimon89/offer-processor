<?php

namespace OfferProcessor\Services\OrderProcessor;

use OfferProcessor\Services\InputLoader\InputLoaderInterface;
use OfferProcessor\Services\OrderCalculator\OrderCalculatorFactory;
use OfferProcessor\Services\DataAccess\Factory\DataAccessFactoryInterface;
use OfferProcessor\Gateways\Order\OrderGatewayFactory;

/**
 * Main class for retrieveing an order and applying and offer.
 */
class OrderProcessor
{
    /**
     * Parameters comming from the terminal.
     *
     * @var array
     */
    protected $parameters;
    /**
     * The input loader.
     *
     * @var InputLoader
     */
    protected $inputLoader;
    /**
     * Calculator factory.
     *
     * @var OrderCalculatorFactory
     */
    protected $orderCalculatorFactory;
    /**
     * Data access factory.
     *
     * @var DataAccessFactory
     */
    protected $dataAccessFactory;
    /**
     * OderGatewayFactory.
     *
     * @var OrderGatewayFactory
     */
    protected $orderGatewayFactory;

    public function __construct(
        DataAccessFactoryInterface $dataAccessFactory,
        InputLoaderInterface $inputLoader,
        OrderCalculatorFactory $orderCalculatorFactory,
        OrderGatewayFactory $orderGatewayFactory)
    {
        $this->inputLoader = $inputLoader;
        $this->orderCalculatorFactory = $orderCalculatorFactory;
        $this->dataAccessFactory = $dataAccessFactory;
        $this->orderGatewayFactory = $orderGatewayFactory;
    }

    /**
     * Sets the parameters required from the application.
     *
     * @param array $parameters [description]
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $this->inputLoader->getData($parameters);
    }

    /**
     * Main process of the system. Uses the gateway to access the data and uses
     * a calculator factory to use the appropriate strategy to calculate the final
     * total amount of the order.
     */
    public function process()
    {
        $dataAccess = $this->dataAccessFactory->getAccessor($this->parameters['path']);
        $orderGateway = $this->orderGatewayFactory->getGateway($dataAccess);
        $order = $orderGateway->getOrder();
        $orderCalculator = $this->orderCalculatorFactory->getCalculator($this->parameters['offer']);
        if (empty($orderCalculator)) {
            return;
        }
        $order = $orderCalculator->calculate($order);
        $orderGateway->update($order);
    }
}
