<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class searchApiTest extends TestCase
{
    use MakesearchTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesearch()
    {
        $search = $this->fakesearchData();
        $this->json('POST', '/api/v1/searches', $search);

        $this->assertApiResponse($search);
    }

    /**
     * @test
     */
    public function testReadsearch()
    {
        $search = $this->makesearch();
        $this->json('GET', '/api/v1/searches/'.$search->id);

        $this->assertApiResponse($search->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesearch()
    {
        $search = $this->makesearch();
        $editedsearch = $this->fakesearchData();

        $this->json('PUT', '/api/v1/searches/'.$search->id, $editedsearch);

        $this->assertApiResponse($editedsearch);
    }

    /**
     * @test
     */
    public function testDeletesearch()
    {
        $search = $this->makesearch();
        $this->json('DELETE', '/api/v1/searches/'.$search->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/searches/'.$search->id);

        $this->assertResponseStatus(404);
    }
}
