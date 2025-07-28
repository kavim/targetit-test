<?php

namespace App\Repositories\Eloquent;

use App\Models\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;

class AddressRepository implements AddressRepositoryInterface
{
    public function create(array $data)
    {
        return Address::create($data);
    }

    public function getByUser(int $userId)
    {
        return Address::where('user_id', $userId)->get();
    }

    public function find(int $id)
    {
        return Address::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $address = $this->find($id);
        return $address->update($data);
    }

    public function delete(int $id)
    {
        $address = $this->find($id);
        return $address->delete();
    }
}
A
