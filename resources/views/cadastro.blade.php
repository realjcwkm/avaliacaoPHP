@extends('templates.page')

@section('content')
<div id="listaPessoas">

	<h1>Incluindo um Novo Cadastro</h1>
	@if(isset($errors) && count($errors) > 0)
	<div class="fieldErrors">
		@foreach($errors->all() as $erro)
		{{$erro}}<br/>
		@endforeach
	</div>
	@endif
	<form id="formCadastrar" method="post" enctype="multipart/form-data" action="{{url('/pessoa')}}">
		@csrf
		<label for="cNome">Nome</label><br />
		<input type="text" id="cNome" name="cNome" required /><br />

		<label for="cDataNasc">Data de Nascimento</label><br />
		<input type="date" id="cDataNasc" name="cDataNasc" required /><br />

		<label for="cEmail">E-Mail</label><br />
		<input type="email" id="cEmail" name="cEmail" required /><br />

		<label for="cFoto">Foto</label><br />
		<input id="cFoto" name="cFoto" type="file" /><br />
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
	<!-- <a href="" class="btPadrao">Salvar</a> -->

</div>
@endsection