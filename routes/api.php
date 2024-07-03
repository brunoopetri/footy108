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

// Routes for User
Route::prefix('/v1')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}', [UserController::class, 'show']); // Alterado {id} para {user}
    Route::put('/users/{user}', [UserController::class, 'update']); // Alterado {id} para {user}
    Route::delete('/users/{user}', [UserController::class, 'destroy']); // Alterado {id} para {user}
});

// Routes for GameMatch
Route::prefix('/v1')->group(function () {
    Route::get('/gamematches', [GameMatchController::class, 'index']);
    Route::post('/gamematches', [GameMatchController::class, 'store']);
    Route::get('/gamematches/{gamematch}', [GameMatchController::class, 'show']);
    Route::put('/gamematches/{gamematch}', [GameMatchController::class, 'update']);
    Route::delete('/gamematches/{gamematch}', [GameMatchController::class, 'destroy']);
});

// Routes for Team
Route::prefix('/v1')->group(function () {
    Route::get('/teams', [TeamController::class, 'index']);
    Route::post('/teams', [TeamController::class, 'store']);
    Route::get('/teams/{team}', [TeamController::class, 'show']);
    Route::put('/teams/{team}', [TeamController::class, 'update']);
    Route::delete('/teams/{team}', [TeamController::class, 'destroy']);
});

// Routes for Player
Route::prefix('/v1')->group(function () {
    Route::get('/players', [PlayerController::class, 'index']);
    Route::post('/players', [PlayerController::class, 'store']);
    Route::get('/players/{player}', [PlayerController::class, 'show']);
    Route::put('/players/{player}', [PlayerController::class, 'update']);
    Route::delete('/players/{player}', [PlayerController::class, 'destroy']);
});

// Routes for Participation
Route::prefix('/v1')->group(function () {
    Route::get('/participations', [ParticipationController::class, 'index']);
    Route::post('/participations', [ParticipationController::class, 'store']);
    Route::get('/participations/{participation}', [ParticipationController::class, 'show']);
    Route::put('/participations/{participation}', [ParticipationController::class, 'update']);
    Route::delete('/participations/{participation}', [ParticipationController::class, 'destroy']);
});

// Routes for SystemRole
Route::prefix('/v1')->group(function () {
    Route::get('/systemroles', [SystemRoleController::class, 'index']);
    Route::post('/systemroles', [SystemRoleController::class, 'store']);
    Route::get('/systemroles/{systemrole}', [SystemRoleController::class, 'show']);
    Route::put('/systemroles/{systemrole}', [SystemRoleController::class, 'update']);
    Route::delete('/systemroles/{systemrole}', [SystemRoleController::class, 'destroy']);
});

// Routes for Position
Route::prefix('/v1')->group(function () {
    Route::get('/positions', [PositionController::class, 'index']);
    Route::post('/positions', [PositionController::class, 'store']);
    Route::get('/positions/{position}', [PositionController::class, 'show']);
    Route::put('/positions/{position}', [PositionController::class, 'update']);
    Route::delete('/positions/{position}', [PositionController::class, 'destroy']);
});

// Routes for Phone
Route::prefix('/v1')->group(function () {
    Route::get('/phones', [PhoneController::class, 'index']);
    Route::post('/phones', [PhoneController::class, 'store']);
    Route::get('/phones/{phone}', [PhoneController::class, 'show']);
    Route::put('/phones/{phone}', [PhoneController::class, 'update']);
    Route::delete('/phones/{phone}', [PhoneController::class, 'destroy']);
});

// Routes for Location
Route::prefix('/v1')->group(function () {
    Route::get('/locations', [LocationController::class, 'index']);
    Route::post('/locations', [LocationController::class, 'store']);
    Route::get('/locations/{location}', [LocationController::class, 'show']);
    Route::put('/locations/{location}', [LocationController::class, 'update']);
    Route::delete('/locations/{location}', [LocationController::class, 'destroy']);
});

// Routes for Invitation
Route::prefix('/v1')->group(function () {
    Route::get('/invitations', [InvitationController::class, 'index']);
    Route::post('/invitations', [InvitationController::class, 'store']);
    Route::get('/invitations/{invitation}', [InvitationController::class, 'show']);
    Route::put('/invitations/{invitation}', [InvitationController::class, 'update']);
    Route::delete('/invitations/{invitation}', [InvitationController::class, 'destroy']);
});

// Routes for Group
Route::prefix('/v1')->group(function () {
    Route::get('/groups', [GroupController::class, 'index']);
    Route::post('/groups', [GroupController::class, 'store']);
    Route::get('/groups/{group}', [GroupController::class, 'show']);
    Route::put('/groups/{group}', [GroupController::class, 'update']);
    Route::delete('/groups/{group}', [GroupController::class, 'destroy']);
});
