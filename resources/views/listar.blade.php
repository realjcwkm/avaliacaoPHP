@extends('templates.page')

@section('content')
<div id="listaPessoas">
	<h1>Cadastros</h1>

	<a href="javascript:;" class="btPadraoExcluir">Excluir</a>

	<table id="tLista" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<th width="5%"><input type="checkbox" /></th>
			<th width="10%">ID</th>
			<th class="tL">Nome</th>
			<th width="20%">Data de Nascimento</th>
			<th width="10%">Dep</th>
			<th width="8%">Status</th>
		</tr>

		@foreach($pessoas as $pessoa)

		<tr>
			<td align="center" style="border-left:0;"><input type="checkbox" /></td>
			<td align="center">{{$pessoa->id}}</td>
			<td><a href="{{url('pessoa/'.$pessoa->id.'/edit')}}" class="linkUser">{{$pessoa->nome}}</a></td>
			<td align="center">{{date('d/m/Y', strtotime($pessoa->data_nasc))}}</td>
			<td align="center"><a href="dependentes.php" class="btAdicionar"></a></td>
			<td align="center"><a id="idStatus{{$pessoa->id}}" href="javascript:;" onclick="changeStatus('idStatus{{$pessoa->id}}');" class="btVerde"></a></td>
		</tr>
		<script>
			function changeStatus(id) {
				var element = document.getElementById(id);
				if (element.className == "btCinza")
					element.className = "btVerde";
				else
					element.className = "btCinza";
			}
		</script>

		<!-- <tr>
				<td align="center" style="border-left:0;"><input type="checkbox" /></td>
				<td align="center">001</td>
				<td><a href="editar.php" class="linkUser">Fulano de Tal Silva</a></td>
				<td align="center">08/12/1982</td>
				<td align="center"><a href="dependentes.php" class="btAdicionar"></a></td>
				<td align="center"><a href="javascript:;" class="btCinza"></a></td>
			</tr> -->
		@endforeach


	</table>

</div>

<div id="paginacao">
	<a href="" class="btSeta1"></a>
	<div id="pags">1 de 10</div> <a href="" class="btSeta2"></a>
	<select id="paginas">
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
	</select>
</div>
@endsection