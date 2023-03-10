<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\Department\DepartmentCollection;
use App\Http\Resources\Department\DepartmentResource;
use App\Models\Department;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DepartmentCollection(Department::withCount([
            'users' => function ($query) {
                $query->where('role', 'staff');
            }
        ])->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        return new DepartmentResource(Department::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return new DepartmentResource($department->load('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\DepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $department->name = $request->validated()['name'];
        $department->coordinator_id = $request->validated()['coordinator_id'];
        if ($department->isDirty()) {
            $department->update($request->validated());
            return new DepartmentResource($department);
        }
        return new JsonResponse([
            'message' => 'The data was not changed'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return response()->noContent();
    }
}
