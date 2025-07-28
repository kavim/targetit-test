<?php

namespace App\Services\Eloquent;

use App\Repositories\Eloquent\UserRepository;
use App\Services\Contracts\UserServiceInterface;

class UserService implements UserServiceInterface
{
    public function __construct(private UserRepository $repo){}

    public function getAll(){
        return $this->repo->getAll();
    }

    public function create(array $data){
        return $this->repo->create($data);
    }

    public function update(int $id, array $data){
        return $this->repo->update($id,$data);
    }

    public function delete(int $id){
        return $this->repo->delete($id);
    }

    public function find(int $id){
        return $this->repo->find($id);
    }
}

