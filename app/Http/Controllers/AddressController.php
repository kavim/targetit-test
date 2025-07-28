<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Repositories\Contracts\AddressRepositoryInterface;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    public function __construct(
        private AddressRepositoryInterface $addressRepo
    ) {}

    public function store(StoreAddressRequest $request): JsonResponse
    {
        $data = $request->validated();

        $address = $this->addressRepo->create($data);

        return response()->json($address, 201);
    }
}
