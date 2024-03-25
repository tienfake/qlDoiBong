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
    <!-- <div class="container">
    
    </div> -->
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 border shadow rounded-3 mt-4">
        <form action="updateT&id={{$team['id']}}" method="post" enctype="multipart/form-data" class="">
        @if($team)
        <label for=""class="fw-bold mt-2">Tên đội bóng</label><br>
        <input type="text" name="team_name" class="form-control" value="{{$team['team_name']}}"><br>
        <label for=""class="fw-bold mt-2">Ảnh đội bóng cũ</label><br>
        <img src="{{$team['team_logo']}}"  class="img-fluid" style="height: 80px;" alt=""><br>
        <label for=""class="fw-bold mt-2">Ảnh đội bóng mới</label><br>
        <input type="file" name="team_logo"value=""class="form-control"><br>
        <label for=""class="fw-bold mt-2">Màu chuyền thống</label><br>
        <input type="text" class="form-control" name="team_color"value="{{$team['team_color']}}"><br>
        <label for=""class="fw-bold mt-2">ID Coach</label><br>
        <input type="text"class="form-control" name="coach_id"value="{{$team['coach_id']}}"><br>
        <input type="submit" name="updateT"class="btn btn-primary mt-2 mb-4"value="Cập nhật">
        @endif
    </form>
        </div>
    </div>
</div>
   
</body>
</html>