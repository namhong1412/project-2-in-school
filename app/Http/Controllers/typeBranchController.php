<?php

namespace App\Http\Controllers;

use App\typeBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class typeBranchController extends Controller
{
    private $typeBranch;

    public function __construct(typeBranch $typeBranch)
    {
        $this->typeBranch = $typeBranch;
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        if ($request->name != '' && $request->area_id != '') {
            try {
                DB::beginTransaction();
                DB::table($this->typeBranch->table)
                    ->insertGetId([
                        'name' => $request->name,
                        'area_id' => $request->area_id,
                        'status' => 0,
                    ]);
                DB::commit();
                return response(['message' => 'Thêm cơ sở thành công'], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(['message' => 'Thêm cơ sở thất bại'], 400);
            }
        }
        return response(['message' => 'Bạn chưa điền đủ thông tin cơ sở'], 400);
    }

    /**
     * @return array
     */
    public function showOn()
    {
        $result = DB::table($this->typeBranch->table)
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
        $result = DB::table($this->typeBranch->table)
            ->where('status', 0)
            ->orWhere('status', 1)
            ->get()
            ->toArray();
        return $result;
    }

    /**
     * @param Request $request
     * @param $idTypeBranch
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, $idTypeBranch)
    {
        if ($request->name != '' && $request->area_id != '') {
            try {
                DB::beginTransaction();
                DB::table($this->typeBranch->table)
                    ->where('id', $idTypeBranch)
                    ->update([
                        'name' => $request->name,
                        'area_id' => $request->area_id
                    ]);
                DB::commit();
                return response(["message" => "Cập nhật cơ sở thành công"], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(["message" => "Cập nhật cơ sở thất bại"], 400);
            }
        }
        return response(["message" => "Bạn chưa đủ dữ kiện"], 400);
    }

    public function show($idTypeBranch)
    {
        $result = DB::table($this->typeBranch->table)
            ->where('id', $idTypeBranch)
            ->get(['id', 'area_id', 'name'])
            ->toArray();
        return $result;
    }
}
