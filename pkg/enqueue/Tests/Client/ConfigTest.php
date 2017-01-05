<?php

namespace Enqueue\Tests\Client;

use Enqueue\Client\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldReturnRouterProcessorNameSetInConstructor()
    {
        $config = new Config(
            'aPrefix',
            'aApp',
            'aRouterTopicName',
            'aRouterQueueName',
            'aDefaultQueueName',
            'aRouterProcessorName'
        );

        $this->assertEquals('aRouterProcessorName', $config->getRouterProcessorName());
    }

    public function testShouldReturnRouterTopicNameSetInConstructor()
    {
        $config = new Config(
            'aPrefix',
            'aApp',
            'aRouterTopicName',
            'aRouterQueueName',
            'aDefaultQueueName',
            'aRouterProcessorName'
        );

        $this->assertEquals('aRouterTopicName', $config->getRouterTopicName());
    }

    public function testShouldReturnRouterQueueNameSetInConstructor()
    {
        $config = new Config(
            'aPrefix',
            'aApp',
            'aRouterTopicName',
            'aRouterQueueName',
            'aDefaultQueueName',
            'aRouterProcessorName'
        );

        $this->assertEquals('aRouterQueueName', $config->getRouterQueueName());
    }

    public function testShouldReturnDefaultQueueNameSetInConstructor()
    {
        $config = new Config(
            'aPrefix',
            'aApp',
            'aRouterTopicName',
            'aRouterQueueName',
            'aDefaultQueueName',
            'aRouterProcessorName'
        );

        $this->assertEquals('aDefaultQueueName', $config->getDefaultProcessorQueueName());
    }

    public function testShouldCreateRouterTopicName()
    {
        $config = new Config(
            'aPrefix',
            'aApp',
            'aRouterTopicName',
            'aRouterQueueName',
            'aDefaultQueueName',
            'aRouterProcessorName'
        );

        $this->assertEquals('aprefix.aname', $config->createTransportRouterTopicName('aName'));
    }

    public function testShouldCreateProcessorQueueName()
    {
        $config = new Config(
            'aPrefix',
            'aApp',
            'aRouterTopicName',
            'aRouterQueueName',
            'aDefaultQueueName',
            'aRouterProcessorName'
        );

        $this->assertEquals('aprefix.aapp.aname', $config->createTransportQueueName('aName'));
    }

    public function testShouldCreateDefaultConfig()
    {
        $config = Config::create();

        $this->assertSame('default', $config->getDefaultProcessorQueueName());
        $this->assertSame('router', $config->getRouterProcessorName());
        $this->assertSame('default', $config->getRouterQueueName());
        $this->assertSame('router', $config->getRouterTopicName());
    }
}
