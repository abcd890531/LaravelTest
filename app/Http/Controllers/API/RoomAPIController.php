<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRoomAPIRequest;
use App\Http\Requests\API\UpdateRoomAPIRequest;
use App\Models\Room;
use App\Repositories\RoomRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RoomController
 * @package App\Http\Controllers\API
 */

class RoomAPIController extends AppBaseController
{
    /** @var  RoomRepository */
    private $roomRepository;

    public function __construct(RoomRepository $roomRepo)
    {
        $this->roomRepository = $roomRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/rooms",
     *      summary="Get a listing of the Rooms.",
     *      tags={"Room"},
     *      description="Get all Rooms",
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
     *                  @SWG\Items(ref="#/definitions/Room")
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
        $this->roomRepository->pushCriteria(new RequestCriteria($request));
        $this->roomRepository->pushCriteria(new LimitOffsetCriteria($request));
        $rooms = $this->roomRepository->all();

        return $this->sendResponse($rooms->toArray(), 'Rooms retrieved successfully');
    }

    /**
     * @param CreateRoomAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/rooms",
     *      summary="Store a newly created Room in storage",
     *      tags={"Room"},
     *      description="Store Room",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Room that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Room")
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
     *                  ref="#/definitions/Room"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRoomAPIRequest $request)
    {
        $input = $request->all();

        $rooms = $this->roomRepository->create($input);

        return $this->sendResponse($rooms->toArray(), 'Room saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/rooms/{id}",
     *      summary="Display the specified Room",
     *      tags={"Room"},
     *      description="Get Room",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Room",
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
     *                  ref="#/definitions/Room"
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
        /** @var Room $room */
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            return $this->sendError('Room not found');
        }

        return $this->sendResponse($room->toArray(), 'Room retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRoomAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/rooms/{id}",
     *      summary="Update the specified Room in storage",
     *      tags={"Room"},
     *      description="Update Room",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Room",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Room that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Room")
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
     *                  ref="#/definitions/Room"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRoomAPIRequest $request)
    {
        $input = $request->all();

        /** @var Room $room */
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            return $this->sendError('Room not found');
        }

        $room = $this->roomRepository->update($input, $id);

        return $this->sendResponse($room->toArray(), 'Room updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/rooms/{id}",
     *      summary="Remove the specified Room from storage",
     *      tags={"Room"},
     *      description="Delete Room",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Room",
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
        /** @var Room $room */
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            return $this->sendError('Room not found');
        }

        $room->delete();

        return $this->sendResponse($id, 'Room deleted successfully');
    }
}
