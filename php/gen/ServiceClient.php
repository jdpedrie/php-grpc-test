<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ;

/**
 */
class ServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \EchoRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Echo(\EchoRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/Service/Echo',
        $argument,
        ['\EchoResponse', 'decode'],
        $metadata, $options);
    }

}
