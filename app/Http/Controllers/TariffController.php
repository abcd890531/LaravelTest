<?php

namespace App\Http\Controllers;

use App\DataTables\TariffDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTariffRequest;
use App\Http\Requests\UpdateTariffRequest;
use App\Repositories\TariffRepository;
use App\Models\Room;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TariffController extends AppBaseController
{
    /** @var  TariffRepository */
    private $tariffRepository;

    public function __construct(TariffRepository $tariffRepo)
    {
	    $this->middleware('auth');
        $this->tariffRepository = $tariffRepo;
    }

    /**
     * Display a listing of the Tariff.
     *
     * @param TariffDataTable $tariffDataTable
     * @return Response
     */
    public function index(TariffDataTable $tariffDataTable)
    {
        return $tariffDataTable->render('tariffs.index');
    }

    /**
     * Show the form for creating a new Tariff.
     *
     * @return Response
     */
    public function create()
    {
	    $rooms = Room::all();
		$arrayroom = array();
		$arrayroom[null] = null;
	
	    foreach ($rooms as $room)$arrayroom[$room->id] = $room->name; 
	
        return view('tariffs.create')->with('arrayroom', $arrayroom);
    }

    /**
     * Store a newly created Tariff in storage.
     *
     * @param CreateTariffRequest $request
     *
     * @return Response
     */
    public function store(CreateTariffRequest $request)
    {
        $input = $request->all();

        $tariff = $this->tariffRepository->create($input);

        Flash::success('Tariff saved successfully.');

        return redirect(route('tariffs.index'));
    }

    /**
     * Display the specified Tariff.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tariff = $this->tariffRepository->findWithoutFail($id);

        if (empty($tariff)) {
            Flash::error('Tariff not found');

            return redirect(route('tariffs.index'));
        }

        return view('tariffs.show')->with('tariff', $tariff);
    }

    /**
     * Show the form for editing the specified Tariff.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tariff = $this->tariffRepository->findWithoutFail($id);

        if (empty($tariff)) {
            Flash::error('Tariff not found');

            return redirect(route('tariffs.index'));
        }
		
		$rooms = Room::all();
		$arrayroom = array();
		$arrayroom[null] = null;
	
	    foreach ($rooms as $room)$arrayroom[$room->id] = $room->name; 

        return view('tariffs.edit')->with('tariff', $tariff)
		                           ->with('arrayroom', $arrayroom);
    }

    /**
     * Update the specified Tariff in storage.
     *
     * @param  int              $id
     * @param UpdateTariffRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTariffRequest $request)
    {
        $tariff = $this->tariffRepository->findWithoutFail($id);

        if (empty($tariff)) {
            Flash::error('Tariff not found');

            return redirect(route('tariffs.index'));
        }

        $tariff = $this->tariffRepository->update($request->all(), $id);

        Flash::success('Tariff updated successfully.');

        return redirect(route('tariffs.index'));
    }

    /**
     * Remove the specified Tariff from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tariff = $this->tariffRepository->findWithoutFail($id);

        if (empty($tariff)) {
            Flash::error('Tariff not found');

            return redirect(route('tariffs.index'));
        }

        $this->tariffRepository->delete($id);

        Flash::success('Tariff deleted successfully.');

        return redirect(route('tariffs.index'));
    }
}
