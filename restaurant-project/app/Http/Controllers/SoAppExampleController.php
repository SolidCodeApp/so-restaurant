<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use So\Http\Controllers\SoController;
use Illuminate\Http\Request;
use So\Http\Requests\SoSearchRequest;

/**
 * Class SoAppExampleController
 *
 * Central application controller exposing all endpoints
 *
 * Acts as a boundary layer between HTTP requests and application services.
 *
 * @author Samano CASTRE
 * @date 2025-07-20
 */
class SoAppExampleController extends SoController
{
    public function doIndex(Request $request): JsonResponse
    {
        return $this->doSuccess('Soravel App: "Index" is working!');
    }

    /** Retrieves resources since a given date */
    public function doTouchSince(Request $request): JsonResponse {
        return $this->doSuccess('Soravel App: "Since" is working!');
    }

    /** Stores a new resource */
    public function doStore(Request $request): JsonResponse {
        return $this->doSuccess('Soravel App: "Store" is working!');
    }

    /** Updates an existing resource */
    public function doUpdate(Request $request, ?int $id = null): JsonResponse {
         return $this->doSuccess('Soravel App: "Update" is working!');
    }

    /** Retrieves a single resource by ID */
    public function doShow(Request $request, ?int $id = null): JsonResponse {
         return $this->doSuccess('Soravel App: "Show" is working!');
    }

    /** Restores a soft-deleted resource */
    public function doRestore(Request $request, ?int $id = null): JsonResponse {
        return $this->doSuccess('Soravel App: "Restore" is working!');
    }

    /** Deletes a resource (soft or hard depending on engine logic) */
    public function doDestroy(Request $request, ?int $id = null): JsonResponse {
        return $this->doSuccess('Soravel App: "Destroy" is working!');
    }

    /** Performs a search request */
    public function doSearch(SoSearchRequest $request): JsonResponse {
        return $this->doSuccess('Soravel App: "Search" is working!');
    }
}