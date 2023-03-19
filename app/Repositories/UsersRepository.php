<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;
use App\Http\Requests\UsersUpdateRequest;

class UsersRepository
{
    public function getTabulator($request)
    {
        $query = User::all();

        if ($request->has('filter')) {
            $reqFilter = $request->get('filter');
            foreach ($reqFilter as $filter) {
                if($filter['field'] == 'email' && $filter['value']) {
                    $query = $query->where(function ($qq) use ($filter) {
                        $qq->where('email', 'like', '%' . $filter['value'] . '%');
                    });
                }
            }
        }
        $data = $query->last()->paginate($request->size);

        return UserCollection::collection($data)->additional(['last_page' => $data->lastPage()]);
    }

    public function getUsersById($id)
    {
        return User::where('id', $id)->first();
    }

    public function saveUser(UserRequest $request)
    {

        $password = Hash::make($request->password);

        DB::beginTransaction();
        try {
            User::create([
                'name'     => $request->name,
                'email'     => $request->email,
                'password'  => $password,
                'gender'     => "-",
                'active'    => 0
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();

        return [200, ['message' => 'Terima kasih telah mambahkan User']];
    }

    public function getDetail($id)
    {
        $data = User::where('id', $id)->first();

        if (!$data) {
            throw new ModelException('Data tidak ditemukan!', 404);
        }
        return [200, new UserCollection($data)];
    }

    public function getUpdate(UsersUpdateRequest $request, $id)
    {
        $data = User::where('id', $id)->first();
        if (!$data) {
            throw new ModelException('Data tidak ditemukan!', 404);
        }

        DB::beginTransaction();
        try {

            $data->update([
                'name'     => $request->edit_users_name,
                'email'     => $request->edit_users_email,
                'active'     => $request->edit_users_status
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
        $data = $this->getUsersById($id);

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
        return [200, ['message' => 'Berhasil menghapus data user']];
    }
}
