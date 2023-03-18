<?php

namespace App\Repositories;

use App\Models\Kta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\KtaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\KtaCollection;

class KtaRepository
{
    public function getTabulator($request)
    {
        $query = Kta::all();

        if ($request->has('filter')) {
            $reqFilter = $request->get('filter');
            foreach ($reqFilter as $filter) {
                if($filter['field'] == 'full_name' && $filter['value']) {
                    $query = $query->where(function ($qq) use ($filter) {
                        $qq->where('full_name', 'like', '%' . $filter['value'] . '%');
                    });
                }
            }
        }
        $data = $query->last()->paginate($request->size);

        return KtaCollection::collection($data)->additional(['last_page' => $data->lastPage()]);
    }

    public function getKtaById($id)
    {
        return Kta::where('id', $id)->first();
    }

    public function saveKta(KtaRequest $request)
    {

        $password = Hash::make($request->password);

        DB::beginTransaction();
        try {
            Kta::create([
                'no_kta'     => $request->no_kta,
                'full_name'     => $request->full_name,
                'ttl'     => $request->ttl,
                'agama'     => $request->agama,
                'gol_darah'     => $request->gol_darah,
                'pangkat_terakhir'     => $request->pangkat_terakhir,
                'nik'     => $request->nik,
                'tanda_jasa_tertinggi'     => $request->tanda_jasa_tertinggi,
                'tanggal_cetak'     => $request->tanggal_cetak,
                'foto'     => $request->foto,
                'ttd'     => $request->ttd,
                'istri_suami'     => $request->istri_suami,
                'nama_istri_suami'     => $request->nama_istri_suami,
                'nik_istri_suami'     => $request->nik_istri_suami,
                'alamat1'     => $request->alamat1,
                'alamat2'     => $request->alamat2,
                'wil_rayon'     => $request->wil_rayon
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();

        return [200, ['message' => 'Terima kasih telah menambahkan KTA']];
    }

    public function getDelete($id)
    {
        $data = $this->getKtaById($id);

        if (!$data) {
            throw new ModelException('Data Tidak Ditemukan!', 404);
        }

        DB::beginTransaction();
        try {
            $data->delete();

        } catch (\Throwable $e) {
            DB::rollBack();
            throw new ModelException($e->getMessage(), $e->getCode());
        }
        DB::commit();
        return [200, ['message' => 'Berhasil menghapus data KTA']];
    }
}
