<?php


namespace App\Classes;


use Illuminate\Database\Eloquent\Model;

class Crud
{
    /**
     * @param Model $class
     * @param array $wheres
     * @return mixed
     */
    public static function delete(Model $class, $wheres = [])
    {
        return $class::where($wheres)->delete();
    }

    /**
     * @param Model $class
     * @param $data
     * @param array $wheres
     * @return mixed
     */
    public static function update(Model $class, $data, $wheres = [])
    {
        return $class::where($wheres)->update($data);
    }

    /**
     * @param Model $model
     * @param $data
     * @return mixed
     */
    public static function add(Model $model, $data) {
        return $model::create($data);
    }
}
