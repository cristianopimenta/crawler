<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Novo Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Incluir Novo Perfil</h2>
                </div>                
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('cadastro.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <input type="text" name="nome" class="form-control" placeholder="Nome usuario">
                        @error('nome')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Link Perfil:</strong>
                        <input type="text" name="perfil" class="form-control" placeholder="Link Perfil">
                        @error('perfil')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>              
               
                <div class="pull-right">
                    <button type="submit" class="btn btn-success ml-3">Enviar Dados</button>
                    <a class="btn btn-primary" href="{{ route('cadastro.index') }}"> Voltar</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>