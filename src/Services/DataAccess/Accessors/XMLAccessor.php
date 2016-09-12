<?php

namespace OfferProcessor\Services\DataAccess\Accessors;

/**
 * Uses an XML as the data store.
 */
class XMLAccessor implements DataAccessInterface
{
    /**
     * The simpleXMLElement.
     *
     * @var SimpleXMLElement
     */
    protected $simpleXML;

    /**
     * Filepath pointing to the XML file.
     *
     * @var string
     */
    protected $filepath;

    /**
     * [__construct description].
     *
     * @param [type] $filepath [description]
     */
    public function __construct($filepath)
    {
        $this->filepath = $filepath;
        $xml = file_get_contents($filepath);
        $this->simpleXML = new \SimpleXMLElement($xml);
    }

    /**
     * Get the data in a normalised format.
     *
     * @return array [description]
     */
    public function get()
    {
        $order = $this->simpleXML;
        $productsNorm = [];
        foreach ($order->products->product as $k => $product) {
            $productsNorm[] = [
                'id' => $k,
                'title' => (string) $product['title'],
                'price' => (float) $product['price'],
                'category' => (string) $product->category,
            ];
        }

        return [
            'id' => 1,
            'products' => $productsNorm,
            'total' => (float) $order->total,
        ];
    }

    /**
     * Update an element.
     *
     * @param string $type       [description]
     * @param array  $attributes [description]
     *
     * @return bool [description]
     */
    public function update($type, $order)
    {
        $this->simpleXML->total = $order->getTotal();
        foreach ($this->simpleXML->products->product as $product) {
            foreach ($order->getProducts() as $productB) {
                if ($product['title'] == $productB->getTitle()) {
                    if ($productB->isIncluded()) {
                        $product['included'] = 'true';
                    } else {
                        $product['included'] = 'false';
                    }
                    if ($productB->getDiscount()) {
                        $product['discount'] = $productB->getDiscount();
                    }
                }
            }
        }
        $this->simpleXML->asXML($this->filepath);

        return true;
    }
}
