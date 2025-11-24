<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Frete;
use Illuminate\Http\Request;

class RastreamentoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $codigoRastreio= $request->input('codigo_rastreio');

        // $frete=Frete::get();
        // dd($frete);
        // $frete = Frete::where('codigo_rastreio','teste123' )->first();
       // $frete = Frete::where('codigo_rastreio','teste123' )
        // $frete = Frete::where('codigo_rastreio',  $codigoRastreio )
           $frete = Frete::where('codigo_rastreio',  $codigoRastreio,'' )
           ->with('etapas')
            ->first();
      // dd($frete);
      if (!$frete) {
        return redirect()->back()->with('error','Frete nao encontrado');       # code...
      }
             return view("frete.rastreamento",['frete'=>$frete]);
    }
}
