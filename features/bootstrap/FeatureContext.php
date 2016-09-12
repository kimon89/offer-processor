<?php
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

class FeatureContext implements SnippetAcceptingContext
{
	protected $offer;
	protected $products;
	protected $path = 'example.xml';

 	/**
     * @Given the :arg1 offer is enabled
     */
    public function theOfferIsEnabled($offer)
    {
    	if ($offer == '3 for the price of 2'){
    		$this->offer = '3for2';
    	}
    	if ($offer == 'Buy Shampoo & get Conditioner for 50% off'){
    		$this->offer = 'Conditioner50';
    	}
    }

    /**
     * @When the following products are put on the order
     */
    public function theFollowingProductsArePutOnTheOrder(TableNode $table)
    {
        $hash = $table->getHash();
		foreach ($hash as $row) {
			$this->products[] = [
				'title' => $row['Title'],
				'price' => $row['Price'],
				'category' => $row['Category']
			];
		}

		$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8" ?><order></order>');
		$products = $xml->addChild('products');
		$total = 0;
		foreach ($this->products as $product) {
			$productEl = $products->addChild('product');
			$productEl->addAttribute('title', $product['title']);
			$productEl->addAttribute('price', $product['price']);
			$productEl->addChild('category', $product['category']);
			$total += $product['price'];

		}

		$xml->addChild('total',$total);
		$xml->asXML('example.xml');
    }

        /**
     * @Then I should get the :arg1 for free
     */
    public function iShouldGetTheForFree($title)
    {
        exec("php run.php \"$this->path\" \"$this->offer\"");
        $xmlString = file_get_contents($this->path);
        $xml = new SimpleXMLElement($xmlString);
        $product = $xml->xpath("/order/products/product[@title=\"$title\"]");
        if ($product[0]['included'] != "false") {
        	throw new PendingException(); 
        }
    }


        /**
     * @Given the :arg1 offer is disabled
     */
    public function theOfferIsDisabled($arg1)
    {
        exec("php run.php \"$this->path\"");
    }

    /**
     * @Then I should not get anything for free
     */
    public function iShouldNotGetAnythingForFree()
    {
        $xmlString = file_get_contents($this->path);
        $xml = new SimpleXMLElement($xmlString);
        $products = $xml->xpath('/order/products/product');
        foreach ($products as $k => $product) {
        	if (isset($product[0]['included']) && $product[0]['included'] == "false") {
        		throw new PendingException(); 
        	}
        }
    }

    /**
     * @Then I should get a :arg2% discount on :arg1
     */
    public function iShouldGetADiscountOn($discount, $title)
    {
    	exec("php run.php \"$this->path\" \"$this->offer\"");
    	$xmlString = file_get_contents($this->path);
        $xml = new SimpleXMLElement($xmlString);
        $products = $xml->xpath("/order/products/product[@title=\"$title\"]");
        foreach ($products as $k => $product) {
        	if (!isset($product[0]['discount']) || ((float)$product[0]['discount']*100) != $discount) {
        		throw new PendingException(); 
        	}
        }
    }

        /**
     * @Then the order total should be :arg1
     */
    public function theOrderTotalShouldBe3($total)
    {
    	$xmlString = file_get_contents($this->path);
        $xml = new SimpleXMLElement($xmlString);
        if ($xml->total != $total){
        	throw new PendingException();
        }
    }

}