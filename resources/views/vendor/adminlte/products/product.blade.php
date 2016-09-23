@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Produtos
@endsection
@section('contentheader_title')
    Produtos
@endsection
@section('main-content')

    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Produtos</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <a href="{{ URL::route('product.new') }}" class="btn btn-success"><i class="fa fa-plus"> Cadastrar </i></a>
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
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Comprimento</th>
                                <th>Data Criação</th>
                                <th>Ações</th>

                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->length}}</td>
                                    <td>{{date('d/m/Y', strtotime($product->created_at))}}</td>
                                    <td data-title="Actions">
                                        <a href="{{url('/product/edit/'.$product->id)}}" title="" data-tooltip="true"
                                           class="btn btn-warning btn-xs" data-original-title="Edit"><i
                                                    class="fa fa-pencil"></i></a>
                                        <a href="{{url('/product/remove/'.$product->id)}}" title="" data-tooltip="true"
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
        </div>
    </div>
@endsection