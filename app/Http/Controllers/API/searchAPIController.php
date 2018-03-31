<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesearchAPIRequest;
use App\Http\Requests\API\UpdatesearchAPIRequest;
use App\Models\search;
use App\Repositories\searchRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class searchController
 * @package App\Http\Controllers\API
 */

class searchAPIController extends AppBaseController
{
    /** @var  searchRepository */
    private $searchRepository;

    public function __construct(searchRepository $searchRepo)
    {
        $this->searchRepository = $searchRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/searches",
     *      summary="Get a listing of the searches.",
     *      tags={"search"},
     *      description="Get all searches",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/search")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->searchRepository->pushCriteria(new RequestCriteria($request));
        $this->searchRepository->pushCriteria(new LimitOffsetCriteria($request));
        $searches = $this->searchRepository->all();

        return $this->sendResponse($searches->toArray(), 'Searches retrieved successfully');
    }

    /**
     * @param CreatesearchAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/searches",
     *      summary="Store a newly created search in storage",
     *      tags={"search"},
     *      description="Store search",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="search that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/search")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/search"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesearchAPIRequest $request)
    {
        $input = $request->all();

        $searches = $this->searchRepository->create($input);

        return $this->sendResponse($searches->toArray(), 'Search saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/searches/{id}",
     *      summary="Display the specified search",
     *      tags={"search"},
     *      description="Get search",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of search",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/search"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var search $search */
        $search = $this->searchRepository->findWithoutFail($id);

        if (empty($search)) {
            return $this->sendError('Search not found');
        }

        return $this->sendResponse($search->toArray(), 'Search retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesearchAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/searches/{id}",
     *      summary="Update the specified search in storage",
     *      tags={"search"},
     *      description="Update search",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of search",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="search that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/search")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/search"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesearchAPIRequest $request)
    {
        $input = $request->all();

        /** @var search $search */
        $search = $this->searchRepository->findWithoutFail($id);

        if (empty($search)) {
            return $this->sendError('Search not found');
        }

        $search = $this->searchRepository->update($input, $id);

        return $this->sendResponse($search->toArray(), 'search updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/searches/{id}",
     *      summary="Remove the specified search from storage",
     *      tags={"search"},
     *      description="Delete search",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of search",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var search $search */
        $search = $this->searchRepository->findWithoutFail($id);

        if (empty($search)) {
            return $this->sendError('Search not found');
        }

        $search->delete();

        return $this->sendResponse($id, 'Search deleted successfully');
    }
}
