<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isMemberOfATeam()
    {
        return $this->allTeams()->count() > 0;
    }

    public function isManager(): bool
    {
        return $this->attributes['role'] === "Project Manager";
    }

    public function teamByName($name)
    {
        if (!$this->isManager())
            return;
        $teams = $this->allTeams();
        foreach ($teams as $team) {
            if ($team->attributes['name'] === $name)
                return $team;
        }
    }

    public function teamIdByName($name)
    {
        if (!$this->isManager())
            return;
        $teams = $this->allTeams();
        foreach ($teams as $team) {
            if ($team->attributes['name'] === $name)
                return $team->attributes['id'];
        }
    }

    public function isAdmin($teamId)
    {
        $team = Team::find($teamId);
        $user_id = auth()->user()->id;
        $data = DB::table('team_user')->
        select("role")->whereRaw("team_id = ? and user_id = ?", [$teamId, $user_id])->get();
        return $data;
        foreach ($data as $role) {

            return $role === "admin";
        }
        return False;
    }

    public function belongsToProject($project)
    {
        $user_id = auth()->user()->id;
        $data = DB::table('team_user')->
        select("role")->whereRaw("team_id = ? and user_id = ?;",
            [ $project->team_id, $user_id])->get();

        foreach ($data as $role) {
            return True;
        }
        return False;
    }
}
