<?php

namespace App\Http\Controllers\Api;

use App\Classes\Crud;
use App\Http\Controllers\Controller;
use App\Interfaces\IEndpoints;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//use App\Models\LanguagesUser;

class EndpointsController extends Controller implements IEndpoints
{
    use ApiResponser;

    protected string $modelsNamespace = '\App\Models\\';
    protected static array $secureMethods = [
        "User",
    ];

    protected static function baseErrorNotFound()
    {
        return self::error("Method not allowed", 405);
    }

    protected static function validationError($data)
    {
        return self::error("Validation Error!", 422, $data);
    }

    protected static function checkMethod($method)
    {
        return in_array($method, self::$secureMethods);
    }

    public function get(Request $request, string $method, int $id)
    {
        try {
            if (self::checkMethod($method)) return self::baseErrorNotFound();

            $modelName = $this->modelsNamespace.$method;

            $get = Crud::get(new $modelName(), ["id"=>$id]);

            return $this->success($get);
        } catch (\Throwable  $ex) {
            return self::baseErrorNotFound();
        }
    }

    public function getAll(Request $request, string $method)
    {
        try {
            if (self::checkMethod($method)) return self::baseErrorNotFound();

            $modelName = $this->modelsNamespace.$method;

            $get = Crud::get(new $modelName(), ["user_id"=>$request->user()->id]);

            return $this->success($get);
        } catch (\Throwable  $ex) {
            return self::baseErrorNotFound();
        }
    }

    public function create(Request $request, string $method)
    {
        try {
            if (self::checkMethod($method)) return self::baseErrorNotFound();


            $modelName = $this->modelsNamespace.$method;

            $validator = Validator::make($request->all(), $modelName::getValidatorTemplate());

            if ($validator->fails()) {
                return self::validationError($validator->errors());
            }

            $data = $validator->validated();
            $data["user_id"] = $request->user()->id;

            $created = Crud::add(new $modelName(), $data);

            return $this->success(["id"=>$created]);
        } catch (\Throwable  $ex) {
            return self::baseErrorNotFound();
        }
    }

    public function update(Request $request, string $method, int $id)
    {
        try {
            if (self::checkMethod($method)) return self::baseErrorNotFound();

            $modelName = $this->modelsNamespace.$method;

            $validator = Validator::make($request->all(), $modelName::getValidatorTemplate());

            if ($validator->fails()) {
                return self::validationError($validator->errors());
            }

            $dataUpdate = $validator->validated();

            $update = Crud::update(new $modelName(), $dataUpdate, ["id"=>$id, "user_id"=>$request->user()->id]);
            return $this->success(["id"=>$id, "updated"=>$update, "newFields"=>$dataUpdate]);
        } catch (\Throwable  $ex) {
            return self::baseErrorNotFound();
        }
    }

    public function delete(Request $request, string $method, int $id)
    {
        try {
            if (self::checkMethod($method)) return self::baseErrorNotFound();

            $modelName = $this->modelsNamespace.$method;

            $delete = Crud::delete(new $modelName(), ["id"=>$id, "user_id"=>$request->user()->id]);
            return $this->success(["id"=> $id, "deleted"=>$delete]);
        } catch (\Throwable  $ex) {
            return self::baseErrorNotFound();
        }
    }

}
