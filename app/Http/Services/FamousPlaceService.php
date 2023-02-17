<?php


namespace App\Http\Services;


use App\Models\FamousPlace;
use App\Models\Province;
use App\Models\Coordinates;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FamousPlaceService
{
    public function getProvince()
    {
        return Province::Where('favoriteChecked',0)->get();
    }

    public function getAll()
    {
        return FamousPlace::all();
    }

    public function create($request)
    {
        try {
            FamousPlace::create([
                'id_province' => (int)$request->input('id_province'),
                'name_famous' => (string)$request->input('name_famous'),
                'address' => (string)$request->input('address'),
                'description' => (string)$request->input('description'),
                'image' => (string)$request->input('image'),
                'ischecked' =>(int)$request->input('ischecked'),
            ]);
            $check = FamousPlace::Where('name_famous','=',(string)$request->input('name_famous'))->first();
            if($check){
                Session::flash('success', 'Thêm thành công');
                Coordinates::create([
                    'id_famousplace' => $check->id,
                    'latitude' => (string)$request->input('latitude'),
                    'longitude' => (string)$request->input('longitude'),
                ]);
            }else{
                Session::flash('success', 'Không tìm thấy');
            }
            
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $famousplace,$coordinates): bool
    {
        try {
            $coordinates->fill($request->input());
            $coordinates->save();
            $famousplace->fill($request->input());
            $famousplace->save();
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
        $FamousPlace = FamousPlace::where('id', $id)->first();
        if ($FamousPlace) {
            Coordinates::where('id_famousplace', $id)->delete();
        }

        $findCoordinates = Coordinates::where('id_famousplace', $id)->first();
        if (!$findCoordinates) {
            return FamousPlace::where('id', $id)->delete();
        }
        return false;
    }
}
