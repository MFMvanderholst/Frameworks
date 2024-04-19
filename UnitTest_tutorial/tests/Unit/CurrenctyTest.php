<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\CurrencyService;

// UnitTest is used for a single method or propperty
// is used by Units

class CurrenctyTest extends TestCase
{
    // this test is doing one fuction and its succesful 
    public function test_convert_usd_to_eur_succesful(): void
    {
        $result = (new CurrencyService())->convert(amount: 100, currencyFrom: 'usd', currencyTo: 'eur');
        $this->assertEquals(98, $result);
    }

    // this test is doing one fuction and its results zero
    public function test_convert_usd_to_gbp_results_zero(): void
    {
        $result = (new CurrencyService())->convert(amount: 100, currencyFrom: 'usd', currencyTo: 'gbp');
        $this->assertEquals(0, $result);
    }
}
