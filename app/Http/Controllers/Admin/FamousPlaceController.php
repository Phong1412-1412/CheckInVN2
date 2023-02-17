<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FamousPlaceRequest;
use App\Http\Services\FamousPlaceService;
use App\Models\FamousPlace;
use App\Models\User;
use App\Models\Province;
use App\Models\Coordinates;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FamousPlaceController extends Controller
{
    protected $FamousPlaceService;

    public function __construct(FamousPlaceService $FamousPlaceService)
    {
        $this->FamousPlaceService = $FamousPlaceService;
    }

    public function index()
    {

        return view('admin.FamousPlace.list', [
            'title' => 'Danh Sách Tỉnh thành',
            'FamousPlace' => $this->FamousPlaceService->getAll()
        ]);
    }
    
    public function create()
    {
        return view('admin.FamousPlace.add', [
            'title' => 'Thêm Tỉnh thành Mới',
            'province'=>$this->FamousPlaceService->getProvince()
        ]);
    }

    public function store(FamousPlaceRequest $request)
    {
        $this->FamousPlaceService->create($request);
        return redirect()->back();
    }


    public function show(FamousPlace $famousplace)
    {
        $coordinates = Coordinates::Where('id_famousplace','=',$famousplace->id)->first();
        return view('admin.FamousPlace.edit', [
            'title' => 'Chỉnh Sửa Tỉnh: ' . $famousplace->name_famous,
            'province'=>$this->FamousPlaceService->getProvince(),
            'famousplace' => $famousplace,
            'coordinates'=>$coordinates
        ]);
    }

    public function update(FamousPlace $famousplace, FamousPlaceRequest $request)
    {
        $coordinates = Coordinates::Where('id_famousplace','=',$famousplace->id)->first();
        $result = $this->FamousPlaceService->update($request, $famousplace,$coordinates);
        if ($result) {
            return redirect('/admin/famousplace/list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request): JsonResponse
    {
        $result = $this->FamousPlaceService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công tỉnh'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}

