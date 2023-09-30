<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Status;
use App\Models\User;
use App\Models\Ticket;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        return view('ticket.index');
    }

    /* function to create the create page */
    public function create(){
        $users = User::all();
        $departments = Department::all();
        $statuses = Status::all();

        return view('ticket.create', compact('users', 'departments', 'statuses'));
    }

    /* function to store data to the database */
    public function store(Request $request){
        $viewData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'department_id' => 'required|exists:departments,id',
            'status_id' => 'required|exists:statuses,id',
            'description' => 'required',
            'date_logged' => 'required'
        ]);

        $user = User::where('email', $viewData['email'])->first();

        if(!$user){
            return redirect()->back()->with('error', 'User not found.');
        }

        $ticket = new Ticket([
            'name' => $viewData['name'],
            'surname' => $viewData['surname'],
            'email' => $viewData['email'],
            'department_id' => $viewData['department_id'],
            'status_id' => $viewData['status_id'],
            'description' => $viewData['description'],
            'date_logged' => $viewData['date_logged'],
        ]);

        //$ticket->departments()->associate($viewData['department']);
        //$ticket->statuses()->associate($viewData['status']);
        //dd($ticket);
        //$user->ticket()->save($ticket);
        //$ticket->department()->associate(Department::firstOrCreate(['dep_name' => $viewData['department']]));
        //$ticket->status()->associate(Status::firstOrCreate(['status_name' => $viewData['status']]));
        $user->ticket()->save($ticket);
        //dd($ticket);
        return redirect()->route('ticket.index')->with('success', 'Ticket successfully logged');
    }
}
