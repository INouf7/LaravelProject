<?php

namespace App\Http\Controllers;


use App\Actions\Jetstream\CreateTeam;
use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;

class ProjectController extends Controller
{
    function create(Request $request){

        (new CreateTeam)->create(auth()->user(), ['name' => $request->title . " team"]);

        $teamID  = auth()->user()->teamIdByName($request->title . " team");

        Project::create(['title'=>$request->title, 'type'=>$request->type,
            'client'=>$request->client, 'team_id'=>$teamID]);
         return app('App\Http\Controllers\Dashboard')->render();
    }

    public function delete(Request $request)
    {
        $project = Project::find($request->id);
        $team = Team::find($project->team_id);
        $project->delete();
        $team->delete();
        return back();
    }
    public function edit(Request $request){
        $project = Project::find($request->id);
        $team = Team::find($project->team_id);
        return view('project.edit', compact(["project", 'team']));
    }
    public function view(Request $request){
        $project = Project::find($request->id);
        $team = Team::find($project->team_id);
        return view('project.view', compact(["project", 'team']));
    }
}
