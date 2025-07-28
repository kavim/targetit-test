<?php

namespace App\Repositories\Contracts;

interface AddressRepositoryInterface
{
    /**
     * Cria um novo endereço.
     *
     * @param  array  $data
     * @return \App\Models\Address
     */
    public function create(array $data);

    /**
     * Obtém todos os endereços de um usuário.
     *
     * @param  int  $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByUser(int $userId);

    /**
     * Busca um endereço pelo seu ID.
     *
     * @param  int  $id
     * @return \App\Models\Address
     */
    public function find(int $id);

    /**
     * Atualiza um endereço existente.
     *
     * @param  int    $id
     * @param  array  $data
     * @return bool
     */
    public function update(int $id, array $data);

    /**
     * Remove (delete) um endereço.
     *
     * @param  int  $id
     * @return bool
     */
    public function delete(int $id);
}

