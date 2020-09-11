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
