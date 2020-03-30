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

    protected function setUp(): void
    {
        Env::init();
        $dotenv = Dotenv::createImmutable(\dirname(__DIR__, 1));
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

    /** @test */
    public function it_can_get_events_with_options()
    {
        $response = $this->eventserver
            ->withOptions([
                'page' => [
                    'size' => 1,
                ],
            ])
            ->get();

        $this->assertCount(1, $response['data']);
    }

    /** @test */
    public function it_can_get_non_default_endpoint()
    {
        $response = $this->eventserver
            ->withEndpoint('categories')
            ->get();

        $this->assertNotEmpty($response['data']);
    }
}
