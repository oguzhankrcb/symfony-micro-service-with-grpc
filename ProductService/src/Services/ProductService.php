<?php

namespace App\Services;

use Faker\Factory;
use Faker\Generator;
use Grpc\ProductService\ClientProductServiceInterface;
use Grpc\ProductService\ClientRequest;
use Grpc\ProductService\Product;
use Grpc\ProductService\ProductResponse;

use Spiral\RoadRunner\GRPC;

class ProductService implements ClientProductServiceInterface
{
    protected Generator $faker;
    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function GetProductsByClient(GRPC\ContextInterface $ctx, ClientRequest $in): ProductResponse
    {
        $productResponse = new ProductResponse();

        $productResponse->setProducts($this->getRandomProducts($in->getClientId()));

        return $productResponse;
    }

    private function getRandomProducts(string $clientId): array
    {
        $products = [];

        $randomLength = random_int(3, 5);
        for ($i = 0; $i < $randomLength; $i++) {
            $product = (new Product())->setProductId($i + 1)
                ->setClientId($clientId)
                ->setName($this->faker->domainName)
                ->setDescription($this->faker->word)
                ->setPrice($this->faker->numberBetween(100,1000));

            $products[] = $product;
        }

        return $products;
    }
}