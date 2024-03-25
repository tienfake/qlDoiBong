<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Player</th>
                <th scope="col">Tên cầu thủ</th>
                <th scope="col">Ảnh cầu thủ</th>
                <th scope="col">Liên hệ</th>
                <th scope="col">Đội bóng</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($player as $value)
            <tr>
                <th scope="row">{{$value['player_id']}}</th>
                <td>{{$value['player_name']}}</td>
                <td><img src="{{$value['player_image']}}" style="height: 60px;" alt=""></td>
                <td>{{$value['player_position']}}</td>
                <td>{{$value['team_name']}}</td>
                <td>
                <a href="update-player-view&id={{$value['player_id']}}" class="btn btn-primary">update</a>
                    <a href="delete&id={{$value['player_id']}}" onclick="confirm('delete?')" class="btn btn-danger">delete</a>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <a href="add-player-view" class="btn btn-secondary">Thêm cầu thủ</a>
    </div>

    
</body>

</html>