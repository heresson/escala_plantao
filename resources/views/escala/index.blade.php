@extends('layouts.adminlte.master')

@section('conteudo')

<div class="row">
    <div class="col-sm-12">
        <a href="{{route('escala.create')}}" class="btn btn-success float-right">Criar Escala</a>
    <h2>Lista de Escalas Cadastradas</h2>

        <div class="clearfix"></div>
    </div>
</div>

<div class="container mt-5">
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Região Administrativa</th>
                <th scope="col">Cidade</th>
                <th scope="col">Atribuição</th>
                <th scope="col">Membro</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($escala as $es)
                <tr>
                    <td>{{date('d/m/Y', strtotime($es->es_dt))}}</td>
                    <td>{{$es->read_ds}}</td>
                    <td>{{$es->muni_ds}}</td>
                    <td>{{Config::get('enums.especialidade.'.$es->es_cd_especialidade)}}</td>
                    <td>{{$es->memb_nm}}</td>
                </tr>

            @endforeach
        </tbody>
    </table>

</div>
@endsection


@section('css')
@endsection
