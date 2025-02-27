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
<div class="container">
        <div class="row justify-content-center">
            <h1  class="row justify-content-center">Thêm cầu thủ</h1>
            <div class="col-md-6 border shadow rounded-3 mt-4">
                <form action="add" method="post" enctype="multipart/form-data">
                    <label for=""class="fw-bold mt-2">Nhập tên cầu thủ</label><br>
                    <input type="text"class="form-control" name="player_name"><br>
                    <label for=""class="fw-bold mt-2">Tải lên ảnh cầu thủ</label><br>
                    <input type="file"class="form-control" name="player_image"><br>
                    <label for=""class="fw-bold mt-2">Thông tin liên hệ</label><br>
                    <input type="text"class="form-control" name="player_position"><br>
                    <label for=""class="fw-bold mt-2">Chọn tên đội bóng</label><br>
                    <select name="team_id" class="form-select" id="">
                        @foreach($team as $value)
                        <option value="{{$value['id']}}">{{$value['team_name']}}</option>
                        @endforeach
                    </select>


                    <input type="submit" class="btn btn-primary mt-4 mb-4" name="add" value="Thêm cầu thủ">
                </form>
            </div>
        </div>
    </div>
</body>
</html>