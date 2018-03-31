<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HotelApiTest extends TestCase
{
    use MakeHotelTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateHotel()
    {
        $hotel = $this->fakeHotelData();
        $this->json('POST', '/api/v1/hotels', $hotel);

        $this->assertApiResponse($hotel);
    }

    /**
     * @test
     */
    public function testReadHotel()
    {
        $hotel = $this->makeHotel();
        $this->json('GET', '/api/v1/hotels/'.$hotel->id);

        $this->assertApiResponse($hotel->toArray());
    }

    /**
     * @test
     */
    public function testUpdateHotel()
    {
        $hotel = $this->makeHotel();
        $editedHotel = $this->fakeHotelData();

        $this->json('PUT', '/api/v1/hotels/'.$hotel->id, $editedHotel);

        $this->assertApiResponse($editedHotel);
    }

    /**
     * @test
     */
    public function testDeleteHotel()
    {
        $hotel = $this->makeHotel();
        $this->json('DELETE', '/api/v1/hotels/'.$hotel->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/hotels/'.$hotel->id);

        $this->assertResponseStatus(404);
    }
}
