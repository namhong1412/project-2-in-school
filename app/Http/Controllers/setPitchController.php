<?php

namespace App\Http\Controllers;

use App\setPitch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class setPitchController extends Controller
{
    private $setPitch;

    public function __construct(setPitch $setPitch)
    {
        $this->setPitch = $setPitch;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    /**
     * @param Request $request
     * @return json
     */
    public function store(Request $request)
    {
        if ($request->name != ''
            && $request->pitch_id != ''
            && strlen($request->time_from) == '19'
            && strlen($request->time_to) == '19'
            && $request->per_hour != ''
            && $request->surcharge != ''
            && $request->deposit != ''
            && $request->kind != '') {

            /**
             * Kiểm tra thời gian hợp lệ hay không
             */
            $result = DB::table($this->setPitch->table)
                ->where('time_from', '>=', date('Y-m-d 00:00:00'))
                ->where('time_from', '<', date('Y-m-d 00:00:00', strtotime("+1 day")))
                ->where('pitch_id', $request->pitch_id)
                ->where(function ($query) {
                    $query->where('kind', '0')
                        ->orWhere('kind', '1');
                })
                ->get()
                ->toArray();
            foreach ($result as $value) {
                if ($request->time_from <= $value->time_to && $request->time_to >= $value->time_to) {
                    return response(['message' => 'Sân này thời gian đó ' .$value->name. ' đã đặt'], 400);
                } elseif ($request->time_to >= $value->time_from && $request->time_from <= $value->time_from) {
                    return response(['message' => 'Sân này thời gian đó ' .$value->name. ' đã đặt'], 400);
                } elseif ($request->time_from >= $value->time_from && $request->time_to <= $value->time_to) {
                    return response(['message' => 'Sân này thời gian đó ' .$value->name. ' đã đặt'], 400);
                } elseif ($request->time_from <= $value->time_from && $request->time_to >= $value->time_to) {
                    return response(['message' => 'Sân này thời gian đó ' .$value->name. ' đã đặt'], 400);
                }
            }

            $from_from_compare = $request->time_from;
            $from_to_compare = $request->time_to;

            if ($from_from_compare < date('Y-m-d 00:00:00')) {
                return response(['message' => 'Ngày không hợp lệ'], 400);
            }

            if ($from_from_compare >= $from_to_compare) {
                return response(['message' => 'Thời gian không hợp lệ'], 400);
            }

            try {
                DB::beginTransaction();
                DB::table($this->setPitch->table)
                    ->insertGetId([
                        'name' => $request->name,
                        'pitch_id' => $request->pitch_id,
                        'time_from' => $request->time_from,
                        'time_to' => $request->time_to,
                        'per_hour' => $request->per_hour,
                        'surcharge' => $request->surcharge, // phụ phí
                        'deposit' => $request->deposit, // cọc trước
                        'kind' => $request->kind,
                        'note' => $request->note
                    ]);
                DB::commit();
                return response(['message' => 'Đặt sân thành công'], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(['message' => 'Đặt sân thất bại'], 400);
            }
        }
        return response(['message' => 'Bạn chưa điền đủ thông tin đặt sân'], 400);
    }

    /**
     * @return array
     */
    public function index()
    {
        $result = DB::table($this->setPitch->table)
            ->where('kind', 0)
            ->get([
                'id',
                'name as title',
                'time_from as start',
                'time_to as end'
            ])
            ->toArray();
        return $result;
    }

    /**
     * @return array
     */
    public function history()
    {
        $result = DB::table($this->setPitch->table)
            ->join('pitch', 'pitch.id', '=', $this->setPitch->table . '.pitch_id')
            ->where('time_from', '<', date('Y-m-d 00:00:00', strtotime("+1 day")))
            ->where(function ($query) {
                $query->where($this->setPitch->table . '.kind', '0')
                    ->orWhere($this->setPitch->table . '.kind', '1');
            })
            ->orderByDesc('time_from')
            ->get([
                $this->setPitch->table . '.id',
                'pitch.name as pitch_name',
                'type_pitch_id',
                $this->setPitch->table . '.name',
                'time_from',
                'time_to',
                'surcharge',
                'per_hour',
                $this->setPitch->table . '.kind',
            ])
            ->toArray();
        $data = [];
        foreach ($result as $value) {

            $from_from_compare = $value->time_from;
            $from_to_compare = $value->time_to;
            $time = (strtotime($from_to_compare) - strtotime($from_from_compare)) / (60 * 60);
            $money = round($value->per_hour * $time + $value->surcharge, 0);
            $kind = $value->kind == "0" ? "Chưa" : "Xong";

            $data[] = [
                'id' => $value->id,
                'name' => $value->name,
                'time_from' => $value->time_from,
                'time_to' => $value->time_to,
                'surcharge' => $value->surcharge,
                'pitch' => $value->pitch_name,
                'type_pitch_id' => $value->type_pitch_id,
                'revenue' => $money,
                'kind' => $kind
            ];
        }
        return $data;
    }

    /**
     * @return array
     */
    public function today()
    {
        $result = DB::table($this->setPitch->table)
            ->join('pitch', 'pitch.id', '=', $this->setPitch->table . '.pitch_id')
            ->where('time_from', '>=', date('Y-m-d 00:00:00'))
            ->where('time_from', '<', date('Y-m-d 00:00:00', strtotime("+1 day")))
            ->where(function ($query) {
                $query->where($this->setPitch->table . '.kind', '0')
                    ->orWhere($this->setPitch->table . '.kind', '1');
            })
            ->orderByDesc('time_from')
            ->get([
                $this->setPitch->table . '.id',
                'pitch.name as pitch_name',
                'type_pitch_id',
                $this->setPitch->table . '.name',
                'time_from',
                'time_to',
                'surcharge',
                'per_hour',
                $this->setPitch->table . '.kind',
            ])
            ->toArray();
        $data = [];
        foreach ($result as $value) {

            $from_from_compare = $value->time_from;
            $from_to_compare = $value->time_to;
            $time = (strtotime($from_to_compare) - strtotime($from_from_compare)) / (60 * 60);
            $money = round($value->per_hour * $time + $value->surcharge, 0);
            $kind = $value->kind == "0" ? "Chưa" : "Xong";

            $data[] = [
                'id' => $value->id,
                'name' => $value->name,
                'time_from' => $value->time_from,
                'time_to' => $value->time_to,
                'surcharge' => $value->surcharge,
                'pitch' => $value->pitch_name,
                'type_pitch_id' => $value->type_pitch_id,
                'revenue' => $money,
                'kind' => $kind
            ];
        }
        return $data;
    }

    /**
     * @return array
     */
    public function statistic()
    {
        $data = [];
        $all_set_pitch = 0;
        $deposit = 0;
        $money = 0;
        $money_deposit = 0;
        $surcharge = 0;
        $paid = 0;
        $result = DB::table($this->setPitch->table)
            ->where('time_from', '>=', date('Y-m-d 00:00:00'))
            ->where('time_from', '<', date('Y-m-d 00:00:00', strtotime("+1 day")))
            ->where(function ($query) {
                $query->where('kind', '0')
                    ->orWhere('kind', '1');
            })
            ->get()
            ->toArray();
        foreach ($result as $value) {
            $all_set_pitch++;
            if ($value->deposit > 0) {
                $deposit++;
            }
            if ($value->kind == 1) {
                $paid++;
            }
            $money_deposit += $value->deposit;
            $from_from_compare = $value->time_from;
            $from_to_compare = $value->time_to;
            $time = (strtotime($from_to_compare) - strtotime($from_from_compare)) / (60 * 60);
            $money += $value->per_hour * $time;
            $surcharge += $value->surcharge;
        }
        $data['all_set_pitch'] = $all_set_pitch;
        $data['per_hour_money'] = round($money, 0);
        $data['surcharge_money'] = $surcharge;
        $data['deposit_money'] = $money_deposit;
        $data['deposit_number'] = $deposit;
        $data['paid'] = $paid;

        return $data;
    }

    /**
     * @param $idTypePitch
     * @return array
     */
    public function show($idSetPitch)
    {
        $result = DB::table($this->setPitch->table)
            ->where('id', $idSetPitch)
            ->where(function ($query) {
                $query->where('kind', '0')
                    ->orWhere('kind', '1');
            })
            ->get()
            ->toArray();
        return $result;
    }

    /**
     * @param Request $request
     * @param $idSetPitch
     * @return: json
     */
    public function update(Request $request, $idSetPitch)
    {
        if ($request->name != ''
            && $request->pitch_id != ''
            && strlen($request->time_from) == '19'
            && strlen($request->time_to) == '19'
            && $request->per_hour != ''
            && $request->surcharge != ''
            && $request->deposit != ''
            && $request->kind != '') {

            $from_from_compare = $request->time_from;
            $from_to_compare = $request->time_to;

            if ($from_from_compare >= $from_to_compare) {
                return response(['message' => 'Thời gian không hợp lệ'], 400);
            }

            try {
                DB::beginTransaction();
                DB::table($this->setPitch->table)
                    ->where('id', $idSetPitch)
                    ->where(function ($query) {
                        $query->where('kind', '0')
                            ->orWhere('kind', '1');
                    })
                    ->update([
                        'name' => $request->name,
                        'pitch_id' => $request->pitch_id,
                        'time_from' => $request->time_from,
                        'time_to' => $request->time_to,
                        'per_hour' => $request->per_hour,
                        'surcharge' => $request->surcharge, // phụ phí
                        'deposit' => $request->deposit, // cọc trước
                        'kind' => $request->kind,
                        'note' => $request->note
                    ]);
                DB::commit();
                return response(['message' => 'Cập nhật thành công'], 200);
            } catch (Exception $e) {
                DB::rollBack();
                return response(['message' => 'Cập nhật thất bại'], 400);
            }
        }
        return response(['message' => 'Bạn chưa điền đủ thông tin đặt sân'], 400);
    }

    /**
     * @param Request $request
     * @param $idSetPitch
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function deletePitch($idSetPitch)
    {
        try {
            DB::beginTransaction();
            DB::table($this->setPitch->table)
                ->where('id', $idSetPitch)
                ->update([
                    'kind' => 2
                ]);
            DB::commit();
            return response(['message' => 'Xoá đặt sân thành công'], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response(['message' => 'Xoá đặt sân thất bại'], 400);
        }
    }
}
