<?php

use Faker\Factory as Faker;
use App\Models\Hotel;
use App\Repositories\HotelRepository;

trait MakeHotelTrait
{
    /**
     * Create fake instance of Hotel and save it in database
     *
     * @param array $hotelFields
     * @return Hotel
     */
    public function makeHotel($hotelFields = [])
    {
        /** @var HotelRepository $hotelRepo */
        $hotelRepo = App::make(HotelRepository::class);
        $theme = $this->fakeHotelData($hotelFields);
        return $hotelRepo->create($theme);
    }

    /**
     * Get fake instance of Hotel
     *
     * @param array $hotelFields
     * @return Hotel
     */
    public function fakeHotel($hotelFields = [])
    {
        return new Hotel($this->fakeHotelData($hotelFields));
    }

    /**
     * Get fake data of Hotel
     *
     * @param array $postFields
     * @return array
     */
    public function fakeHotelData($hotelFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'picture' => $fake->word,
            'name' => $fake->word,
            'classification' => $fake->word,
            'address' => $fake->word,
            'price' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $hotelFields);
    }
}
