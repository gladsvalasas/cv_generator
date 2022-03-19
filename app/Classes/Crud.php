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

    private static function hasExist($class, $wheres)
    {
        $classWhere = $class::where($wheres);
        return is_null($classWhere) ? false : $classWhere;
    }

    public static function delete(Model $class, $wheres = [])
    {
        $get = self::hasExist($class, $wheres);
        if ($get) {
            return $get->delete();
        }

        return null;
    }

    /**
     * @param Model $class
     * @param $data
     * @param array $wheres
     * @return mixed
     */
    public static function update(Model $class, $data, $wheres = [])
    {
        $get = self::hasExist($class, $wheres);
        if ($get) {
            return $get->update($data);
        }
        return null;
    }

    /**
     * @param Model $model
     * @param $data
     * @return mixed
     */
    public static function add(Model $model, $data) {
        return $model::create($data);
    }

    public static function get(Model $class, $wheres = [])
    {
        $get = self::hasExist($class, $wheres);
        if ($get) {
            return $get->get();
        }

        return null;
    }

    public static function getAll(Model $model)
    {
        return $model->all();
    }
}
