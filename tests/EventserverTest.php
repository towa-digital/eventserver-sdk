<?php

namespace Towa\Eventserver\Test;

use Dotenv\Dotenv;
use Env;
use PHPUnit\Framework\TestCase;
use Towa\Eventserver\Eventserver;

class EventserverTest extends TestCase
{
    /** @var \Towa\Eventserver\Eventserver */
    protected $eventserver;

    public function setUp()
    {
        Env::init();
        $dotenv = new Dotenv(\dirname(__DIR__, 1));
        $dotenv->load();
        $dotenv->required('EVENTSERVER_TOKEN');

        $this->eventserver = new Eventserver(env('EVENTSERVER_TOKEN'));

        parent::setUp();
    }

    /** @test */
    public function it_can_get_events()
    {
        $response = $this->eventserver->get();

        $this->assertNotEmpty($response['data']);
    }
}