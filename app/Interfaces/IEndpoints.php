<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface IEndpoints
{
    public function get(Request $request, string $method, int $id);
    public function getAll(Request $request, string $method);
    public function create(Request $request, string $method);
    public function update(Request $request, string $method, int $id);
    public function delete(Request $request, string $method, int $id);
}
