<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use App\Http\Services\ProvinceService;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProvinceController extends Controller
{
    protected $ProvinceService;

    public function __construct(ProvinceService $ProvinceService)
    {
        $this->ProvinceService = $ProvinceService;
    }

    public function index()
    {

        return view('admin.province.list', [
            'title' => 'Danh Sách Tỉnh thành',
            'province' => $this->ProvinceService->getAll()
        ]);
    }
    
    public function create()
    {
        return view('admin.Province.add', [
            'title' => 'Thêm Tỉnh thành Mới',
        ]);
    }

    public function store(ProvinceRequest $request)
    {
        $this->ProvinceService->create($request);
        return redirect()->back();
    }


    public function show(Province $province)
    {
        return view('admin.province.edit', [
            'title' => 'Chỉnh Sửa Tỉnh: ' . $province->provinceName,
            'province' => $province,
        ]);
    }

    public function update(Province $province, ProvinceRequest $request)
    {
        $result = $this->ProvinceService->update($request, $province);
        if ($result) {
            return redirect('/admin/province/list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request): JsonResponse
    {
        $result = $this->ProvinceService->destroy($request);
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

