<?php

namespace App\Http\Controllers;


use App\Actions\Jetstream\CreateTeam;
use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;

class CreateProject extends Controller
{
    function create(Request $request){


        (new CreateTeam)->create(auth()->user(), ['name' => $request->title . " team"]);

        $teamID  = auth()->user()->teamIdByName($request->title . " team");


        Project::create(['title'=>$request->title, 'type'=>$request->type,
            'client'=>$request->client, 'team_id'=>$teamID]);
        return view('dashboard');
    }
}
