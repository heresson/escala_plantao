@extends('layouts.adminlte.master')

@section('conteudo')
<form action="{{route('escala.save')}}" method="POST">
    @csrf
    @method("POST")

    <div class="form-group">
        <label>Região Administrativa</label>
        <select name="ES_READ_NR_SEQ" id="ES_READ_NR_SEQ" class="form-control" autofocus="autofocus" >
            <option value="" selected disabled>Selecione uma opção...</option>
            @foreach ( $regioesAdm as $regiaoAdm)
                <option value="{{$regiaoAdm->read_nr_seq}}">{{$regiaoAdm->read_ds}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Cidade</label>
        <select name="ES_MUNI_NR_SEQ" id="ES_MUNI_NR_SEQ" class="form-control @error('ES_MUNI_NR_SEQ') is-invalid @enderror" autofocus="autofocus">

        </select>
        @error('ES_MUNI_NR_SEQ')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="col-form-label">Nome Membro</label>
        <select name="ES_MEMB_CD" class="form-control app-modal-edit-sessao" autofocus="autofocus" >
            @foreach ( $membros as $membro)
                <option value="{{$membro->memb_cd}}">{{$membro->memb_nm}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Função</label>
        <select name="funcao" class="form-control" autofocus="autofocus" >
            <option value="1">Procurador(a) de Justiça</option>
            <option value="2">Promotor(a) de Justiça</option>
        </select>
    </div>


    <div class="form-group">
        <label>Data</label>
        <input type="text" name="ES_DT" class="datepicker form-control @error('ES_DT') is-invalid @enderror" value="{{old('ES_DT')}}">
        @error('ES_DT')
            <p class="invalid-feedback">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="col-form-label">Especialidade</label>
        <select name="ES_CD_ESPECIALIDADE" class="form-control app-modal-edit-sessao" autofocus="autofocus" >
            @foreach ( Config::get('enums.especialidade') as $sID => $sName )
                @if($sID == '4')
                    <option value="{{$sID}}" selected="selected">{{$sName}}</option>
                @else
                    <option value="{{$sID}}">{{$sName}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <button class="btn btn-lg btn-success">Criar Categorias</button>
</form>




@endsection

@section('js')
    <script src="{{asset('/js/escala.js')}}"></script>
@endsection


@section('css')
@endsection
