<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $tasks = Task::where('user_id', '=', ((Auth()->user()->id)))
        ->where('task_status', '=', 0)
        ->paginate(7);
        return view('home',['tasks'=>$tasks]);
        
    }
}
