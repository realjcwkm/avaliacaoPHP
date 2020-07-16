@extends('templates.page')

@section('content')
<div id="listaPessoas">

	<h1>Editando o Cadastro</h1>

	<form id="formCadastrar" method="post" enctype="multipart/form-data" action="{{url('pessoa/'.$pessoa->id)}}">
		@method('PUT')
		@csrf
		<label for="cNome">Nome</label><br />
		<input id="cNome" name="cNome" value="{{$pessoa->nome ?? ''}}" required/><br />

		<label for="cDataNasc">Data de Nascimento</label><br />
		<input id="cDataNasc" name="cDataNasc" value="{{$pessoa->data_nasc ?? ''}}" required/><br />

		<label for="cEmail">E-Mail</label><br />
		<input id="cEmail" name="cEmail" value="{{$pessoa->email ?? ''}}" required/><br />

		<label for="cFoto">Foto</label><br />
		<input id="cFoto" name="cFoto" type="file" value="{{$pessoa->url_foto ?? ''}}"/><br />
		<input type="submit" value="Salvar">
	</form>
	<script>
		const fields = document.querySelectorAll("[required]");

		function customValidation(event) {
			const field = event.target;

			field.setCustomValidity("Esse campo é obrigatório");
		}
		for (field of fields) {
			field.addEventListener("invalid", customValidation);
		}

		const fieldDate = document.getElementById('cDataNasc');

		// const yearBirthDay 
		fieldDate.onchange = function() {
			fieldDate.setCustomValidity('');
			var yearNow = parseInt(new Date().getFullYear(), 10);
			var birthdayYear = parseInt(new Date(fieldDate.value).getFullYear(), 10);
			var yearDiff = yearNow - birthdayYear;

			if (yearDiff > 120 || yearDiff < 0) {
				fieldDate.setCustomValidity("Idade inválida");
			}
		}

		const uploadField = document.getElementById("cFoto");
		uploadField.onchange = function() {
			if (this.files[0].size > 204800) {
				alert("A imagem é muito grande (limite de 200kb)");
				this.value = "";
			}
		};
	</script>
	<!-- <a href="javascript:;" class="btPadrao">Salvar</a> -->

</div>
@endsection