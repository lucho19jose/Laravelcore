<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>
      <div class="container">
        <div class="row">
          <div class="col-sm-8 mx-auto">
          <div class="card border-0 shadow">
            <div class="card-body">
              @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                - {{ $error }} <br/>
                @endforeach
              </div>
              @endif
              <form action="{{ route('users.store') }}" method="POST">
                <div class="form-row">
                  <div class="col-sm-3">
                    <input type="text" name="name" class="form-control" placeholder="nombre" value="{{ old('name') }}">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" name="email" class="form-control" placeholder="email" value="{{ old('email') }}">
                  </div>
                  <div class="col-sm-3">
                    <input type="password" name="password" class="form-control" placeholder="password">
                  </div>
                  <div class="col-auto">
                    @csrf
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  <form action="{{ route('users.destroy', $user) }}" method="POST">
                  <!--accion que vamos hacer es eliminar-->
                   @method('DELETE')
                   <!--Token de seguridad-->
                   @csrf
                   <input type="submit"
                          value="Delete"
                          class="btn btn-sm btn-danger"
                          onclick="return confirm('¿Desea eliminar... ?')"> 
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </body>
</html>
