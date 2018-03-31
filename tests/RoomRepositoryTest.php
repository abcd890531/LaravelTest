<?php

use App\Models\Room;
use App\Repositories\RoomRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomRepositoryTest extends TestCase
{
    use MakeRoomTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RoomRepository
     */
    protected $roomRepo;

    public function setUp()
    {
        parent::setUp();
        $this->roomRepo = App::make(RoomRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRoom()
    {
        $room = $this->fakeRoomData();
        $createdRoom = $this->roomRepo->create($room);
        $createdRoom = $createdRoom->toArray();
        $this->assertArrayHasKey('id', $createdRoom);
        $this->assertNotNull($createdRoom['id'], 'Created Room must have id specified');
        $this->assertNotNull(Room::find($createdRoom['id']), 'Room with given id must be in DB');
        $this->assertModelData($room, $createdRoom);
    }

    /**
     * @test read
     */
    public function testReadRoom()
    {
        $room = $this->makeRoom();
        $dbRoom = $this->roomRepo->find($room->id);
        $dbRoom = $dbRoom->toArray();
        $this->assertModelData($room->toArray(), $dbRoom);
    }

    /**
     * @test update
     */
    public function testUpdateRoom()
    {
        $room = $this->makeRoom();
        $fakeRoom = $this->fakeRoomData();
        $updatedRoom = $this->roomRepo->update($fakeRoom, $room->id);
        $this->assertModelData($fakeRoom, $updatedRoom->toArray());
        $dbRoom = $this->roomRepo->find($room->id);
        $this->assertModelData($fakeRoom, $dbRoom->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRoom()
    {
        $room = $this->makeRoom();
        $resp = $this->roomRepo->delete($room->id);
        $this->assertTrue($resp);
        $this->assertNull(Room::find($room->id), 'Room should not exist in DB');
    }
}
