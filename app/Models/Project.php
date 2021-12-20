<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\HasTeams;

class Project extends Model
{
    use HasFactory;
    use HasTeams;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title', 'team_id', 'start','end','duration','cost','client','stage','status','type',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];


    public function team()
    {
        return $this->belongsTo(Team::class,"team_id","id");
    }

    public function delete()
    {
        return parent::delete(); // TODO: Change the autogenerated stub
    }

    protected $table = 'project_table';

}
