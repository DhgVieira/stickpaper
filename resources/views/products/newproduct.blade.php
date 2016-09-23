@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Cadastrar Produto
@endsection
@section('contentheader_title')
    Cadastrar Produtos
@endsection

@section('main-content')
    <form role="form"  action="{{URL::route('product.create')}}">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastrar Produto</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameProduct">Nome do Produto</label>
                            <input type="text" id="nameProduct" name="nameProduct" class="form-control text-aqua"/>
                        </div>
                        <div class="form-group">
                            <label for="price">Preço</label>
                            <input type="number" id="price" name="price" class="form-control text-aqua"/>
                        </div>
                        <div class="form-group">
                            <label for="length">Medida</label>
                            <input type="text" id="length" name="length" class="form-control text-aqua"/>
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