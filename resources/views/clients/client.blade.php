@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Clientes
@endsection

@section('contentheader_title')
    Clientes
@endsection

@section('main-content')
    <div class="box box-solid">
        <div class="box-header">
            {{--<h3 class="box-title">Produtos</h3>--}}
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <a href="{{ URL::route('client.new') }}" class="btn btn-success"><i class="fa fa-plus"> Cadastrar </i></a>
            </div>
            </br>
        </div>

        <div class="box-body">
            <!-- Color Picker -->
            <div class="row">
                <div class="col-xs-12">

                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-striped">
                                <tbody>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Documento</th>
                                    <th>Cidade</th>
                                    <th>Bairro</th>
                                    <th>Numero</th>
                                    <th>Saldo</th>
                                    <th>Data de Criação</th>
                                    <th>Ações</th>

                                </tr>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->document}}</td>
                                        <td>{{$client->city}}</td>
                                        <td>{{$client->neighborhood}}</td>
                                        <td>{{$client->number}}</td>
                                        <td>{{$client->balance}}</td>
                                        <td>{{date('d/m/Y', strtotime($client->created_at))}}</td>
                                        <td data-title="Actions">
                                            <a href="{{url('/client/edit/'.$client->id)}}" title="" data-tooltip="true" class="btn btn-info btn-xs" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="{{url('/client/remove/'.$client->id)}}" title="" data-tooltip="true" data-title="Cliente" data-confirm="Tem certeza que deseja remover o registro?" class="btn btn-danger btn-xs" data-original-title="Remove"><i class="fa fa-trash-o "></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $clients->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
@endsection
