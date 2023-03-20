<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KtaRequest;
use App\Repositories\KtaRepository;

class KtaController extends Controller
{

    public function __construct(protected KtaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function tabulator(Request $request)
    {
        return $this->repository->getTabulator($request);
    }

    public function index(Request $request)
    {
        return view('pages.kta.index');
    }

    public function detail($id)
    {
        list($code, $data) = $this->repository->getDetail($id);
        return view('pages.kta.detail', [
            'data' => $data
        ]);
    }

    public function store(KtaRequest $request)
    {
        list($code, $reponse) = $this->repository->saveKta($request);
        if ($code === 200) {
            return redirect()->back()->with('success-message', 'Berhasil menambahkan KTA');
        }
        return redirect()->back()->with('error-message', 'Gagal menambahkan KTA');
    }

    public function update(KtaRequest $request, $id)
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

    public function front($id)
    {
        list($code, $data) = $this->repository->getDetail($id);
        return view('pages.kta.modal._data', [
            'data' => $data
        ]);
    }

    public function back($id)
    {
        list($code, $data) = $this->repository->getDetail($id);
        return view('pages.kta.modal._backData', [
            'data' => $data
        ]);
    }
}
