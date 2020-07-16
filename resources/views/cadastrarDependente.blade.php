@extends('templates.page')

@section('content')
<div id="listaPessoas">
	<h1>Dependentes</h1>

	<div id="infoDep">

		<div id="fotoCadastro">
			<img src="{{$pessoa->url_foto}}" width="77" height="77" />
		</div>

		<table id="tListaCad" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td class="tituloTab">Nome</td>
				<td>{{$pessoa->nome}}</td>
			</tr>
			<tr bgcolor="#cddeeb">
				<td class="tituloTab">Data de Nascimento</td>
				<td>{{date('d/m/Y', strtotime($pessoa->data_nasc))}}</td>
			</tr>
			<tr>
				<td class="tituloTab">Email</td>
				<td>{{$pessoa->email}}</td>
			</tr>
		</table>

		<form id="frmAdicionaDep" action="">

			<div class="agrupa mB mR">
				<label for="cNomeDep">Nome</label><br />
				<input type="text" name="cNomeDep" id="cNomeDep" />
			</div>
			<div class="agrupa">
				<label for="cDataNasc">Data de Nascimento</label><br />
				<input type="text" name="cDataNasc" id="cDataNasc" />
			</div>

			<a href="javascript:;" class="btPadrao">Adicionar</a>

		</form>
		@php
		$dependentes=$pessoa->find($pessoa->id)->relDependentes;
		@endphp

		<table id="tLista" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<th width="60%" class="tL">Nome do Dependente</th>
				<th width="33%">Data de Nascimento</th>
				<th></th>
			</tr>
			
			@foreach($dependentes as $dependente)
				<tr>
					<td>{{$dependente->nome}}</td>
					<td align="center">{{date('d/m/Y', strtotime($dependente->data_nasc))}}</td>
					<td align="center"><a href="" class="btRemover"></a></td>
				</tr>
			@endforeach
		</table>

		<a href="javascript:;" class="btPadrao mT">Salvar</a>
	</div>

</div>

@endsection