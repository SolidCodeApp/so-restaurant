<?php

use App\Domains\SoExample\Http\Controllers\SoDomainExampleController;
use So\Route\SoRoute;

/**
 * API routes for managing agentTargets.
 *
 * Defines RESTful endpoints for agentTargets, all protected by Sanctum authentication middleware.
 * Supports listing, viewing, creating, updating, deleting, and searching agentTargets.
 *
 * @package App\Domains\AgentTarget
 * @author Samano CASTRE
 * @date 2025-07-23
 */

// routes/api.php
return SoRoute::controller(SoDomainExampleController::class)
    ->prefix('examples')
    ->doIndex()
    ->doShow()
    ->doDestroy()
    ->doRestore()
    ->doSearch()
    ->doTouchSince()
    ->doStore()
    ->doUpdate();
