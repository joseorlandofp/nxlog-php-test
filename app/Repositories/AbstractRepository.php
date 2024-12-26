<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AbstractRepository implements RepositoryInterface
{
    protected Model $model;

    public function getModel(): Model
    {
        return $this->model;
    }

    public function all($params = null, $with = [])
    {
        return $this->getModel()->with($with)->where($params)->paginate(20);
    }

    public function find(mixed $id, array $with = [], array $withCount = []): Model|Collection|Builder|array|null
    {
        if (is_numeric($id)) {
            return $this->getModel()->with($with)->withCount($withCount)->find($id);
        }

        return $this->findOneWhere(['code' => $id], $with, $withCount);
    }

    public function findOneWhere(array $where, array $with = [], array $withCount = [])
    {
        $object = $this->where($where, $with, $withCount);

        return $object->first();
    }

    public function create(array $params): Model
    {
        return $this->getModel()->create($params);
    }

    public function update(Model $entity, $data): bool
    {
        return $entity->fill($data)->save();
    }

    public function delete($id): void
    {
        $model = $this->find($id);
        $model->delete();
    }

    public function where(array $where, array $with = [], array $withCount = [])
    {
        return $this->getModel()->where($where)->with($with)->withCount($withCount)->get();
    }

    public function updateOrCreate($paramsValidator, $params)
    {
        return $this->getModel()->updateOrCreate($paramsValidator, $params);
    }

}
