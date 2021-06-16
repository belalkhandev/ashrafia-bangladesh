<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Many to many relation between users and roles
     *
     * @return object|array - roles that belongs to current user
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }

    /**
     * Get single role to verify permission, as it has a many to many relationship
     *
     * @return object|array - roles that belongs to current user
     */
    public function role()
    {
        return $this->roles()->first();
    }

    /**
     * Check if current user has specific roles
     *
     * @param string|object|array $role
     * @return bool
     */
    public function hasRole($role, $requireAll = false)
    {
        if (is_object($role)) {
            $role = $role->name;
        }
        if (is_array($role)) {
            if(!isset($role['name'])) {
                return $this->hasRoles($role, $requireAll);
            }

            $role = $role['name'];
        }

        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    /**
     * Check if current user has multiple roles.
     *
     * @param mixed $roles
     * @param bool $requireAll (optional) - if all roles are required
     * @return bool
     */
    public function hasRoles($roles, $requireAll = false)
    {
        foreach ($roles as $role) {
            $hasRol = $this->hasRole($role);

            if ($hasRol && !$requireAll) {
                return true;
            } elseif (!$hasRol && $requireAll) {
                return false;
            }
        }

        return $requireAll;
    }

    /**
     * Attach role to current user.
     *
     * @param object|array $role
     * @return void
     */
    public function attachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }
        if (is_array($role)) {
            if(!isset($role['id'])) {
                return $this->attachRoles($role);
            }

            $role = $role['id'];
        }
        $this->roles()->attach($role);
    }


    /**
     * Attach multiple roles to current user.
     *
     * @param mixed $roles
     * @return void
     */
    public function attachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->attachRole($role);
        }
    }

    /**
     * Detach role from current user.
     *
     * @param object|array $role
     * @return void
     */
    public function detachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }
        if (is_array($role)) {
            if(!isset($role['id'])) {
                return $this->detachRoles($role);
            }

            $role = $role['id'];
        }
        $this->roles()->detach($role);
    }

    /**
     * Detach multiple roles from a user
     *
     * @param mixed $roles
     */
    public function detachRoles($roles=null)
    {
        if (!$roles) $roles = $this->roles()->get();
        foreach ($roles as $role) {
            $this->detachRole($role);
        }
    }

    //auto generated userd
    public static function userId()
    {
        $last_user = User::where('username', 'LIKE', 'user%')->orderBy('id', 'DESC')->first();

        if ($last_user) {
            $exp = explode('user-', $last_user->username);
            $user_no = $exp[1]+1;
            $userId = "user-".$user_no;

            return $userId;

        }
        return 'user-1';
    }

    public function mureed()
    {
        return $this->hasOne(Mureed::class, 'user_id', 'id');
    }


}
