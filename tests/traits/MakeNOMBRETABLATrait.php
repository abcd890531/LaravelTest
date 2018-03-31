<?php

use Faker\Factory as Faker;
use App\Models\NOMBRETABLA;
use App\Repositories\NOMBRETABLARepository;

trait MakeNOMBRETABLATrait
{
    /**
     * Create fake instance of NOMBRETABLA and save it in database
     *
     * @param array $nOMBRETABLAFields
     * @return NOMBRETABLA
     */
    public function makeNOMBRETABLA($nOMBRETABLAFields = [])
    {
        /** @var NOMBRETABLARepository $nOMBRETABLARepo */
        $nOMBRETABLARepo = App::make(NOMBRETABLARepository::class);
        $theme = $this->fakeNOMBRETABLAData($nOMBRETABLAFields);
        return $nOMBRETABLARepo->create($theme);
    }

    /**
     * Get fake instance of NOMBRETABLA
     *
     * @param array $nOMBRETABLAFields
     * @return NOMBRETABLA
     */
    public function fakeNOMBRETABLA($nOMBRETABLAFields = [])
    {
        return new NOMBRETABLA($this->fakeNOMBRETABLAData($nOMBRETABLAFields));
    }

    /**
     * Get fake data of NOMBRETABLA
     *
     * @param array $postFields
     * @return array
     */
    public function fakeNOMBRETABLAData($nOMBRETABLAFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $nOMBRETABLAFields);
    }
}
