<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function index(){
        return view('status.index');
    }

    public function create(){
        return view('status.create');
    }

    public function store(Request $request){
        $viewData = $request->validate([
            'status_name' => 'required'
        ]);

        $status = Status::create($viewData);

        return redirect()->route('status.index')->with('success', 'Status has been added successfully');
    }
}
