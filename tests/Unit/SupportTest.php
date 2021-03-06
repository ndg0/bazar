<?php

namespace Bazar\Tests\Unit;

use Bazar\Bazar;
use Bazar\Support\Countries;
use Bazar\Tests\TestCase;
use Illuminate\Support\Str;

class SupportTest extends TestCase
{
    /** @test */
    public function str_has_currency_macro()
    {
        Bazar::currency('eur');
        $this->assertEquals('1,300.00 EUR', Str::currency(1300));

        Bazar::currency('usd');
        $this->assertEquals('150,300,400.00 USD', Str::currency(150300400));

        $this->assertEquals('150,300,400.00 HUF', Str::currency(150300400, 'huf'));
    }

    /** @test */
    public function support_has_country_lookup()
    {
        $this->assertCount(249, Countries::all());
        $this->assertSame('Hungary', Countries::name('HU'));
        $this->assertSame([], Countries::africa());
        $this->assertSame([], Countries::asia());
        $this->assertSame([], Countries::europe());
        $this->assertSame([], Countries::northAmerica());
        $this->assertSame([], Countries::southAmerica());
        $this->assertSame([], Countries::oceania());
    }
}
