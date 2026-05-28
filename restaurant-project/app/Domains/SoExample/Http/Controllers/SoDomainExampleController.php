<?php

namespace App\Domains\SoExample\Http\Controllers;

use Illuminate\Http\JsonResponse;
use So\Http\Controllers\SoController;
use Illuminate\Http\Request;
use So\Http\Requests\SoSearchRequest;


/**
 * Class SoDomainExampleController
 *
 * Exposes HTTP endpoints for managing properties. Handles operations such as
 * creation, update, retrieval, deletion, and searching. 
 *
 * @package App\Domains\SoExample\Http\Controllers
 * @author Samano CASTRE
 * @date 2025-07-23
 */
class SoDomainExampleController extends SoController
{
    public function doIndex(Request $request): JsonResponse
    {
        return $this->doSuccess('SoRavel Domain : "Index" is working!');
    }

    /** Retrieves resources since a given date */
    public function doTouchSince(Request $request): JsonResponse {
        return $this->doSuccess('SoRavel Domain : "Since" is working!');
    }

    /** Stores a new resource */
    public function doStore(Request $request): JsonResponse {
        return $this->doSuccess('SoRavel Domain : "Store" is working!');
    }

    /** Updates an existing resource */
    public function doUpdate(Request $request, ?int $id = null): JsonResponse {
         return $this->doSuccess('SoRavel Domain : "Update" is working!');
    }

    /** Retrieves a single resource by ID */
    public function doShow(Request $request, ?int $id = null): JsonResponse {
         return $this->doSuccess('SoRavel Domain : "Show" is working!');
    }

    /** Restores a soft-deleted resource */
    public function doRestore(Request $request, ?int $id = null): JsonResponse {
        return $this->doSuccess('SoRavel Domain : "Restore" is working!');
    }

    /** Deletes a resource (soft or hard depending on engine logic) */
    public function doDestroy(Request $request, ?int $id = null): JsonResponse {
        return $this->doSuccess('SoRavel Domain : "Destroy" is working!');
    }

    /** Performs a search request */
    public function doSearch(SoSearchRequest $request): JsonResponse {
        return $this->doSuccess('SoRavel Domain : "Search" is working!');
    }
}