<?php

use App\Models\search;
use App\Repositories\searchRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class searchRepositoryTest extends TestCase
{
    use MakesearchTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var searchRepository
     */
    protected $searchRepo;

    public function setUp()
    {
        parent::setUp();
        $this->searchRepo = App::make(searchRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesearch()
    {
        $search = $this->fakesearchData();
        $createdsearch = $this->searchRepo->create($search);
        $createdsearch = $createdsearch->toArray();
        $this->assertArrayHasKey('id', $createdsearch);
        $this->assertNotNull($createdsearch['id'], 'Created search must have id specified');
        $this->assertNotNull(search::find($createdsearch['id']), 'search with given id must be in DB');
        $this->assertModelData($search, $createdsearch);
    }

    /**
     * @test read
     */
    public function testReadsearch()
    {
        $search = $this->makesearch();
        $dbsearch = $this->searchRepo->find($search->id);
        $dbsearch = $dbsearch->toArray();
        $this->assertModelData($search->toArray(), $dbsearch);
    }

    /**
     * @test update
     */
    public function testUpdatesearch()
    {
        $search = $this->makesearch();
        $fakesearch = $this->fakesearchData();
        $updatedsearch = $this->searchRepo->update($fakesearch, $search->id);
        $this->assertModelData($fakesearch, $updatedsearch->toArray());
        $dbsearch = $this->searchRepo->find($search->id);
        $this->assertModelData($fakesearch, $dbsearch->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesearch()
    {
        $search = $this->makesearch();
        $resp = $this->searchRepo->delete($search->id);
        $this->assertTrue($resp);
        $this->assertNull(search::find($search->id), 'search should not exist in DB');
    }
}
