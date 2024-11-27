<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Exports\PessoasExport;
use App\Pessoa;
use PDF;

class RelPessoasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rel_pessoa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pessoas = Pessoa::all();

        return view('admin.relPessoas.index', compact('pessoas'));
    }

}
