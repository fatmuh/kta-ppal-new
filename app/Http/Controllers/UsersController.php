<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\UsersRepository;
use App\Http\Requests\UsersUpdateRequest;

class UsersController extends Controller
{
    public function __construct(protected UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function tabulator(Request $request)
    {
        return $this->repository->getTabulator($request);
    }

    public function index(Request $request)
    {
        return view('pages.users.index');
    }

    public function store(UserRequest $request)
    {
        list($code, $reponse) = $this->repository->saveUser($request);
        if ($code === 200) {
            return redirect()->back()->with('success-message', 'Berhasil menambahan User');
        }
        return redirect()->back()->with('error-message', 'Gagal menambahan User');
    }

    public function detail($id)
    {
        list($code, $data) = $this->repository->getDetail($id);
        return view('pages.users.modal._data', [
            'data' => $data
        ]);
    }

    public function update(UsersUpdateRequest $request, $id)
    {
        list($code, $response) = $this->repository->getUpdate($request, $id);
        if ($code === 200) {
            return redirect()->back()->with('success-message', $response['message']);
        }
        return redirect()->back()->with('error-message',  $response['message']);
    }

    public function delete($id)
    {
        list($code, $response) = $this->repository->getDelete($id);
        if ($code === 200) {
            return redirect()->back()->with('success-message', $response['message']);
        }
        return redirect()->back()->with('error-message',  $response['message']);
    }
}
