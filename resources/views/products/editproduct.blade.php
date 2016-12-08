@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Cadastrar Cliente
@endsection

@section('contentheader_title')
    Cadastrar Cliente
@endsection

@section('main-content')

    <form role="form"  action="{{URL::route('product.update')}}">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <label for="nameProduct">Nome do Produto</label>
                            <input type="hidden" id="url" name="url" class="form-control text-aqua" value="{{$urlPrevious}}"/>
                            <input type="text" id="nameProduct" name="nameProduct" class="form-control text-aqua" value="{{$product->name}}"/>
                        </div>
                        <div class="form-group">
                            <label for="price">Preço</label>
                            <input type="number" id="price" name="price" class="form-control text-aqua" value="{{$product->price}}"/>
                        </div>
                        <div class="form-group">
                            <label for="length">Medida</label>
                            <input type="text" id="length" name="length" class="form-control text-aqua" value="{{$product->length}}"/>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </div>
    </form>
@endsection