<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Students::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'birth' => $request->input('birth')
        ];

        $response = Students::create($data);
        return response()->json([
            'status' => 'sucess',
            'massage' => 'data stored',
            'data' => $response
        ],201);
    }

    public function update(Request $request, $id) 
    {
        $response = Students::findOrFail($id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'birth' => $request->input('birth')
        ]);
        return response()->json([
            'status' => 'sucess',
            'massage' => 'data updated',
            'data' => $response
        ],200);
    }
    
    public function delete($id)
    {
        Students::findOrFail($id)->delete();
        return response()->json([
            'status' => 'sucess',
            'massage' => 'data deleted',
        ],200);
    }
}
