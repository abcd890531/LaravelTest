<?php

use Faker\Factory as Faker;
use App\Models\Tariff;
use App\Repositories\TariffRepository;

trait MakeTariffTrait
{
    /**
     * Create fake instance of Tariff and save it in database
     *
     * @param array $tariffFields
     * @return Tariff
     */
    public function makeTariff($tariffFields = [])
    {
        /** @var TariffRepository $tariffRepo */
        $tariffRepo = App::make(TariffRepository::class);
        $theme = $this->fakeTariffData($tariffFields);
        return $tariffRepo->create($theme);
    }

    /**
     * Get fake instance of Tariff
     *
     * @param array $tariffFields
     * @return Tariff
     */
    public function fakeTariff($tariffFields = [])
    {
        return new Tariff($this->fakeTariffData($tariffFields));
    }

    /**
     * Get fake data of Tariff
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTariffData($tariffFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'price' => $fake->randomDigitNotNull,
            'taxes' => $fake->randomDigitNotNull,
            'fees' => $fake->randomDigitNotNull,
            'promo' => $fake->word,
            'condition' => $fake->word,
            'policy' => $fake->word,
            'date_start' => $fake->word,
            'date_end' => $fake->word,
            'room_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $tariffFields);
    }
}
