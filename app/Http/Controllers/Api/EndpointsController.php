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

    private $model;

    protected static array $secureMethods = [
        "User",
    ];

    protected static function baseErrorNotFound()
    {
        return self::error("Method not allowed", 405);
    }

    protected static function validationError($data)
    {
        return self::error("Validation Error!", 200, $data);
    }

    protected static function checkMethod($method)
    {
        return in_array($method, self::$secureMethods);
    }

    private function execute(string $method, $function)
    {
        try {
            if (self::checkMethod($method)) return self::baseErrorNotFound();

            $modelName = $this->modelsNamespace.$method;
            $this->model = new $modelName();

            return $function();
        } catch (\Throwable  $ex) {
            return self::baseErrorNotFound();
        }
    }

    public function get(Request $request, string $method, int $id)
    {
        return $this->execute($method, function() use ($id) {
            $get = Crud::get($this->model, ["id"=>$id]);

            return $this->success($get);
        });
    }

    public function getAll(Request $request, string $method)
    {
        return $this->execute($method, function() use ($request) {
            $get = Crud::get($this->model, ["user_id"=>$request->user()->id]);

            return $this->success($get);
        });
    }

    public function create(Request $request, string $method)
    {
        return $this->execute($method, function() use ($request) {
            $validator = Validator::make($request->all(), $this->model::getValidatorTemplate());

            if ($validator->fails()) {
                return self::validationError($validator->errors());
            }

            $data = $validator->validated();
            $data["user_id"] = $request->user()->id;

            $created = Crud::add($this->model, $data);

            return $this->success(["id"=>$created]);
        });
    }

    public function update(Request $request, string $method, int $id)
    {
        return $this->execute($method, function() use ($request, $id) {
            $validator = Validator::make($request->all(), $this->model::getValidatorTemplate());

            if ($validator->fails()) {
                return self::validationError($validator->errors());
            }

            $dataUpdate = $validator->validated();

            $update = Crud::update($this->model, $dataUpdate, ["id"=>$id, "user_id"=>$request->user()->id]);
            return $this->success(["id"=>$id, "updated"=>$update, "newFields"=>$dataUpdate]);
        });
    }

    public function delete(Request $request, string $method, int $id)
    {
        return $this->execute($method, function () use ($request, $id) {
            $delete = Crud::delete($this->model, ["id"=>$id, "user_id"=>$request->user()->id]);
            return $this->success(["id"=> $id, "deleted"=>$delete]);
        });
    }

}
