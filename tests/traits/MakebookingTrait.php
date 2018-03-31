<?php

use Faker\Factory as Faker;
use App\Models\booking;
use App\Repositories\bookingRepository;

trait MakebookingTrait
{
    /**
     * Create fake instance of booking and save it in database
     *
     * @param array $bookingFields
     * @return booking
     */
    public function makebooking($bookingFields = [])
    {
        /** @var bookingRepository $bookingRepo */
        $bookingRepo = App::make(bookingRepository::class);
        $theme = $this->fakebookingData($bookingFields);
        return $bookingRepo->create($theme);
    }

    /**
     * Get fake instance of booking
     *
     * @param array $bookingFields
     * @return booking
     */
    public function fakebooking($bookingFields = [])
    {
        return new booking($this->fakebookingData($bookingFields));
    }

    /**
     * Get fake data of booking
     *
     * @param array $postFields
     * @return array
     */
    public function fakebookingData($bookingFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'email' => $fake->word,
            'card_number' => $fake->word,
            'expiration_date' => $fake->word,
            'cvCode' => $fake->word,
            'hotel_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $bookingFields);
    }
}
