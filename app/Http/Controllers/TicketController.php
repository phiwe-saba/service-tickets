<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Status;
use App\Models\User;
use App\Models\Ticket;
use App\Notifications\TicketNotification;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $user = Auth::user();

        $tickets = $user->tickets;
        $tickets = Ticket::with('user')->get();
        $tickets = Ticket::with('department')->get();
        $tickets = Ticket::with('status')->get();

        return view('ticket.index', compact('tickets'));
    }

    /* Function to show the ticket details (in detail)*/
    public function show()
    {
        return view('ticket.show');
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

}
