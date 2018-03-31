<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatebookingAPIRequest;
use App\Http\Requests\API\UpdatebookingAPIRequest;
use App\Models\booking;
use App\Repositories\bookingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class bookingController
 * @package App\Http\Controllers\API
 */

class bookingAPIController extends AppBaseController
{
    /** @var  bookingRepository */
    private $bookingRepository;

    public function __construct(bookingRepository $bookingRepo)
    {
        $this->bookingRepository = $bookingRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/bookings",
     *      summary="Get a listing of the bookings.",
     *      tags={"booking"},
     *      description="Get all bookings",
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
     *                  @SWG\Items(ref="#/definitions/booking")
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
        $this->bookingRepository->pushCriteria(new RequestCriteria($request));
        $this->bookingRepository->pushCriteria(new LimitOffsetCriteria($request));
        $bookings = $this->bookingRepository->all();

        return $this->sendResponse($bookings->toArray(), 'Bookings retrieved successfully');
    }

    /**
     * @param CreatebookingAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/bookings",
     *      summary="Store a newly created booking in storage",
     *      tags={"booking"},
     *      description="Store booking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="booking that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/booking")
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
     *                  ref="#/definitions/booking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatebookingAPIRequest $request)
    {
        $input = $request->all();

        $bookings = $this->bookingRepository->create($input);

        return $this->sendResponse($bookings->toArray(), 'Booking saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/bookings/{id}",
     *      summary="Display the specified booking",
     *      tags={"booking"},
     *      description="Get booking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of booking",
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
     *                  ref="#/definitions/booking"
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
        /** @var booking $booking */
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }

        return $this->sendResponse($booking->toArray(), 'Booking retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatebookingAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/bookings/{id}",
     *      summary="Update the specified booking in storage",
     *      tags={"booking"},
     *      description="Update booking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of booking",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="booking that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/booking")
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
     *                  ref="#/definitions/booking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatebookingAPIRequest $request)
    {
        $input = $request->all();

        /** @var booking $booking */
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }

        $booking = $this->bookingRepository->update($input, $id);

        return $this->sendResponse($booking->toArray(), 'booking updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/bookings/{id}",
     *      summary="Remove the specified booking from storage",
     *      tags={"booking"},
     *      description="Delete booking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of booking",
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
        /** @var booking $booking */
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            return $this->sendError('Booking not found');
        }

        $booking->delete();

        return $this->sendResponse($id, 'Booking deleted successfully');
    }
}
