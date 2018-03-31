<?php

use App\Models\booking;
use App\Repositories\bookingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class bookingRepositoryTest extends TestCase
{
    use MakebookingTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var bookingRepository
     */
    protected $bookingRepo;

    public function setUp()
    {
        parent::setUp();
        $this->bookingRepo = App::make(bookingRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatebooking()
    {
        $booking = $this->fakebookingData();
        $createdbooking = $this->bookingRepo->create($booking);
        $createdbooking = $createdbooking->toArray();
        $this->assertArrayHasKey('id', $createdbooking);
        $this->assertNotNull($createdbooking['id'], 'Created booking must have id specified');
        $this->assertNotNull(booking::find($createdbooking['id']), 'booking with given id must be in DB');
        $this->assertModelData($booking, $createdbooking);
    }

    /**
     * @test read
     */
    public function testReadbooking()
    {
        $booking = $this->makebooking();
        $dbbooking = $this->bookingRepo->find($booking->id);
        $dbbooking = $dbbooking->toArray();
        $this->assertModelData($booking->toArray(), $dbbooking);
    }

    /**
     * @test update
     */
    public function testUpdatebooking()
    {
        $booking = $this->makebooking();
        $fakebooking = $this->fakebookingData();
        $updatedbooking = $this->bookingRepo->update($fakebooking, $booking->id);
        $this->assertModelData($fakebooking, $updatedbooking->toArray());
        $dbbooking = $this->bookingRepo->find($booking->id);
        $this->assertModelData($fakebooking, $dbbooking->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletebooking()
    {
        $booking = $this->makebooking();
        $resp = $this->bookingRepo->delete($booking->id);
        $this->assertTrue($resp);
        $this->assertNull(booking::find($booking->id), 'booking should not exist in DB');
    }
}
