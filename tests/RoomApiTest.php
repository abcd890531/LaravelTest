<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomApiTest extends TestCase
{
    use MakeRoomTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRoom()
    {
        $room = $this->fakeRoomData();
        $this->json('POST', '/api/v1/rooms', $room);

        $this->assertApiResponse($room);
    }

    /**
     * @test
     */
    public function testReadRoom()
    {
        $room = $this->makeRoom();
        $this->json('GET', '/api/v1/rooms/'.$room->id);

        $this->assertApiResponse($room->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRoom()
    {
        $room = $this->makeRoom();
        $editedRoom = $this->fakeRoomData();

        $this->json('PUT', '/api/v1/rooms/'.$room->id, $editedRoom);

        $this->assertApiResponse($editedRoom);
    }

    /**
     * @test
     */
    public function testDeleteRoom()
    {
        $room = $this->makeRoom();
        $this->json('DELETE', '/api/v1/rooms/'.$room->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/rooms/'.$room->id);

        $this->assertResponseStatus(404);
    }
}
