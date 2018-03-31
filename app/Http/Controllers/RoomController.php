<?php

namespace App\Http\Controllers;

use App\DataTables\RoomDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Repositories\RoomRepository;
use App\Models\Hotel;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RoomController extends AppBaseController
{
    /** @var  RoomRepository */
    private $roomRepository;

    public function __construct(RoomRepository $roomRepo)
    {
	    $this->middleware('auth');
        $this->roomRepository = $roomRepo;
    }

    /**
     * Display a listing of the Room.
     *
     * @param RoomDataTable $roomDataTable
     * @return Response
     */
    public function index(RoomDataTable $roomDataTable)
    {
        return $roomDataTable->render('rooms.index');
    }

    /**
     * Show the form for creating a new Room.
     *
     * @return Response
     */
    public function create()
    {
	    $hotels = Hotel::all();
		$arrayhotel = array();
		$arrayhotel[null] = null;
	
	    foreach ($hotels as $hotel)$arrayhotel[$hotel->id] = $hotel->name; 

     	return view('rooms.create')->with('arrayhotel', $arrayhotel);
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param CreateRoomRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomRequest $request)
    {
        $input = $request->all();

        $room = $this->roomRepository->create($input);

        Flash::success('Room saved successfully.');

        return redirect(route('rooms.index'));
    }

    /**
     * Display the specified Room.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }

        return view('rooms.show')->with('room', $room);
    }

    /**
     * Show the form for editing the specified Room.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }
		
	    $hotels = Hotel::all();
		$arrayhotel = array();
		$arrayhotel[null] = null;
		foreach ($hotels as $hotel)$arrayhotel[$hotel->id] = $hotel->name; 

        return view('rooms.edit')->with('room', $room)
		                         ->with('arrayhotel', $arrayhotel);
    }

    /**
     * Update the specified Room in storage.
     *
     * @param  int              $id
     * @param UpdateRoomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomRequest $request)
    {
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }

        $room = $this->roomRepository->update($request->all(), $id);

        Flash::success('Room updated successfully.');

        return redirect(route('rooms.index'));
    }

    /**
     * Remove the specified Room from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }

        $this->roomRepository->delete($id);

        Flash::success('Room deleted successfully.');

        return redirect(route('rooms.index'));
    }
}
