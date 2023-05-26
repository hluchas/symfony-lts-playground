<?php

namespace App\Tests\Integration;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductFlowTest extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel();
        parent::setUp();
    }

    public function testPersistence(): void
    {
        $name = 'name';
        $price = 14;

        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);

        $em = self::getContainer()->get(ManagerRegistry::class)->getManager();
        $em->persist($product);
        $em->flush();

        $repository = self::getContainer()->get(ProductRepository::class);
        $product = $repository->findOneByName($name);

        self::assertInstanceOf(Product::class, $product);
        self::assertSame($name, $product->getName());
        self::assertSame($price, $product->getPrice());
    }
}
