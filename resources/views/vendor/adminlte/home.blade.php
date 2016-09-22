@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection
@section('contentheader_title')
	Home
@endsection

@section('main-content')
	<div class="row" >
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

				<div class="info-box-content">
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Likes</span>
					<span class="info-box-number">41,410</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->

		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Vendas</span>
					<span class="info-box-number">760</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		{{--<div class="col-md-3 col-sm-6 col-xs-12">--}}
			{{--<div class="info-box">--}}
				{{--<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>--}}

				{{--<div class="info-box-content">--}}
					{{--<span class="info-box-text">New Members</span>--}}
					{{--<span class="info-box-number">2,000</span>--}}
				{{--</div>--}}
				{{--<!-- /.info-box-content -->--}}
			{{--</div>--}}
			{{--<!-- /.info-box -->--}}
		{{--</div>--}}
		<!-- /.col -->
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Reports Mensal</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="row">
						<div class="col-md-8">
							<p class="text-center">
								<strong>Vendas: {{date('d/m/Y')}}</strong>
							</p>

							<div class="chart">
								<!-- Sales Chart Canvas -->
								<canvas id="salesChart" style="height: 180px; width: 1030px;" height="180" width="1030">
								</canvas>
							</div>
							<!-- /.chart-responsive -->
						</div>
						<!-- /.col -->

						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- ./box-body -->
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<span class="description-percentage text-green"><i class="fa fa-caret-up"></i></span>
								<h5 class="description-header">$35,210.43</h5>
								<span class="description-text">Total Vendas</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
								<h5 class="description-header">$10,390.90</h5>
								<span class="description-text">Total Custo </span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-3 col-xs-6">
							<div class="description-block border-right">
								<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
								<h5 class="description-header">$24,813.53</h5>
								<span class="description-text">Total Entrada</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-3 col-xs-6">
							<div class="description-block">
								<span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
								<h5 class="description-header">1200</h5>
								<span class="description-text">GOAL COMPLETIONS</span>
							</div>
							<!-- /.description-block -->
						</div>
					</div>
					<!-- /.row -->
				</div>
				<!-- /.box-footer -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
@endsection
