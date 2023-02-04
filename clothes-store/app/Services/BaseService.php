<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BaseService{
    protected $model;
    public function all(){
        return $this->model->latest()->get();
    }
    public function create($params)
    {
        return $this->model->create($params);
    }

    public function update($id, $params)
    {
        $model = $this->model->find($id);
        $model->update($params);

        return $this->model->find($id);
    }

    public function delete($id)
    {
        $item = $this->find($id);

        return $item ? $item->delete() : true;
    }

    public function find($id, $with = null)
    {
        $query = $this->model;
        if ($with) {
            $query = $query->with($with);
        }

        return $query->find($id);
    }

    public function deleteMore($ids)
    {
        return $this->model->destroy($ids);
    }

    public function deleteList($params)
    {
        try {
            DB::beginTransaction();

            foreach ($params['ids'] as $id) {
                $this->delete($id);
            }

            DB::commit();

            return true;
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error('Message '.$ex->getMessage().' Line '.$ex->getLine());
            return false;
        }
    }
}