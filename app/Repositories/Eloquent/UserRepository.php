<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(){
        return User::with(['addresses','permissions'])->get();
    }

    public function create(array $data){
        return User::create($data);
    }

    public function update(int $id, array $data){
        return User::findOrFail($id)->update($data);
    }

    public function delete(int $id){
        return User::findOrFail($id)->delete();
    }

    public function find(int $id){
        return User::with(['addresses','permissions'])->findOrFail($id);
    }

    public function all(){
        return User::all();
    }
}
