@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Produtos
@endsection
@section('contentheader_title')
    Pedidos
@endsection
@section('main-content')

    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Pedidos</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <a href="{{ URL::route('order.new') }}" class="btn btn-success"><i class="fa fa-plus"> Cadastrar </i></a>
            </div>
        </div>

        <div class="box-body">
            <!-- Color Picker -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box-body table-responsive no-padding">

                        <table class="table table-hover table-striped">
                            <tbody>
                            <tr>
                                <th>Número do Pedido</th>
                                <th>Nome do Cliente</th>
                                <th>Produto</th>
                                <th>Status do Pedido</th>
                                <th>Custo</th>
                                <th>Data Acordada</th>
                                <th>Data de Criação</th>
                                <th>Ações</th>

                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->order_number}}</td>
                                    <td>{{$order->client->name}}</td>
                                    <td>{{$order->product->name}}</td>
                                    <td>{{$order->status->name}}</td>
                                    <td>{{$order->cost}}</td>
                                    <td>{{date('d/m/Y H:i:s', strtotime($order->agreement_at))}}</td>
                                    <td>{{date('d/m/Y', strtotime($order->created_at))}}</td>
                                    <td data-title="Actions">
                                        <a href="{{url('/order/edit/'.$order->id)}}" title="" data-tooltip="true"
                                           class="btn btn-info btn-xs" data-original-title="Edit"><i
                                                    class="fa fa-pencil"></i></a>
                                        <a href="{{url('/order/remove/'.$order->id)}}" title="" data-tooltip="true"
                                           data-title="Cliente"
                                           data-confirm="Tem certeza que deseja remover o registro?"
                                           class="btn btn-danger btn-xs" data-original-title="Remove"><i
                                                    class="fa fa-trash-o "></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $orders->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

@endsection