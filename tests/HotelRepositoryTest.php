<?php

use App\Models\Hotel;
use App\Repositories\HotelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HotelRepositoryTest extends TestCase
{
    use MakeHotelTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var HotelRepository
     */
    protected $hotelRepo;

    public function setUp()
    {
        parent::setUp();
        $this->hotelRepo = App::make(HotelRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateHotel()
    {
        $hotel = $this->fakeHotelData();
        $createdHotel = $this->hotelRepo->create($hotel);
        $createdHotel = $createdHotel->toArray();
        $this->assertArrayHasKey('id', $createdHotel);
        $this->assertNotNull($createdHotel['id'], 'Created Hotel must have id specified');
        $this->assertNotNull(Hotel::find($createdHotel['id']), 'Hotel with given id must be in DB');
        $this->assertModelData($hotel, $createdHotel);
    }

    /**
     * @test read
     */
    public function testReadHotel()
    {
        $hotel = $this->makeHotel();
        $dbHotel = $this->hotelRepo->find($hotel->id);
        $dbHotel = $dbHotel->toArray();
        $this->assertModelData($hotel->toArray(), $dbHotel);
    }

    /**
     * @test update
     */
    public function testUpdateHotel()
    {
        $hotel = $this->makeHotel();
        $fakeHotel = $this->fakeHotelData();
        $updatedHotel = $this->hotelRepo->update($fakeHotel, $hotel->id);
        $this->assertModelData($fakeHotel, $updatedHotel->toArray());
        $dbHotel = $this->hotelRepo->find($hotel->id);
        $this->assertModelData($fakeHotel, $dbHotel->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteHotel()
    {
        $hotel = $this->makeHotel();
        $resp = $this->hotelRepo->delete($hotel->id);
        $this->assertTrue($resp);
        $this->assertNull(Hotel::find($hotel->id), 'Hotel should not exist in DB');
    }
}
