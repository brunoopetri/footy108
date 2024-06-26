<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\GameMatchController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\ParticipationController;
use App\Http\Controllers\Api\SystemRoleController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\PhoneController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\InvitationController;
use App\Http\Controllers\Api\GroupController;

// Rotas para User
Route::prefix('/v1')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});

// Rotas para GameMatch
Route::prefix('/v1')->group(function () {
    Route::get('/games', [GameMatchController::class, 'index']);
    Route::post('/games', [GameMatchController::class, 'store']);
    Route::get('/games/{gamematch}', [GameMatchController::class, 'show']);
    Route::put('/games/{gamematch}', [GameMatchController::class, 'update']);
    Route::delete('/games/{gamematch}', [GameMatchController::class, 'destroy']);
});

// Rotas para Team
Route::prefix('/v1')->group(function () {
    Route::get('/teams', [TeamController::class, 'index']);
    Route::post('/teams', [TeamController::class, 'store']);
    Route::get('/teams/{team}', [TeamController::class, 'show']);
    Route::put('/teams/{team}', [TeamController::class, 'update']);
    Route::delete('/teams/{team}', [TeamController::class, 'destroy']);
});

// Rotas para Player
Route::prefix('/v1')->group(function () {
    Route::get('/players', [PlayerController::class, 'index']);
    Route::post('/players', [PlayerController::class, 'store']);
    Route::get('/players/{player}', [PlayerController::class, 'show']);
    Route::put('/players/{player}', [PlayerController::class, 'update']);
    Route::delete('/players/{player}', [PlayerController::class, 'destroy']);
});

// Rotas para Participation
Route::prefix('/v1')->group(function () {
    Route::get('/participations', [ParticipationController::class, 'index']);
    Route::post('/participations', [ParticipationController::class, 'store']);
    Route::get('/participations/{participation}', [ParticipationController::class, 'show']);
    Route::put('/participations/{participation}', [ParticipationController::class, 'update']);
    Route::delete('/participations/{participation}', [ParticipationController::class, 'destroy']);
});

// Rotas para SystemRole
Route::prefix('/v1')->group(function () {
    Route::get('/systemroles', [SystemRoleController::class, 'index']);
    Route::post('/systemroles', [SystemRoleController::class, 'store']);
    Route::get('/systemroles/{systemrole}', [SystemRoleController::class, 'show']);
    Route::put('/systemroles/{systemrole}', [SystemRoleController::class, 'update']);
    Route::delete('/systemroles/{systemrole}', [SystemRoleController::class, 'destroy']);
});

// Rotas para Position
Route::prefix('/v1')->group(function () {
    Route::get('/positions', [PositionController::class, 'index']);
    Route::post('/positions', [PositionController::class, 'store']);
    Route::get('/positions/{position}', [PositionController::class, 'show']);
    Route::put('/positions/{position}', [PositionController::class, 'update']);
    Route::delete('/positions/{position}', [PositionController::class, 'destroy']);
});

// Rotas para Phone
Route::prefix('/v1')->group(function () {
    Route::get('/phones', [PhoneController::class, 'index']);
    Route::post('/phones', [PhoneController::class, 'store']);
    Route::get('/phones/{phone}', [PhoneController::class, 'show']);
    Route::put('/phones/{phone}', [PhoneController::class, 'update']);
    Route::delete('/phones/{phone}', [PhoneController::class, 'destroy']);
});

// Rotas para Location
Route::prefix('/v1')->group(function () {
    Route::get('/locations', [LocationController::class, 'index']);
    Route::post('/locations', [LocationController::class, 'store']);
    Route::get('/locations/{location}', [LocationController::class, 'show']);
    Route::put('/locations/{location}', [LocationController::class, 'update']);
    Route::delete('/locations/{location}', [LocationController::class, 'destroy']);
});

// Rotas para Invitation
Route::prefix('/v1')->group(function () {
    Route::get('/invitations', [InvitationController::class, 'index']);
    Route::post('/invitations', [InvitationController::class, 'store']);
    Route::get('/invitations/{invitation}', [InvitationController::class, 'show']);
    Route::put('/invitations/{invitation}', [InvitationController::class, 'update']);
    Route::delete('/invitations/{invitation}', [InvitationController::class, 'destroy']);
});

// Rotas para Group
Route::prefix('/v1')->group(function () {
    Route::get('/groups', [GroupController::class, 'index']);
    Route::post('/groups', [GroupController::class, 'store']);
    Route::get('/groups/{group}', [GroupController::class, 'show']);
    Route::put('/groups/{group}', [GroupController::class, 'update']);
    Route::delete('/groups/{group}', [GroupController::class, 'destroy']);
});