<?php

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    // ID 0001
    public function testDbNumberOfRowsOverZero(AcceptanceTester $I)
    {
        include_once "sources/ProductsRepository.php";

        $productsRepository = new ProductsRepository();
        $products           = $productsRepository->findAll();

        $I->assertGreaterThan(0, $products->num_rows);
    }

    // ID 0002
    public function testAllProductsAreOnPage(AcceptanceTester $I)
    {
        include_once "sources/ProductsRepository.php";

        $productsRepository = new ProductsRepository();
        $products           = $productsRepository->findAll();

        foreach ($products as $product) {
            $I->amOnPage('/');
            $I->see($product['description']);
            $I->see($product['inventory']);
            $I->see($product['sold']);
        }
    }

    // ID 0003
    public function testCalculatorIsOnPage(AcceptanceTester $I)
    {
        /*
            Elements need to have id's specified to them
        */

        $I->amOnPage('/');
        $I->seeElement('#input_first');
        $I->seeElement('#input_second');
        $I->seeElement('#btn_plus');
        $I->seeElement('#btn_minus');
        $I->seeElement('#label_result');
    }

    // ID 0004
    public function testCalculatorInputsTakeNumeralOnly()
    {

    }

    // ID 0005
    public function testCalculatorAdditions(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('#input_first', '1');
        $I->fillField('#input_second', '2');
        $I->click('#btn_plus');
        $I->see('3', '#label_result');

        $I->fillField('#input_first', '-999');
        $I->fillField('#input_second', '999');
        $I->click('#btn_plus');
        $I->see('0', '#label_result');

        $I->fillField('#input_first', '999');
        $I->fillField('#input_second', '999');
        $I->click('#btn_plus');
        $I->see('1998', '#label_result');
    }

    // ID 0006
    public function testCalculatorSubtractions(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('#input_first', '1');
        $I->fillField('#input_second', '2');
        $I->click('#btn_minus');
        $I->see('-1', '#label_result');

        $I->fillField('#input_first', '-999');
        $I->fillField('#input_second', '999');
        $I->click('#btn_minus');
        $I->see('-1998', '#label_result');

        $I->fillField('#input_first', '999');
        $I->fillField('#input_second', '999');
        $I->click('#btn_minus');
        $I->see('0', '#label_result');
    }

    // ID 0007
    public function testOrderFormIsOnPage(AcceptanceTester $I)
    {
        // Elements need these id's specified to them

        $I->amOnPage('/');
        $I->seeElement('#label_product');
        $I->seeElement('#label_amount');
        $I->seeElement('#input_product');
        $I->seeElement('#input_amount');
        $I->seeElement('#btn_order');
    }
}
