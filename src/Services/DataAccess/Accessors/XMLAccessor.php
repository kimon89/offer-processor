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
     * @param int    $id         [description]
     * @param array  $attributes [description]
     *
     * @return bool [description]
     */
    public function update($type, $id, array $attributes)
    {
        foreach ($attributes as $key => $attribute) {
            if (isset($this->simpleXML->$key)) {
                $this->simpleXML->$key = $attribute;
            }
        }
        $this->simpleXML->asXML($this->filepath);

        return true;
    }
}
