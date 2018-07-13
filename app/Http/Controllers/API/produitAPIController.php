<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateproduitAPIRequest;
use App\Http\Requests\API\UpdateproduitAPIRequest;
use App\Models\produit;
use App\Repositories\produitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class produitController
 * @package App\Http\Controllers\API
 */

class produitAPIController extends AppBaseController
{
    /** @var  produitRepository */
    private $produitRepository;

    public function __construct(produitRepository $produitRepo)
    {
        $this->produitRepository = $produitRepo;
    }

    /**
     * Display a listing of the produit.
     * GET|HEAD /produits
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->produitRepository->pushCriteria(new RequestCriteria($request));
        $this->produitRepository->pushCriteria(new LimitOffsetCriteria($request));
        $produits = $this->produitRepository->all();

        return $this->sendResponse($produits->toArray(), 'Produits retrieved successfully');
    }

    /**
     * Store a newly created produit in storage.
     * POST /produits
     *
     * @param CreateproduitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateproduitAPIRequest $request)
    {
        $input = $request->all();

        $produits = $this->produitRepository->create($input);

        return $this->sendResponse($produits->toArray(), 'Produit saved successfully');
    }

    /**
     * Display the specified produit.
     * GET|HEAD /produits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var produit $produit */
        $produit = $this->produitRepository->findWithoutFail($id);

        if (empty($produit)) {
            return $this->sendError('Produit not found');
        }

        return $this->sendResponse($produit->toArray(), 'Produit retrieved successfully');
    }

    /**
     * Update the specified produit in storage.
     * PUT/PATCH /produits/{id}
     *
     * @param  int $id
     * @param UpdateproduitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproduitAPIRequest $request)
    {
        $input = $request->all();

        /** @var produit $produit */
        $produit = $this->produitRepository->findWithoutFail($id);

        if (empty($produit)) {
            return $this->sendError('Produit not found');
        }

        $produit = $this->produitRepository->update($input, $id);

        return $this->sendResponse($produit->toArray(), 'produit updated successfully');
    }

    /**
     * Remove the specified produit from storage.
     * DELETE /produits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var produit $produit */
        $produit = $this->produitRepository->findWithoutFail($id);

        if (empty($produit)) {
            return $this->sendError('Produit not found');
        }

        $produit->delete();

        return $this->sendResponse($id, 'Produit deleted successfully');
    }
}
