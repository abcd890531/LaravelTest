<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TariffApiTest extends TestCase
{
    use MakeTariffTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTariff()
    {
        $tariff = $this->fakeTariffData();
        $this->json('POST', '/api/v1/tariffs', $tariff);

        $this->assertApiResponse($tariff);
    }

    /**
     * @test
     */
    public function testReadTariff()
    {
        $tariff = $this->makeTariff();
        $this->json('GET', '/api/v1/tariffs/'.$tariff->id);

        $this->assertApiResponse($tariff->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTariff()
    {
        $tariff = $this->makeTariff();
        $editedTariff = $this->fakeTariffData();

        $this->json('PUT', '/api/v1/tariffs/'.$tariff->id, $editedTariff);

        $this->assertApiResponse($editedTariff);
    }

    /**
     * @test
     */
    public function testDeleteTariff()
    {
        $tariff = $this->makeTariff();
        $this->json('DELETE', '/api/v1/tariffs/'.$tariff->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tariffs/'.$tariff->id);

        $this->assertResponseStatus(404);
    }
}
