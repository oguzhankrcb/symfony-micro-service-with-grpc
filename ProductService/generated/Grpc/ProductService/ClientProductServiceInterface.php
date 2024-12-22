<?php
# Generated by the protocol buffer compiler (roadrunner-server/grpc). DO NOT EDIT!
# source: proto/service.proto

namespace Grpc\ProductService;

use Spiral\RoadRunner\GRPC;

interface ClientProductServiceInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "grpc.ProductService.ClientProductService";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param ClientRequest $in
    * @return ProductResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function GetProductsByClient(GRPC\ContextInterface $ctx, ClientRequest $in): ProductResponse;
}
