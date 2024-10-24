<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Fetch all users.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllUsers()
    {
        return User::all();
    }

    /**
     * Find a user by ID.
     *
     * @param int $id
     * @return \App\Models\User|null
     */
    public function getUserById($id)
    {
        return User::find($id);
    }

        /**
     * Find a user by username.
     *
     * @param string $username
     * @return \App\Models\User|null
     */
    public function getUserByUsername($username)
    {
        return User::where('email', $username)->first();
    }


}