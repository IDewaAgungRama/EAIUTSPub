<?php

namespace App;

use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class PublisherProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function productUpdate($message)
    {
        $connection = new AMQPStreamConnection(env('MQ_HOST'), env('MQ_PORT'), env('MQ_USER'), env('MQ_PASS'), env('MQ_VHOST'));
        $channel = $connection->channel();
        $channel->exchange_declare('product_update', 'direct', false, false, false);
        $channel->queue_declare('product_update_queue', false, false, false, false);
        $channel->queue_bind('product_update_queue', 'product_update', 'test_key');
        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, 'product_update', 'test_key');
        echo " [x] Sent $message to product_update / product_update_queue.\n";
        $channel->close();
        $connection->close();
    }

    public function productDelete($message)
    {
        $connection = new AMQPStreamConnection(env('MQ_HOST'), env('MQ_PORT'), env('MQ_USER'), env('MQ_PASS'), env('MQ_VHOST'));
        $channel = $connection->channel();
        $channel->exchange_declare('product_delete', 'direct', false, false, false);
        $channel->queue_declare('product_delete_queue', false, false, false, false);
        $channel->queue_bind('product_delete_queue', 'product_delete', 'test_key');
        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, 'product_delete', 'test_key');
        echo " [x] Sent $message to product_delete / product_delete_queue.\n";
        $channel->close();
        $connection->close();
    }
}
