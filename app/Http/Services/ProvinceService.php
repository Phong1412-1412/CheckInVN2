<?php


namespace App\Http\Services;


use App\Models\Province;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProvinceService
{
    public function getAll()
    {
        return Province::all();
    }

    public function create($request)
    {
        try {
            Province::create([
                'provinceName' => (string)$request->input('provinceName'),
                'description' => (string)$request->input('description'),
                'image' => (string)$request->input('image'),
                'favoriteChecked' => (int)$request->input('favoriteChecked'),
            ]);
            Session::flash('success', 'Thêm Thành Công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $province): bool
    {
        try {
            $province->fill($request->input());
            $province->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $Province = Province::where('id', $id)->first();
        if ($Province) {
            return Province::where('id', $id)->delete();
        }
        return false;
    }
}
