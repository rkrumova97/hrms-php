<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $data = DB::table('employees')->where('show', true)->get();
        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function archive(): JsonResponse
    {
        $data = (new Employee)->where('show', false)->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $employee = new Employee([
            'firstName' => $request->get('firstName'),
            'middleName' => $request->get('middleName'),
            'lastName' => $request->get('lastName'),
            'age' => $request->get('age'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'salary' => $request->get('salary'),
            'start_date' => $request->get('start_date'),
            'vacation_days' => $request->get('vacation_days'),
            'working_hours' => $request->get('working_hours'),
            'working_days' => $request->get('working_days'),
            'grade' => $request->get('grade'),
            'skill' => $request->get('skill'),
            'show' => $request->get('show'),
            'position' => $request->get('position'),
            'username_id' => $request->get('username'),
            'jobId' => $request->get('jobId'),
            'jobName' => $request->get('jobName'),
            'iban' => $request->get('iban')
        ]);
        $employee->save();
        return response()->json('Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id): JsonResponse
    {
        $data = (new Employee)->find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Employee $employee
     * @return JsonResponse
     */
    public function update(Request $request, Employee $employee): JsonResponse
    {
        $employee->update([
            'firstName' => $request->firstName,
            'id' => $request->id,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
            'email' => $request->email,
            'salary' => $request->salary,
            'start_date' => $request->startDate,
            'vacation_days' => $request->vacationDays,
            'working_hours' => $request->workingHours,
            'working_days' => $request->workingDays,
            'grade' => $request->get('grade'),
            'skill' => $request->skill,
            'show' => $request->show,
            'position' => $request->position,
            'username' => $request->username,
            'jobId' => $request->jobId,
            'jobName' => $request->jobName,
            'iban' => $request->iban
        ]);

        return response()->json([
            'message' => "Successfully updated",
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public
    function destroy(int $id)
    {
        $employee = (new Employee)->find($id);
        $employee->show = false;
        $employee->save();

        return $employee;
    }
}
