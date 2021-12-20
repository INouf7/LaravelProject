<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function render(){
        $projects = Project::all();
        return view('dashboard', compact('projects'));
    }
}
