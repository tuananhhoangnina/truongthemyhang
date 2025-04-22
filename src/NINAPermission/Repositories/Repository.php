<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINAPermission\Repositories;
use NINACORE\Core\Exceptions\NINAExceptions;
abstract class Repository
{
    public function findByName($name)
    {
        return $this->model->where('name', $name)->first();
    }
    protected function guardForUniqueName($name)
    {
        $item = $this->findByName($name);
        if( !is_null($item) ) {
            throw new NINAExceptions('The name '. $name .' is already exist.');
        }
    }

    /**
     * @throws NINAExceptions
     */
    public function create(string $name)
    {
        $this->guardForUniqueName($name);
        $this->model->name = $name;
        $this->model->save();
        return $this->model;
    }

    public function deleteByName(string $name)
    {
        $item = $this->model->where('name', $name)->first();
        return $item->delete();
    }

    public function deleteById(int $id)
    {
        $item = $this->model->find($id);
        return $item->delete();
    }

    public function update($name, $id)
    {
        $item = $this->model->findOrFail($id);
        $item->name = $name;
        $item->save();
        return $item;
    }

    public function fetchSet()
    {
        $this->setModel(
            $this->model->first()
        );
    }

    public function __call($method, $args)
    {
        return $this->setModel(call_user_func_array([$this->model, $method], $args));
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function getModel(){
        return $this->model;
    }
}