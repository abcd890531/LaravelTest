<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class bookingApiTest extends TestCase
{
    use MakebookingTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatebooking()
    {
        $booking = $this->fakebookingData();
        $this->json('POST', '/api/v1/bookings', $booking);

        $this->assertApiResponse($booking);
    }

    /**
     * @test
     */
    public function testReadbooking()
    {
        $booking = $this->makebooking();
        $this->json('GET', '/api/v1/bookings/'.$booking->id);

        $this->assertApiResponse($booking->toArray());
    }

    /**
     * @test
     */
    public function testUpdatebooking()
    {
        $booking = $this->makebooking();
        $editedbooking = $this->fakebookingData();

        $this->json('PUT', '/api/v1/bookings/'.$booking->id, $editedbooking);

        $this->assertApiResponse($editedbooking);
    }

    /**
     * @test
     */
    public function testDeletebooking()
    {
        $booking = $this->makebooking();
        $this->json('DELETE', '/api/v1/bookings/'.$booking->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/bookings/'.$booking->id);

        $this->assertResponseStatus(404);
    }
}
