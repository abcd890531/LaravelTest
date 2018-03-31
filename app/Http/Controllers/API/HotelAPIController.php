<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHotelAPIRequest;
use App\Http\Requests\API\UpdateHotelAPIRequest;
use App\Models\Hotel;
use App\Repositories\HotelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class HotelController
 * @package App\Http\Controllers\API
 */

class HotelAPIController extends AppBaseController
{
    /** @var  HotelRepository */
    private $hotelRepository;

    public function __construct(HotelRepository $hotelRepo)
    {
        $this->hotelRepository = $hotelRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/hotels",
     *      summary="Get a listing of the Hotels.",
     *      tags={"Hotel"},
     *      description="Get all Hotels",
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
     *                  @SWG\Items(ref="#/definitions/Hotel")
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
        $this->hotelRepository->pushCriteria(new RequestCriteria($request));
        $this->hotelRepository->pushCriteria(new LimitOffsetCriteria($request));
        $hotels = $this->hotelRepository->all();

        return $this->sendResponse($hotels->toArray(), 'Hotels retrieved successfully');
    }

    /**
     * @param CreateHotelAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/hotels",
     *      summary="Store a newly created Hotel in storage",
     *      tags={"Hotel"},
     *      description="Store Hotel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Hotel that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Hotel")
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
     *                  ref="#/definitions/Hotel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateHotelAPIRequest $request)
    {
        $input = $request->all();

        $hotels = $this->hotelRepository->create($input);

        return $this->sendResponse($hotels->toArray(), 'Hotel saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/hotels/{id}",
     *      summary="Display the specified Hotel",
     *      tags={"Hotel"},
     *      description="Get Hotel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Hotel",
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
     *                  ref="#/definitions/Hotel"
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
        /** @var Hotel $hotel */
        $hotel = $this->hotelRepository->findWithoutFail($id);

        if (empty($hotel)) {
            return $this->sendError('Hotel not found');
        }

        return $this->sendResponse($hotel->toArray(), 'Hotel retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateHotelAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/hotels/{id}",
     *      summary="Update the specified Hotel in storage",
     *      tags={"Hotel"},
     *      description="Update Hotel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Hotel",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Hotel that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Hotel")
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
     *                  ref="#/definitions/Hotel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateHotelAPIRequest $request)
    {
        $input = $request->all();

        /** @var Hotel $hotel */
        $hotel = $this->hotelRepository->findWithoutFail($id);

        if (empty($hotel)) {
            return $this->sendError('Hotel not found');
        }

        $hotel = $this->hotelRepository->update($input, $id);

        return $this->sendResponse($hotel->toArray(), 'Hotel updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/hotels/{id}",
     *      summary="Remove the specified Hotel from storage",
     *      tags={"Hotel"},
     *      description="Delete Hotel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Hotel",
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
        /** @var Hotel $hotel */
        $hotel = $this->hotelRepository->findWithoutFail($id);

        if (empty($hotel)) {
            return $this->sendError('Hotel not found');
        }

        $hotel->delete();

        return $this->sendResponse($id, 'Hotel deleted successfully');
    }
}
