<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function gravatar($size = '100'){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }
    public static function boot(){
        parent::boot();
        static::creating(function ($user){
            $user->activation_token = Str::random(10);
        });
    }
    /*一个用户可以有多条微博*/
    public function statuses(){
        return $this->hasMany(Status::class);
    }
    /*该方法将当前用户发布过的所有微博从数据库中取出，并根据创建时间来倒序排序*/
    public function feed(){
        $user_ids = $this->followings->pluck('id')->toArray();
        array_push($user_ids, $this->id);
        return Status::whereIn('user_id',$user_ids)
                            ->with('user')
                            ->orderBy('created_at','desc');
    }
    /*粉丝表*/
    public function followers(){
        return $this->belongsToMany(User::Class,'followers','user_id','followers_id');
    }
    /*用户关注的人*/
    public function followings(){
        return $this->belongsToMany(User::Class,'followers','followers_id','user_id');
    }
    /*关注*/
    public function follow($user_ids){
        if(!is_array($user_ids)){
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids,false);
    }
    /*取消关注*/
    public function unfollow($user_ids){
        if(!is_array($user_ids)){
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }
    /*判断用户是否关注了某个人*/
    public function isFollowing($user_id){
        return $this->followings->contains($user_id);
    }
}
