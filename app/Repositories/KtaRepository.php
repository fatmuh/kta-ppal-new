<?php

namespace App\Repositories;

use App\Models\Kta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\KtaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\KtaCollection;
use Illuminate\Support\Facades\Storage;

class KtaRepository
{
    public function getTabulator($request)
    {
        $query = Kta::latest();

        if ($request->has('filter')) {
            $reqFilter = $request->get('filter');
            foreach ($reqFilter as $filter) {
                if($filter['field'] == 'full_name' && $filter['value']) {
                    $query = $query->where('full_name', 'like', '%' .$filter['value']. '%');
                }
            }
        }
        $data = $query->paginate($request->size);

        return [200, KtaCollection::collection($data)->additional(['last_page' => $data->lastPage()])];
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

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $fileName = uniqid(). '.'. $file->getClientOriginalExtension();
                $file->storeAs('public/foto/', $fileName);
                $foto = $fileName;
            } else {
                $foto = "-";
            }

            if ($request->hasFile('ttd')) {
                $file = $request->file('ttd');
                $fileName = uniqid(). '.'. $file->getClientOriginalExtension();
                $file->storeAs('public/ttd/', $fileName);
                $ttd = $fileName;
            } else {
                $ttd = "-";
            }

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
                'foto'     => $foto,
                'ttd'     => $ttd,
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

    public function getDetail($id)
    {
        $data = Kta::where('id', $id)->first();

        if (!$data) {
            throw new ModelException('Data tidak ditemukan!', 404);
        }
        return [200, new KtaCollection($data)];
    }

    public function getUpdate(KtaRequest $request, $id)
    {
        $data = Kta::where('id', $id)->first();
        if (!$data) {
            throw new ModelException('Data tidak ditemukan!', 404);
        }

        DB::beginTransaction();
        try {

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $fileName = uniqid(). '.'. $file->getClientOriginalExtension();
                $file->storeAs('public/foto/', $fileName);

                Storage::delete('public/foto/'. $request->oldFoto);

                $foto = $fileName;
            } else {
                $foto = $request->oldFoto;
            }

            if ($request->hasFile('ttd')) {
                $file = $request->file('ttd');
                $fileName = uniqid(). '.'. $file->getClientOriginalExtension();
                $file->storeAs('public/ttd/', $fileName);

                Storage::delete('public/ttd/'. $request->oldTtd);

                $ttd = $fileName;
            } else {
                $ttd = $request->oldTtd;
            }

            $data->update([
                'no_kta'     => $request->no_kta,
                'full_name'     => $request->full_name,
                'ttl'     => $request->ttl,
                'agama'     => $request->agama,
                'gol_darah'     => $request->gol_darah,
                'pangkat_terakhir'     => $request->pangkat_terakhir,
                'nik'     => $request->nik,
                'tanda_jasa_tertinggi'     => $request->tanda_jasa_tertinggi,
                'tanggal_cetak'     => $request->tanggal_cetak,
                'foto'     => $foto,
                'ttd'     => $ttd,
                'istri_suami'     => $request->istri_suami,
                'nama_istri_suami'     => $request->nama_istri_suami,
                'nik_istri_suami'     => $request->nik_istri_suami,
                'alamat1'     => $request->alamat1,
                'alamat2'     => $request->alamat2,
                'wil_rayon'     => $request->wil_rayon
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            throw new ModelException($e->getMessage(), $e->getCode());
        }
        DB::commit();
        return [200, ['message' => 'Data berhasil diupdate!']];
    }

    public function getDelete($id)
    {
        $data = $this->getKtaById($id);

        if (!$data) {
            throw new ModelException('Data Tidak Ditemukan!', 404);
        }

        DB::beginTransaction();
        try {
            Storage::delete('public/ttd/'. $data->ttd);
            Storage::delete('public/foto/'. $data->foto);
            $data->delete();

        } catch (\Throwable $e) {
            DB::rollBack();
            throw new ModelException($e->getMessage(), $e->getCode());
        }
        DB::commit();
        return [200, ['message' => 'Berhasil menghapus data KTA']];
    }
}
