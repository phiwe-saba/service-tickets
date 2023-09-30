<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index(){
        return view('department.index');
    }

    public function create(){
        return view('department.create');
    }

    public function store(Request $request){
        $viewData = $request->validate([
            'dep_name' => 'required'
        ]);

        $department = Department::create($viewData);
        
        return redirect()->route('department.index')->with('success', 'Department has been added successfully');
    }
}
