<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testName(): void
    {
        $name = 'name';

        $product = new Product();
        $product->setName($name);
        self::assertSame($name, $product->getName());
    }
}
