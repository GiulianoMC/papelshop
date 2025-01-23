<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoriaRequest;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FinalController extends Controller
{

    public function index()
    {
        $orderNumber = rand(10000000, 99999999);
        
        return view('final', compact('orderNumber'));
    }

}