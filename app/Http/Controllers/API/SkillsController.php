<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Skill\StoreRequest;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use App\Http\Requests\Skill\UpdateRequest;

class SkillsController extends Controller {
    /**
     * Return a list of skills
     *
     * @return array
     */
    public function index() {

        $skills = SkillResource::collection(Skill::all());
        $count = count($skills);

        return response()->json(compact('skills','count'), 200);
    }

    /**
     * Return a skill's details
     *
     * @param Skill $skill
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Skill $skill) {

        $skill =  new SkillResource($skill);

        return response()->json(compact('skill'), 200);
    }

    /**
     * Create a new skill
     *
     * @param StoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
        public function store(StoreRequest $request) {

        $skillCreated = Skill::create($request->only('title'));
        $skill = new SkillResource($skillCreated);

        return response()->json(compact('skill'), 200);
    }

    /**
     * Update a specific skill
     *
     * @param UpdateRequest $request
     * @param Skill         $skill
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Skill $skill) {

        $skill->update($request->only('title'));

        return response()->json(null, 204);
    }

    /**
     * Delete a specific user
     *
     * @param Skill $skill
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Skill $skill) {

        $skill->delete();

        return response()->json(null, 204);
    }
}
