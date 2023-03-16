<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;

class UsersRepository
{
    public function getTabulator($request)
    {
        $query = User::all();

        if ($request->has('filter')) {
            $reqFilter = $request->get('filter');
            foreach ($reqFilter as $filter) {
                if($filter['field'] == 'name' && $filter['value']) {
                    $query = $query->where(function ($qq) use ($filter) {
                        $qq->where('email', 'like', '%' . $filter['value'] . '%');
                    });
                }
            }
        }
        $data = $query->last()->paginate($request->size);

        return UserCollection::collection($data)->additional(['last_page' => $data->lastPage()]);
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
}
