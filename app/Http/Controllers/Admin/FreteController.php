<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFreteRequest;
use App\Http\Requests\StoreFreteRequest;
use App\Http\Requests\UpdateFreteRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Frete; // Certifique-se de que o modelo Frete está importado corretamente

class FreteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('frete_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $fretes = Frete::all();
    
        return view('admin.fretes.index', compact('fretes'));
    }

    public function create()
    {
        abort_if(Gate::denies('frete_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fretes.create');
    }

    public function store(StoreFreteRequest $request)
    {
        Frete::create($request->all());

        return redirect()->route('admin.fretes.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('frete_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fretes = Frete::find($id);
        if (!$fretes) {
            return redirect()->route('admin.fretes.index')->with('error', 'Frete não encontrada');
        }
        return view('admin.fretes.edit', compact('fretes'));
    }

    public function update(UpdateFreteRequest $request, $id)
    {

        $frete = Frete::find($id);
        $data = $request->all();

        $frete->update($data);

        return redirect()->route('admin.fretes.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('frete_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $frete = Frete::find($id);
        if (!$frete) {
            return redirect()->route('admin.fretes.index')->with('error', 'Frete não encontrada');
        }

        return view('admin.fretes.show', compact('frete'));
    }

    public function destroy(Frete $frete)
    {
        abort_if(Gate::denies('frete_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $frete->delete();

        return back();
    }

    public function massDestroy(MassDestroyFreteRequest $request)
    {
        Frete::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function get($uf)
    {   
        $frete = Frete::where('estado', $uf)->first();

    /*    if (!$frete) {
            return response()->json([
                'error' => 'Infelizmente nao atendemos sua Regiao'
            ], 404); // Retorna um código HTTP 404
        }*/

        return response()->json($frete->valor);
    }
    
}
