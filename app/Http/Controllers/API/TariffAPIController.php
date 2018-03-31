<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTariffAPIRequest;
use App\Http\Requests\API\UpdateTariffAPIRequest;
use App\Models\Tariff;
use App\Repositories\TariffRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TariffController
 * @package App\Http\Controllers\API
 */

class TariffAPIController extends AppBaseController
{
    /** @var  TariffRepository */
    private $tariffRepository;

    public function __construct(TariffRepository $tariffRepo)
    {
        $this->tariffRepository = $tariffRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tariffs",
     *      summary="Get a listing of the Tariffs.",
     *      tags={"Tariff"},
     *      description="Get all Tariffs",
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
     *                  @SWG\Items(ref="#/definitions/Tariff")
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
        $this->tariffRepository->pushCriteria(new RequestCriteria($request));
        $this->tariffRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tariffs = $this->tariffRepository->all();

        return $this->sendResponse($tariffs->toArray(), 'Tariffs retrieved successfully');
    }

    /**
     * @param CreateTariffAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tariffs",
     *      summary="Store a newly created Tariff in storage",
     *      tags={"Tariff"},
     *      description="Store Tariff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Tariff that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Tariff")
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
     *                  ref="#/definitions/Tariff"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTariffAPIRequest $request)
    {
        $input = $request->all();

        $tariffs = $this->tariffRepository->create($input);

        return $this->sendResponse($tariffs->toArray(), 'Tariff saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tariffs/{id}",
     *      summary="Display the specified Tariff",
     *      tags={"Tariff"},
     *      description="Get Tariff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tariff",
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
     *                  ref="#/definitions/Tariff"
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
        /** @var Tariff $tariff */
        $tariff = $this->tariffRepository->findWithoutFail($id);

        if (empty($tariff)) {
            return $this->sendError('Tariff not found');
        }

        return $this->sendResponse($tariff->toArray(), 'Tariff retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTariffAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tariffs/{id}",
     *      summary="Update the specified Tariff in storage",
     *      tags={"Tariff"},
     *      description="Update Tariff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tariff",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Tariff that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Tariff")
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
     *                  ref="#/definitions/Tariff"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTariffAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tariff $tariff */
        $tariff = $this->tariffRepository->findWithoutFail($id);

        if (empty($tariff)) {
            return $this->sendError('Tariff not found');
        }

        $tariff = $this->tariffRepository->update($input, $id);

        return $this->sendResponse($tariff->toArray(), 'Tariff updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tariffs/{id}",
     *      summary="Remove the specified Tariff from storage",
     *      tags={"Tariff"},
     *      description="Delete Tariff",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tariff",
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
        /** @var Tariff $tariff */
        $tariff = $this->tariffRepository->findWithoutFail($id);

        if (empty($tariff)) {
            return $this->sendError('Tariff not found');
        }

        $tariff->delete();

        return $this->sendResponse($id, 'Tariff deleted successfully');
    }
}
