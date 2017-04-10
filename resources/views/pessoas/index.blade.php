<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
				<link rel = 'stylesheet' type = 'text/css' href = "{{ asset('css/style.min.css') }}" />
    </head>
    <body>
			<div class = 'container'>
			@if(Session::has('success'))
				<div class="panel panel-success">
					<h1>{{ Session::get('success') }}</h1>
				</div>
			@endif
				@if(count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<div class = 'row'>
					<div class = 'col-md-8 col-md-offset-2'>
						<form method="post" action="{{ route('store') }}">
							<div class = 'row'>
								<div class = 'col-md-6'>
									<label for = 'nome'>Nome</label>
									<input type = 'text' class = 'input-lg form-control' name = 'nome' id = 'nome' value="{{ old('nome') }}"/>
								</div>
								<div class = 'col-md-6'>
									<label for = 'email'>Email</label>
									<input type = 'text' class = 'input-lg form-control' name = 'email' id = 'email'/>
								</div>
								<div class = 'col-md-6'>
									<label for = 'telefone'>Telefone</label>
									<input type = 'telefone' class = 'input-lg form-control' name = 'telefone' id = 'telefone'/>
								</div>
								<div class = 'col-md-6'>
									<label for = 'dtnasc'>Data de Nascimento</label>
									<input type = 'date' class = 'input-lg form-control' name = 'dtnasc' id = 'dtnasc'/>
								</div>
								<div class = 'col-md-6'>
									<label for = 'cpf'>CPF</label>
									<input type = 'text' class = 'input-lg form-control' name = 'cpf' id = 'cpf'/>
								</div>
								<div class = 'col-md-6'>
									<label for = 'password'>Senha</label>
									<input type = 'password' class = 'input-lg form-control' name = 'password' id = 'password'/>
								</div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</div>
							<div class="row">
								<div class="col-md-12">
									<input type="submit" class="pull-right btn btn-success btn-lg" value="Salvar">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		<script type = 'text/javascript' src = "{{ asset('js/script.min.js')}}"></script>	
    </body>
</html>
