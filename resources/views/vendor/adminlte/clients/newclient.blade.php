@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Cadastrar Cliente
@endsection

@section('contentheader_title')
    Cadastrar Cliente
@endsection

@section('main-content')
    <form role="form"  action="{{URL::route('client.create')}}">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nameClient">Nome do Cliente</label>
                            <input type="text" id="nameClient" name="nameClient" class="form-control text-aqua"/>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control text-aqua"/>
                        </div>
                        <div class="form-group">
                            <label for="document">Documento</label>
                            <input type="text" id="document" name="document" class="form-control text-aqua"/>
                        </div>
                        <div class="form-group">
                            <label for="city">Cidade</label>
                            <input type="text" id="city" name="city" class="form-control text-aqua"/>
                        </div>

                        <div class="form-group">
                            <label for="neighborhood">Bairro</label>
                            <input type="text" id="neighborhood" name="neighborhood" class="form-control text-aqua"/>
                        </div>

                        <div class="form-group">
                        <label for="number">Numero</label>
                        <input type="number" id="number" name="number" class="form-control text-aqua"/>
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