<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Resources\AddressResource;
use App\Repositories\Eloquent\AddressRepository;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    public function __construct(
        private AddressRepository $addressRepo
    ) {}

    public function store(StoreAddressRequest $request): JsonResponse
    {
        $address = $this->addressRepo->create($request->validated());

        return response()->json(new AddressResource($address), 201);
    }
}
