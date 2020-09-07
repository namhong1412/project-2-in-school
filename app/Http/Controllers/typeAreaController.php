<?php

namespace App\Http\Controllers;

use App\typeArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class typeAreaController extends Controller
{
    private $typeArea;

    /**
     * typeAreaController constructor.
     * @param typeArea $typeArea
     */
    public function __construct(typeArea $typeArea)
    {
        $this->typeArea = $typeArea;
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        if ($request->name != '') {
            try {
                DB::beginTransaction();
                DB::table($this->typeArea->table)
                    ->insertGetId([
                        'name' => $request->name,
                        'status' => 0
                    ]);
                DB::commit();
                return response(['message' => 'Thêm khu vực thành công'], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(['message' => 'Thêm khu vực thất bại'], 400);
            }
        }
        return response(['message' => 'Bạn chưa điền đủ thông tin khu vực'], 400);
    }

    /**
     * @param $idTypeArea
     * @return array
     */
    public function show($idTypeArea)
    {
        $result = DB::table($this->typeArea->table)
            ->where('id', $idTypeArea)
            ->get(['id', 'name'])
            ->toArray();
        return $result;
    }

    /**
     * @return array
     */
    public function showOn()
    {
        $result = DB::table($this->typeArea->table)
            ->where('status', 0)
            ->get(['id', 'name'])
            ->toArray();
        return $result;
    }

    /**
     * @return array
     */
    public function index()
    {
        $result = DB::table($this->typeArea->table)
            ->where('status', 0)
            ->orWhere('status', 1)
            ->get()
            ->toArray();
        return $result;
    }

    /**
     * @param Request $request
     * @param $idTypeArea
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, $idTypeArea)
    {
        if ($request->name != '') {
            try {
                DB::beginTransaction();
                DB::table($this->typeArea->table)
                    ->where('id', $idTypeArea)
                    ->update([
                        'name' => $request->name
                    ]);
                DB::commit();
                return response(["message" => "Cập nhật khu vực thành công"], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(["message" => "Cập nhật khu vực thất bại"], 400);
            }
        }
        return response(["message" => "Bạn chưa đủ dữ kiện"], 400);
    }
}
