<?php

namespace App\Services\Contract;

use Illuminate\Database\Eloquent\Model;



interface BaseService{
    public function create(array $values): Model;
    public function get(): array;
    public function find(int $id): Model;
    public function findTrash(int $id): Model;
    public function update(array $values): Model;
    public function delete():Model;
    public function deleteMany(array $ids);
    public function forceDelete():Model;
    public function forceDeleteMany(array $ids);
    public function setPerPage(int $per_page);
}
