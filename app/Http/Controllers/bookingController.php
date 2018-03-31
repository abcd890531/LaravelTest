<?php

namespace App\Http\Controllers;

use App\DataTables\bookingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatebookingRequest;
use App\Http\Requests\UpdatebookingRequest;
use App\Repositories\bookingRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class bookingController extends AppBaseController
{
    /** @var  bookingRepository */
    private $bookingRepository;

    public function __construct(bookingRepository $bookingRepo)
    {
	    
        $this->bookingRepository = $bookingRepo;
    }

    /**
     * Display a listing of the booking.
     *
     * @param bookingDataTable $bookingDataTable
     * @return Response
     */
    public function index(bookingDataTable $bookingDataTable)
    {
        return $bookingDataTable->render('bookings.index');
    }

	/**
     * Show the form for creating a new booking.
     *
     * @return Response
     */
    public function createmodel()
    {
        return view('bookings.create');
    }
	
    /**
     * Show the form for creating a new booking.
     *
     * @return Response
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created booking in storage.
     *
     * @param CreatebookingRequest $request
     *
     * @return Response
     */
    public function store(CreatebookingRequest $request)
    {
	
        $input = $request->all();

        $booking = $this->bookingRepository->create($input);

        //Flash::success('Booking saved successfully.');

        return redirect(route('hotels.index'));
    }
	
	

    /**
     * Display the specified booking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified booking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.edit')->with('booking', $booking);
    }

    /**
     * Update the specified booking in storage.
     *
     * @param  int              $id
     * @param UpdatebookingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebookingRequest $request)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $booking = $this->bookingRepository->update($request->all(), $id);

        Flash::success('Booking updated successfully.');

        return redirect(route('bookings.index'));
    }

    /**
     * Remove the specified booking from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $this->bookingRepository->delete($id);

        Flash::success('Booking deleted successfully.');

        return redirect(route('bookings.index'));
    }
}
