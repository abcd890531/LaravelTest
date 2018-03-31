<?php

use App\Models\Tariff;
use App\Repositories\TariffRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TariffRepositoryTest extends TestCase
{
    use MakeTariffTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TariffRepository
     */
    protected $tariffRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tariffRepo = App::make(TariffRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTariff()
    {
        $tariff = $this->fakeTariffData();
        $createdTariff = $this->tariffRepo->create($tariff);
        $createdTariff = $createdTariff->toArray();
        $this->assertArrayHasKey('id', $createdTariff);
        $this->assertNotNull($createdTariff['id'], 'Created Tariff must have id specified');
        $this->assertNotNull(Tariff::find($createdTariff['id']), 'Tariff with given id must be in DB');
        $this->assertModelData($tariff, $createdTariff);
    }

    /**
     * @test read
     */
    public function testReadTariff()
    {
        $tariff = $this->makeTariff();
        $dbTariff = $this->tariffRepo->find($tariff->id);
        $dbTariff = $dbTariff->toArray();
        $this->assertModelData($tariff->toArray(), $dbTariff);
    }

    /**
     * @test update
     */
    public function testUpdateTariff()
    {
        $tariff = $this->makeTariff();
        $fakeTariff = $this->fakeTariffData();
        $updatedTariff = $this->tariffRepo->update($fakeTariff, $tariff->id);
        $this->assertModelData($fakeTariff, $updatedTariff->toArray());
        $dbTariff = $this->tariffRepo->find($tariff->id);
        $this->assertModelData($fakeTariff, $dbTariff->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTariff()
    {
        $tariff = $this->makeTariff();
        $resp = $this->tariffRepo->delete($tariff->id);
        $this->assertTrue($resp);
        $this->assertNull(Tariff::find($tariff->id), 'Tariff should not exist in DB');
    }
}
