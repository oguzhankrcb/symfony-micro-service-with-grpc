<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Grpc\ProductService;

/**
 */
class ClientProductServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Grpc\ProductService\ClientRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetProductsByClient(\Grpc\ProductService\ClientRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/grpc.ProductService.ClientProductService/GetProductsByClient',
        $argument,
        ['\Grpc\ProductService\ProductResponse', 'decode'],
        $metadata, $options);
    }

}
