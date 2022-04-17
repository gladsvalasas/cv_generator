<?php

namespace App\Http\Controllers\Api;

use App\Classes\Constants;
use App\Classes\ImageUtilites;
use App\Http\Controllers\Controller;
use App\Models\Landing\PortfolioProjects;
use App\Models\Landing\TechStack;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Valuestore\Valuestore;

class LandingApiController extends Controller
{
    use ApiResponser;

    //

    public function __construct()
    {

    }

    private function savePicture($file, $saveTo)
    {
        $filePrefix = Str::random(15);
        $fileName = $filePrefix . "-" . $file->getClientOriginalName();
        $file->storeAs("public/$saveTo", $fileName, "");

        return $fileName;
    }


    private function savePictureAndResize($file, $saveTo, $h, $w)
    {
        $fileName = $this->savePicture($file, $saveTo);
        ImageUtilites::resizeImage(Storage::path("public/$saveTo") . "/" . $fileName, $h, $w);

        return $fileName;
    }

    function saveMain(Request $request)
    {
        $storage = Valuestore::make(Storage::path("public/") . Constants::LANDING_BASE_CONFIG_PATH);

        $validator = Validator::make($request->all(), [
            "title" => ["required", "string"],
            "mainText" => ["required", "string"],
            "subText" => ["required", "string"],
        ]);

        if ($validator->fails()) return self::validationError($validator->errors());

        foreach ($validator->validated() as $key => $value) {
            $storage->put($key, $value);
        }

        return $this->success("Saved!");
    }

    function saveStack(Request $request)
    {
        $countStack = TechStack::all()
            ->count();
        if ($countStack >= Constants::LANDING_MAX_COUNT_STACK) return $this->error("Maximum - 10 entries", 200);

        $data = $request->all();
        $validation = Validator::make($data, TechStack::getValidatorTemplate());
        if ($validation->fails()) return self::validationError($validation->errors());

        $fileName = $this->savePictureAndResize($request->file("logotype_path"), "stack", 300, 300);

        $data["logotype_path"] = $fileName;

        $created = TechStack::create($data);

        $created["logotype_path"] = asset("storage/stack") . "/" . $fileName;

        return $this->success($created);
    }

    function savePortfolio(Request $request)
    {
        $countProjects = PortfolioProjects::all()
            ->count();

        if ($countProjects >= Constants::LANDING_MAX_COUNT_PROJECTS) return $this->error("Maximum - 5 entries", 200);


    }

    function saveLinks(Request $request)
    {

    }

    function deleteStack(Request $request, $id)
    {
        $deleted = TechStack::whereId($id)
            ->delete();
        return $this->success(["id" => $id, "deleted" => $deleted]);
    }

    function deletePortfolio(Request $request, $id)
    {
        return $this->success(["id" => $id, "deleted" => PortfolioProjects::whereId($id)->delete()]);
    }

    function deleteLinks(Request $request, $id)
    {

    }
}
