<?php

namespace Tests\Feature;

use Tests\TestCase;

class SystemTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testSubscribeToTopic()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/subscribe/topic1', [
            "url" => "http://localhost:9000/test1"
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                "url",
                "topic"
            ]);
    }

    public function testPublishToTopic()
    {
//        $this->withoutExceptionHandling();

        $response = $this->post('/publish/topic1', [
            "fname" => "Salvation",
            "lname" => "Arinze"
        ]);

        dd($response->baseResponse->getContent());

        $response->assertStatus(200)
            ->assertJsonFragment([
                "status"=>true
            ]);;
    }
}
