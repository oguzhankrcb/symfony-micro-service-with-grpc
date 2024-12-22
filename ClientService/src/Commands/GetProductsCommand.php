<?php

declare(strict_types=1);

namespace App\Commands;

use Grpc\ChannelCredentials;
use Grpc\ProductService\ClientProductServiceClient;
use Grpc\ProductService\ClientRequest;
use Grpc\ProductService\Product;
use Grpc\ProductService\ProductResponse;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:get_products', description: 'Get product details from GRPC service')]
class GetProductsCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $productClient = new ClientProductServiceClient('service_a:8084', [
            'credentials' => ChannelCredentials::createInsecure(),
        ]);

        $productRequest = (new ClientRequest())->setClientId('123456');

        /** @var ProductResponse $response */
        [$response] = $productClient->GetProductsByClient($productRequest)->wait();

        /** @var Product $product */
        foreach ($response->getProducts() as $product) {
            $output->writeln('---------------------');
            $output->writeln('Client Id: '.$product->getClientId());
            $output->writeln('Product Id: '.$product->getProductId());
            $output->writeln('Product Name: '.$product->getName());
            $output->writeln('Product Price: '.$product->getPrice());
            $output->writeln('---------------------');
        }

        return Command::SUCCESS;
    }
}
