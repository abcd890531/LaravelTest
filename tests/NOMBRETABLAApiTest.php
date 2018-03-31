<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NOMBRETABLAApiTest extends TestCase
{
    use MakeNOMBRETABLATrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateNOMBRETABLA()
    {
        $nOMBRETABLA = $this->fakeNOMBRETABLAData();
        $this->json('POST', '/api/v1/nOMBRETABLAS', $nOMBRETABLA);

        $this->assertApiResponse($nOMBRETABLA);
    }

    /**
     * @test
     */
    public function testReadNOMBRETABLA()
    {
        $nOMBRETABLA = $this->makeNOMBRETABLA();
        $this->json('GET', '/api/v1/nOMBRETABLAS/'.$nOMBRETABLA->id);

        $this->assertApiResponse($nOMBRETABLA->toArray());
    }

    /**
     * @test
     */
    public function testUpdateNOMBRETABLA()
    {
        $nOMBRETABLA = $this->makeNOMBRETABLA();
        $editedNOMBRETABLA = $this->fakeNOMBRETABLAData();

        $this->json('PUT', '/api/v1/nOMBRETABLAS/'.$nOMBRETABLA->id, $editedNOMBRETABLA);

        $this->assertApiResponse($editedNOMBRETABLA);
    }

    /**
     * @test
     */
    public function testDeleteNOMBRETABLA()
    {
        $nOMBRETABLA = $this->makeNOMBRETABLA();
        $this->json('DELETE', '/api/v1/nOMBRETABLAS/'.$nOMBRETABLA->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/nOMBRETABLAS/'.$nOMBRETABLA->id);

        $this->assertResponseStatus(404);
    }
}
