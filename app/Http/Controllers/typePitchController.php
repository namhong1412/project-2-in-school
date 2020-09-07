<?php

namespace App\Http\Controllers;

use App\typePitch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class typePitchController extends Controller
{
    private $typePitch;

    public function __construct(typePitch $typePitch)
    {
        $this->typePitch = $typePitch;
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        if ($request->name != '' && $request->branch_id != '' && $request->type_pitch_id != '') {
            if ($request->type_pitch_id != 0 && $request->type_pitch_id != 1 && $request->type_pitch_id != 2) {
                return response(['message' => 'Đã xảy ra lỗi gì đó rồi hjhj'], 400);
            }
            try {
                DB::beginTransaction();
                DB::table($this->typePitch->table)->insertGetId([
                    'name' => $request->name,
                    'type_pitch_id' => $request->type_pitch_id,
                    'branch_id' => $request->branch_id,
                    'status' => 0
                ]);
                DB::commit();
                return response(['message' => 'Thêm sân bóng thành công'], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(['message' => 'Thêm sân bóng thất bại'], 400);
            }
        }
        return response(['message' => 'Bạn chưa điền đủ thông tin sân bóng'], 400);
    }

    /**
     * @return array
     */
    public function index()
    {
        $result = DB::table($this->typePitch->table)
            ->join('branch', 'branch.id', '=', $this->typePitch->table . '.branch_id')
            ->get([
                $this->typePitch->table . '.id',
                $this->typePitch->table . '.name',
                'type_pitch_id',
                'branch.name as branch',
                'branch.status as branch_s',
                $this->typePitch->table . '.status as pitch_s'
            ])
            ->toArray();
        return $result;
    }

    /**
     * @param $idTypePitch
     * @return array
     */
    public function show($idTypePitch)
    {
        $result = DB::table($this->typePitch->table)
            ->where('id', $idTypePitch)
            ->get()
            ->toArray();
        return $result;
    }

    /**
     * @param Request $request
     * @param $idTypePitch
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, $idTypePitch)
    {
        if ($request->name != '' && $request->branch_id != '' && $request->type_pitch_id != '') {
            if ($request->type_pitch_id != 0 && $request->type_pitch_id != 1 && $request->type_pitch_id != 2) {
                return response(['message' => 'Đã xảy ra lỗi gì đó rồi hjhj'], 400);
            }
            try {
                DB::beginTransaction();
                DB::table($this->typePitch->table)
                    ->where('id', $idTypePitch)
                    ->update([
                        'name' => $request->name,
                        'branch_id' => $request->branch_id,
                        'type_pitch_id' => $request->type_pitch_id,
                    ]);
                DB::commit();
                return response(["message" => "Cập nhật sân bóng thành công"], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(["message" => "Cập nhật sân bóng thất bại"], 400);
            }
        }
        return response(["message" => "Bạn chưa đủ dữ kiện"], 400);
    }

    /**
     * @param $idTypePitch
     * @return string[]
     */
    public function destroy($idTypePitch)
    {
        try {
            DB::beginTransaction();
            DB::table($this->typePitch->table)
                ->where('id', $idTypePitch)
                ->update([
                    'status' => '1'
                ]);
            DB::commit();
            return ["message" => "Update success"];
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * @return array
     */
    public function showOn()
    {
        $result = DB::table($this->typePitch->table)
            ->where('status', 0)
            ->get(['id', 'name', 'type_pitch_id'])
            ->toArray();
        return $result;
    }
}
