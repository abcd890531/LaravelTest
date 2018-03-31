<?php

namespace App\Http\Controllers;

use App\DataTables\HotelDataTable;
use App\DataTables\RoomHotelDataTable;
use App\DataTables\RoomDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Repositories\HotelRepository;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Tariff;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HotelController extends AppBaseController
{
    /** @var  HotelRepository */
    private $hotelRepository;
	
	

    public function __construct(HotelRepository $hotelRepo)
    {
        $this->hotelRepository = $hotelRepo;
    }

    /**
     * Display a listing of the Hotel.
     *
     * @param HotelDataTable $hotelDataTable
     * @return Response
     */
    public function index(HotelDataTable $hotelDataTable)
    {
	    
	    return $hotelDataTable->render('hotels.index');
    }

    /**
     * Show the form for creating a new Hotel.
     *
     * @return Response
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created Hotel in storage.
     *
     * @param CreateHotelRequest $request
     *
     * @return Response
     */
    public function store(CreateHotelRequest $request)
    {
        $input = $request->all();

        $hotel = $this->hotelRepository->create($input);

        Flash::success('Hotel saved successfully.');

        return redirect(route('hotels.index'));
    }

    /**
     * Display the specified Hotel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
	    
      	$rooms = Room::all()->where('hotel_id', $id);
		$hotel = Hotel::all()->where('id', $id)->first();
		$tariffs = Tariff::all();
	
        return view('hotels.show')->with('rooms', $rooms)
		                          ->with('id', $id)
								  ->with('hotel', $hotel)
								  ->with('tariffs', $tariffs);
		
    }

    /**
     * Show the form for editing the specified Hotel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hotel = $this->hotelRepository->findWithoutFail($id);

        if (empty($hotel)) {
            Flash::error('Hotel not found');

            return redirect(route('hotels.index'));
        }

        return view('hotels.edit')->with('hotel', $hotel);
    }

    /**
     * Update the specified Hotel in storage.
     *
     * @param  int              $id
     * @param UpdateHotelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHotelRequest $request)
    {
        $hotel = $this->hotelRepository->findWithoutFail($id);

        if (empty($hotel)) {
            Flash::error('Hotel not found');

            return redirect(route('hotels.index'));
        }

        $hotel = $this->hotelRepository->update($request->all(), $id);

        Flash::success('Hotel updated successfully.');

        return redirect(route('hotels.index'));
    }

    /**
     * Remove the specified Hotel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hotel = $this->hotelRepository->findWithoutFail($id);

        if (empty($hotel)) {
            Flash::error('Hotel not found');

            return redirect(route('hotels.index'));
        }

        $this->hotelRepository->delete($id);

        Flash::success('Hotel deleted successfully.');

        return redirect(route('hotels.index'));
    }
}
