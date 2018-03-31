<?php

namespace App\Http\Controllers;

use App\DataTables\searchDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesearchRequest;
use App\Http\Requests\UpdatesearchRequest;
use App\Repositories\searchRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class searchController extends AppBaseController
{
    /** @var  searchRepository */
    private $searchRepository;

    public function __construct(searchRepository $searchRepo)
    {
	     $this->middleware('auth');
        $this->searchRepository = $searchRepo;
    }

    /**
     * Display a listing of the search.
     *
     * @param searchDataTable $searchDataTable
     * @return Response
     */
    public function index(searchDataTable $searchDataTable)
    {
        return $searchDataTable->render('searches.index');
    }

    /**
     * Show the form for creating a new search.
     *
     * @return Response
     */
    public function create()
    {
        return view('searches.create');
    }

    /**
     * Store a newly created search in storage.
     *
     * @param CreatesearchRequest $request
     *
     * @return Response
     */
    public function store(CreatesearchRequest $request)
    {
        $input = $request->all();

        $search = $this->searchRepository->create($input);

        Flash::success('Search saved successfully.');

        return redirect(route('searches.index'));
    }

    /**
     * Display the specified search.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $search = $this->searchRepository->findWithoutFail($id);

        if (empty($search)) {
            Flash::error('Search not found');

            return redirect(route('searches.index'));
        }

        return view('searches.show')->with('search', $search);
    }

    /**
     * Show the form for editing the specified search.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $search = $this->searchRepository->findWithoutFail($id);

        if (empty($search)) {
            Flash::error('Search not found');

            return redirect(route('searches.index'));
        }

        return view('searches.edit')->with('search', $search);
    }

    /**
     * Update the specified search in storage.
     *
     * @param  int              $id
     * @param UpdatesearchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesearchRequest $request)
    {
        $search = $this->searchRepository->findWithoutFail($id);

        if (empty($search)) {
            Flash::error('Search not found');

            return redirect(route('searches.index'));
        }

        $search = $this->searchRepository->update($request->all(), $id);

        Flash::success('Search updated successfully.');

        return redirect(route('searches.index'));
    }

    /**
     * Remove the specified search from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $search = $this->searchRepository->findWithoutFail($id);

        if (empty($search)) {
            Flash::error('Search not found');

            return redirect(route('searches.index'));
        }

        $this->searchRepository->delete($id);

        Flash::success('Search deleted successfully.');

        return redirect(route('searches.index'));
    }
}
