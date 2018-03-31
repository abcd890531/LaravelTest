<?php

use Faker\Factory as Faker;
use App\Models\Room;
use App\Repositories\RoomRepository;

trait MakeRoomTrait
{
    /**
     * Create fake instance of Room and save it in database
     *
     * @param array $roomFields
     * @return Room
     */
    public function makeRoom($roomFields = [])
    {
        /** @var RoomRepository $roomRepo */
        $roomRepo = App::make(RoomRepository::class);
        $theme = $this->fakeRoomData($roomFields);
        return $roomRepo->create($theme);
    }

    /**
     * Get fake instance of Room
     *
     * @param array $roomFields
     * @return Room
     */
    public function fakeRoom($roomFields = [])
    {
        return new Room($this->fakeRoomData($roomFields));
    }

    /**
     * Get fake data of Room
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRoomData($roomFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'type_availability' => $fake->word,
            'total_people' => $fake->randomDigitNotNull,
            'king' => $fake->randomDigitNotNull,
            'daybed' => $fake->randomDigitNotNull,
            'balcony' => $fake->randomDigitNotNull,
            'hotel_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $roomFields);
    }
}
