@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Cadastrar Produto
@endsection
@section('contentheader_title')
    Cadastrar Produtos
@endsection

@section('main-content')
    <form role="form" action="{{URL::route('order.update')}}">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastrar Pedido</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{$order->id}}">
                            <label for="client">Cliente</label>
                            <select id="client" name="client" class="form-control text-aqua">
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}"
                                            @if($client->id == $order->client->id)
                                            selected
                                            @endif
                                    >
                                        {{$client->name}}
                                    </option>
                                @endforeach
                            </select>
                            {{--<input type="text" id="client" name="client" class="form-control text-aqua"/>--}}
                        </div>
                        <div class="form-group">
                            <label for="product">Produto</label>
                            <select id="product" name="product" class="form-control text-aqua">
                                @foreach($products as $product)
                                    <option value="{{$product->id}}"
                                            @if($product->id == $order->product->id)
                                            selected
                                            @endif
                                    >
                                        {{$product->name .' '. $product->length}}
                                    </option>
                                @endforeach
                            </select>
                            {{--<input type="text" id="client" name="client" class="form-control text-aqua"/>--}}
                        </div>
                        <div class="form-group">
                            <label for="agreement">Data do Evento</label>
                            <input id="datetimepicker" name="agreement" type="text" class="form-control text-aqua " value="{{date('d/m/Y H:i:s', strtotime($order->agreement_at))}}"/>
                        </div>

                        <div class="form-group">
                            <label for="qty">Quantidade</label>
                            <input type="number" id="qty" name="qty" class="form-control text-aqua" value="{{$order->qty}}"/>
                        </div>
                        <div class="form-group">
                            <label for="cost">Preço</label>
                            <input type="number" id="cost" name="cost" class="form-control text-aqua" value="{{$order->cost}}"/>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </div>

    </form>
@endsection
