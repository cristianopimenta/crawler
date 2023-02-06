<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Lista Cadastro Perfil Ex. Github</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('cadastro.create') }}"> Novo Perfil</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Perfil</th>                   
                    <th width="350px">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cadastro as $cads)
                    <tr>
                        <td>{{ $cads->id }}</td>
                        <td>{{ $cads->nome }}</td>
                        <td>{{ $cads->perfil }}</td>                        
                        <td>
                            <form action="{{ route('cadastro.destroy',$cads->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('cadastro.edit',$cads->id) }}">Editar</a>
                                <?php $n = $cads->nome;?>
                                <a class="btn btn-warning" href="https://otimizesistemas.com.br/raspa/index.php?nome={{$cads->nome}}" target="_blank" >Perfil</a>
                                <a class="btn btn-warning" href="https://otimizesistemas.com.br/raspa/wgit.php?nome={{$cads->nome}}" target="_blank">GitHub R</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
   {!! $cadastro->links()!!}
    </div>
</body>
</html>