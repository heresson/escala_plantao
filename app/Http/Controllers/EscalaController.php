<?php

namespace App\Http\Controllers;

use App\Models\Escala;
use App\Models\Membro;
use App\Models\Cidade;
use App\Models\RegiaoAdministrativa;
use App\Http\Requests\EscalaRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EscalaController extends Controller
{


    public function index()

    {

        // $escala = Escala::paginate(15);
        //$escala = Escala::all();

        $escala = DB::table('tab_escala')
            ->join('v_municipio_nucleus', 'tab_escala.ES_MUNI_NR_SEQ', '=', 'v_municipio_nucleus.MUNI_NR_SEQ')
            ->join('v_membros', 'tab_escala.ES_MEMB_CD', '=', 'v_membros.MEMB_CD')
            ->join('v_regiaoadm_nucleus', 'tab_escala.ES_READ_NR_SEQ', '=', 'v_regiaoadm_nucleus.read_nr_seq')
            ->select('tab_escala.*', 'v_municipio_nucleus.muni_ds', 'v_membros.memb_carg_descricao', 'v_membros.memb_nm', 'v_regiaoadm_nucleus.read_ds')
            ->orderBy('tab_escala.es_dt', 'asc')
            ->orderBy('v_regiaoadm_nucleus.read_nr_seq', 'asc')
            ->orderBy('v_municipio_nucleus.MUNI_NR_SEQ', 'asc')
           ->get();

        // dd($escala);

        return view('escala.index', compact('escala'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $membros = Membro::where('MEMB_SITUACAO', '=', 'A')->orderBy('memb_nm')->get();

        $cidades = Cidade::where('MUNI_IN_ATIVO', '=', 'S')->orderBy('MUNI_DS')->get();

        $regioesAdm = RegiaoAdministrativa::where('READ_IN_ATIVO', '=', 'S')->orderBy('READ_DS')->get();

        //dd($regioesAdm[0]);

        return view('escala.create', compact('membros', 'cidades', 'regioesAdm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EscalaRequest $request)
    {

        try {

        $escala = new Escala;

        $escala->ES_READ_NR_SEQ = $request->ES_READ_NR_SEQ;
        $escala->ES_MEMB_CD = $request->ES_MEMB_CD;
        $escala->ES_MUNI_NR_SEQ = $request->ES_MUNI_NR_SEQ;
        $escala->ES_DT = $request->ES_DT;
        $escala->ES_CD_ESPECIALIDADE = $request->ES_CD_ESPECIALIDADE;


        $escala->save();

        return redirect()->route('escala.index');


        } catch (Exception $e) {
            error_log('----------ENTRANDO NO CATCH');

            $message = 'Erro ao criar registro de escala';

            error_log($e->getMessage());


            //if(env('APP_DEBUG')) {
                $message = $e->getMessage();
            //}

            //flash($message)->warning();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escala  $escala
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $escala = Escala::findOrFail($id);
        dd($escala);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Escala  $escala
     * @return \Illuminate\Http\Response
     */
    public function edit(Escala $escala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Escala  $escala
     * @return \Illuminate\Http\Response
     */
    public function update(EscalaRequest $request, Escala $escala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escala  $escala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escala $escala)
    {
        try {
            $escala->delete();

            //flash('Registro removido com sucesso!')->success();

            return redirect()->route('escala.index');

        } catch (Exception $e) {
            $message = 'Erro ao criar registro de escala';

            if(env('APP_DEBUG')) {
                $message = $e->getMessage();
            }

            //flash($message)->warning();
            return redirect()->back();
        }
    }
}
