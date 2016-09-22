@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Clientes
@endsection

@section('contentheader_title')
    Clientes
@endsection

@section('main-content')
    @if(Session::has('message-success'))
        <div class="alert alert-success">
            <i class="fa fa-times-circle fa-fw fa-lg"></i>
            <span>{{ Session::get('message-success') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
    @endif
    @if(Session::has('message-error'))
        <div class="alert alert-danger">
            <i class="fa fa-times-circle fa-fw fa-lg"></i>
            <span>{{ Session::get('message-error') }}</span>
        </div>
    @endif
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
                    {{--<div class="box">--}}
                        {{--<div class="box-header">--}}
                            {{--<h3 class="box-title">Responsive Hover Table</h3>--}}


                            {{--<div class="box-tools">--}}
                                {{--<div class="input-group input-group-sm" style="width: 150px;">--}}
                                    {{--<input type="text" name="table_search" class="form-control pull-right"--}}
                                           {{--placeholder="Search">--}}

                                    {{--<div class="input-group-btn">--}}
                                        {{--<button type="submit" class="btn btn-default"><i class="fa fa-search"></i>--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- /.box-header -->--}}
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
                                        <td>{{date('d/m/Y', strtotime($client->created_at))}}</td>
                                        <td data-title="Actions">
                                            <a href="http://teste-rlacerda83.rhcloud.com/hours-control/edit/805" title="" data-tooltip="true" class="table-link edit" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="http://teste-rlacerda83.rhcloud.com/hours-control/remove/805" title="" data-tooltip="true" data-title="Hours Control" data-confirm="Are you sure you want to remove this register?" class="table-link danger delete" data-original-title="Remove"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection