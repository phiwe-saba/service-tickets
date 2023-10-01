<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Status;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $user = Auth::user();

        $tickets = $user->tickets;
        $tickets = Ticket::with('user')->get();
        $tickets = Ticket::with('department')->get();
        $tickets = Ticket::with('status')->get();

        return view('admin.index', compact('tickets'));
    }

    /* Function to show the ticket details (in detail)*/
    public function show($id)
    {
        $ticket = Ticket::find($id);

        return view('admin.show', compact('ticket' ));
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

        //find the details of the user logging the ticket
        $user = User::where('email', $viewData['email'])->first();

        //to ensure that the logged in user doesn't log a ticket using different credentials.
        if(!$user){
            return redirect()->back()->with('error', 'User not found.');
        }

        //creating a new ticket
        $ticket = new Ticket([
            'name' => $viewData['name'],
            'surname' => $viewData['surname'],
            'email' => $viewData['email'],
            'department_id' => $viewData['department_id'],
            'status_id' => $viewData['status_id'],
            'description' => $viewData['description'],
            'date_logged' => $viewData['date_logged'],
        ]);

        $user->ticket()->save($ticket);

        //$user->notify(new TicketNotification($ticket)); //notification to send via email

        return redirect()->route('ticket.index')->with('success', 'Ticket successfully logged');
    }

    /* Retrieve the data based on the id */
    public function edit($id){
        $ticket = Ticket::findOrFail($id);
        $users = User::findOrFail($id);
        $departments = Department::all();
        $statuses = Status::all();

        return view('admin.edit', compact('ticket', 'departments', 'statuses', 'users'));
    }
    
    //Function to update the status and department
    public function update(Request $request, $id){
        $ticket = Ticket::find($id);

        /*$viewData = $request->validate([
            'department' => 'required|exists:departments,id',
            'status' => 'required|exists:statuses,id',
        ]);*/

        $ticket->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'department_id' => $request->input('department_id'),
            'status_id' => $request->input('status_id'),
            //'description' => $request
        ]);

        return redirect()->route('admin.show', ['id' => $ticket->id])->with('success', 'Ticket successfully updated');
    }
}
