<?php

use Faker\Factory as Faker;
use App\Models\search;
use App\Repositories\searchRepository;

trait MakesearchTrait
{
    /**
     * Create fake instance of search and save it in database
     *
     * @param array $searchFields
     * @return search
     */
    public function makesearch($searchFields = [])
    {
        /** @var searchRepository $searchRepo */
        $searchRepo = App::make(searchRepository::class);
        $theme = $this->fakesearchData($searchFields);
        return $searchRepo->create($theme);
    }

    /**
     * Get fake instance of search
     *
     * @param array $searchFields
     * @return search
     */
    public function fakesearch($searchFields = [])
    {
        return new search($this->fakesearchData($searchFields));
    }

    /**
     * Get fake data of search
     *
     * @param array $postFields
     * @return array
     */
    public function fakesearchData($searchFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'date' => $fake->word,
            'hotel_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $searchFields);
    }
}
