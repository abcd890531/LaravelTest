<?php

use App\Models\NOMBRETABLA;
use App\Repositories\NOMBRETABLARepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NOMBRETABLARepositoryTest extends TestCase
{
    use MakeNOMBRETABLATrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var NOMBRETABLARepository
     */
    protected $nOMBRETABLARepo;

    public function setUp()
    {
        parent::setUp();
        $this->nOMBRETABLARepo = App::make(NOMBRETABLARepository::class);
    }

    /**
     * @test create
     */
    public function testCreateNOMBRETABLA()
    {
        $nOMBRETABLA = $this->fakeNOMBRETABLAData();
        $createdNOMBRETABLA = $this->nOMBRETABLARepo->create($nOMBRETABLA);
        $createdNOMBRETABLA = $createdNOMBRETABLA->toArray();
        $this->assertArrayHasKey('id', $createdNOMBRETABLA);
        $this->assertNotNull($createdNOMBRETABLA['id'], 'Created NOMBRETABLA must have id specified');
        $this->assertNotNull(NOMBRETABLA::find($createdNOMBRETABLA['id']), 'NOMBRETABLA with given id must be in DB');
        $this->assertModelData($nOMBRETABLA, $createdNOMBRETABLA);
    }

    /**
     * @test read
     */
    public function testReadNOMBRETABLA()
    {
        $nOMBRETABLA = $this->makeNOMBRETABLA();
        $dbNOMBRETABLA = $this->nOMBRETABLARepo->find($nOMBRETABLA->id);
        $dbNOMBRETABLA = $dbNOMBRETABLA->toArray();
        $this->assertModelData($nOMBRETABLA->toArray(), $dbNOMBRETABLA);
    }

    /**
     * @test update
     */
    public function testUpdateNOMBRETABLA()
    {
        $nOMBRETABLA = $this->makeNOMBRETABLA();
        $fakeNOMBRETABLA = $this->fakeNOMBRETABLAData();
        $updatedNOMBRETABLA = $this->nOMBRETABLARepo->update($fakeNOMBRETABLA, $nOMBRETABLA->id);
        $this->assertModelData($fakeNOMBRETABLA, $updatedNOMBRETABLA->toArray());
        $dbNOMBRETABLA = $this->nOMBRETABLARepo->find($nOMBRETABLA->id);
        $this->assertModelData($fakeNOMBRETABLA, $dbNOMBRETABLA->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteNOMBRETABLA()
    {
        $nOMBRETABLA = $this->makeNOMBRETABLA();
        $resp = $this->nOMBRETABLARepo->delete($nOMBRETABLA->id);
        $this->assertTrue($resp);
        $this->assertNull(NOMBRETABLA::find($nOMBRETABLA->id), 'NOMBRETABLA should not exist in DB');
    }
}
