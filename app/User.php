<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Article;
use DB;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'realName', 'email', 'phoneNumber', 'password', 'picture', 'lastLogin', 'lastIp', 'aboutMe', 'role_id', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeIsContributorBlog($query, $id){
        return $query
            ->where('id', $id)
            ->where('role_id', '1')
            ->get();
    }

    public function scopeIsAdminBlog($query, $id){
        return $query
            ->where('id', $id)
            ->where('role_id', '2')
            ->get();
    }

    public function scopeIsAdminHead($query, $id){
        return $query
            ->where('id', $id)
            ->where('role_id', '3')
            ->get();
    }

    public function article(){
        return $this->hasOne(Article::class);
    }

    public function scopeGetSumContributor($query){
        return $query
            ->where('role_id', '1')
            ->select(DB::raw('count(id) as countUser, max(created_at) as created_at'))
            ->get();
    }
}
