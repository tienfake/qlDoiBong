<?php

namespace App\controllers;

use App\models\TeamModel;

class TeamController extends BaseController
{
    function listTeam()
    {
        $obj = new TeamModel();
        $team = $obj->getAllTeam();
        include 'app/views/layout/menu.php';
        return $this->render('team.list', ['team' => $team]);
    }
    function addTeamView()
    {
        return $this->render('team.add');
    }
    function addT()
    
    {
        if (isset($_POST['addT'])) {
            $targetDir = "../public/image/"; // Thư mục lưu trữ tệp ảnh

            // Kiểm tra xem thư mục lưu trữ tệp ảnh có tồn tại không
            if (!file_exists($targetDir)) {
                echo 'Lỗi: Thư mục lưu trữ tệp ảnh không tồn tại.';
                return;
            }

            // Xử lý tập tin ảnh từ $_FILES
            $team_logo_name = $_FILES['team_logo']['name'];
            $team_logo_tmp = $_FILES['team_logo']['tmp_name'];
            $team_logo_path = $targetDir . $team_logo_name;

            // Di chuyển hoặc sao chép tệp ảnh vào thư mục lưu trữ
            if (!move_uploaded_file($team_logo_tmp, $team_logo_path)) {
                echo 'Lỗi khi tải lên tập tin ảnh.';
                return;
            }
            // Thực hiện thêm đội mới vào cơ sở dữ liệu
            $obj = new TeamModel();
            $obj->addTeam($_POST['team_name'], $team_logo_path, $_POST['team_color'], $_POST['coach_id']);
            header("location:list-team");
        }
    }

    function deleteT(){
        $obj=new TeamModel();
        $team_id=$_GET['id'];
        $obj->deleteTeam($team_id);
        header("location:list-team");
    }
    function updateView(){
        $obj = new TeamModel();
        $team_id=$_GET['id'];
        $team = $obj->getTeam($team_id);
        return $this->render('team.update', ['team' => $team]);
    }
    function updateT() {
        if (isset($_POST['updateT'])) {
            $obj = new TeamModel();
    
            // Kiểm tra xem người dùng đã tải lên hình ảnh mới hay không
            if ($_FILES['team_logo']['size'] > 0) {
                // Nếu có hình ảnh mới, thực hiện tải lên và lưu trữ hình ảnh mới
                $targetDir = "../public/image/";
                $team_logo_name = $_FILES['team_logo']['name'];
                $team_logo_tmp = $_FILES['team_logo']['tmp_name'];
                $team_logo_path = $targetDir . $team_logo_name;
                
                // Di chuyển hoặc sao chép tệp ảnh vào thư mục lưu trữ
                if (!move_uploaded_file($team_logo_tmp, $team_logo_path)) {
                    echo 'Lỗi khi tải lên tập tin ảnh.';
                    return;
                }
            } else {
                // Nếu không có hình ảnh mới, sử dụng hình ảnh cũ từ cơ sở dữ liệu
                $team_id = $_GET['id'];
                $team_info = $obj->getTeam($team_id); // Phương thức getTeamInfo() trả về thông tin đội từ cơ sở dữ liệu
                $team_logo_path = $team_info['team_logo']; // Đường dẫn của hình ảnh cũ
            }
    
            // Thực hiện cập nhật thông tin đội với hình ảnh mới hoặc cũ
            $team_id = $_GET['id'];
            $obj->updateTeam($team_id, $_POST['team_name'], $team_logo_path, $_POST['team_color'], $_POST['coach_id']);
    
            // Chuyển hướng người dùng đến trang danh sách đội
            header("location:list-team");
        }
    }
    
    
}
