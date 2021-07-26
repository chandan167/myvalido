<?php

namespace App\Services;


use Illuminate\Database\Eloquent\Model;
use Prophecy\Exception\Doubler\MethodNotFoundException;
use App\Services\Contract\BaseService as ContractBaseService;

class BaseService implements ContractBaseService{

    public Model $model;
    protected $per_page = 20;
    protected array $temp = [];



    public function create(array $values): Model
    {
        $values = $this->creater($values);
        $this->modifyValues($values);
        $this->model->create($this->temp);
        return $this->model;
    }

    public function get(): array
    {
        $data = $this->model->simplePaginate($this->per_page);
        return $data;
    }

    public function find(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function findTrash(int $id): Model
    {
        return $this->model->withTrashed->findOrFail($id);
    }

    public function update(array $values): Model
    {
        $values = $this->updater($values);
        $this->modifyValues($values);
        $this->model->update($this->temp);
        return $this->model;
    }

    public function delete():Model
    {
        $this->model->delet();
        return $this->model;
    }

    function deleteMany(array $ids)
    {
        $this->model->whereIn('id', $ids)->delete();
    }

    function forceDelete():Model
    {
        return $this->model->withTrashed()->forceDelete();
        return $this->model;
    }

    public function forceDeleteMany(array $ids)
    {
        return $this->model->where('id', $ids)->withTrashed()->forceDelete();
    }

    public function setPerPage(int $per_page)
    {
        $this->per_page = $per_page;
    }

    protected function modifyValues(array $values){
        foreach($this->model->getAttributes() as $key=>$value){
            $this->temp[$key] = isset($values[$key]) ? $values[$key] : $this->model->getAttributeValue($key);
        }
    }

    protected function creater(array $values){
        throw new MethodNotFoundException(__FUNCTION__." not Found", '', '');
    }
    protected function updater(array $values){
        throw new MethodNotFoundException(__FUNCTION__." not Found", '', '');
    }
}
