<?php

declare(strict_types=1);

namespace App\Controller;

use Grpc\ChannelCredentials;
use Grpc\ProductService\ClientProductServiceClient;
use Grpc\ProductService\ClientRequest;
use Grpc\ProductService\ProductResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ClientProductController extends AbstractController
{
    #[Route('/clients/{client_id}/products', name: 'app_client_products', methods: ['GET'])]
    public function clientProducts(string $client_id): Response
    {
        $productClient = new ClientProductServiceClient('service_a:8084', [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);

        $productRequest = (new ClientRequest())->setClientId($client_id);

        /** @var ProductResponse $response */
        [$response] = $productClient->GetProductsByClient($productRequest)->wait();

        return JsonResponse::fromJsonString($response->serializeToJsonString());
    }
}
