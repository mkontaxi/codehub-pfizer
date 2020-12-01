<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersVacation\StoreRequest;
use App\Http\Requests\UsersVacation\UpdateRequest;
use App\Http\Resources\VacationResource;
use App\Models\User;
use App\Models\Vacation;

class UsersVacationsController extends Controller {

    /**
     * Get a specific user's vacations
     *
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(User $user) {

        $user->load('vacations');
        $vacations = VacationResource::collection($user->vacations);

        return response()->json(compact('vacations'), 200);
    }

    /**
     * Show a user's vacation details
     *
     * @param User     $user
     * @param Vacation $vacation
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user, Vacation $vacation) {

        $vacation = new VacationResource($vacation);

        return response()->json(compact('vacation'), 200);
    }

    /**
     * Attach a new vacation to a user
     *
     * @param User         $user
     * @param StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(User $user, StoreRequest $request) {

        $user->vacations()->create($request->only('from', 'to'));

        $user->load('vacations');
        $vacations = VacationResource::collection($user->vacations);

        return response()->json(compact('vacations'), 200);
    }

    /**
     * Update a user's vacation
     *
     * @param User          $user
     * @param Vacation      $vacation
     * @param UpdateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(User $user, Vacation $vacation, UpdateRequest $request) {

        $vacation->update($request->only('from', 'to'));
        return response()->json(null, 204);
    }

    /**
     * Delete a user's vacation
     *
     * @param User     $user
     * @param Vacation $vacation
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(User $user, Vacation $vacation) {

        $vacation->delete();

        return response()->json(null, 204);
    }
}
