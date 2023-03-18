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

    public function store(KtaRequest $request)
    {
        list($code, $reponse) = $this->repository->saveKta($request);
        if ($code === 200) {
            return redirect()->back()->with('success-message', 'Berhasil menambahkan KTA');
        }
        return redirect()->back()->with('error-message', 'Gagal menambahkan KTA');
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
