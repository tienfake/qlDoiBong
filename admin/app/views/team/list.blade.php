<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4">
       
        <table class="table mt-4">
            <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>logo</th>
                <th>color</th>
                <th>coach_id</th>
                <th>Action</th>
            </tr>
            </thead>
          <tbody>
          @foreach($team as $value)
            <tr>
                <td>{{$value['id']}}</td>
                <td>{{$value['team_name']}}</td>
                <td><img src="{{$value['team_logo']}}" alt="" style="width: 50px;"></td>
                <td>{{$value['team_color']}}</td>
                <td>{{$value['coach_id']}}</td>
                <td>
                    <a href="updateView&id={{$value['id']}}" class="btn btn-primary">update</a>
                    <a href="deleteT&id={{$value['id']}}" onclick="confirm('delete?')" class="btn btn-danger">delete</a>
                </td>
            </tr>
            @endforeach
          </tbody>
          
        </table>
        <a href="addTeamView" class="btn btn-secondary">Thêm đội bóng</a>
    </div>

</body>

</html>