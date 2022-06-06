<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Documents;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::count();
        $documents = Documents::count();
        $approve = Documents::where('status_id',2)->count();
        $process = Documents::where('status_id',1)->count();
        return view('dashboard', compact('user','documents','approve','process'));
    }
}
