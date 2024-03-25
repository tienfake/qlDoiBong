<?php

namespace App\controllers;

use App\models\PlayerModel;
use App\models\TeamModel;

class PlayerController extends BaseController
{
    function listPlayer()
    {
        $obj = new PlayerModel();
        $player = $obj->getAllPlayer();
        include 'app/views/layout/menu.php';
        return $this->render('player.list', ['player' => $player]);
    }

    function addView()
    {
        $obj = new TeamModel();
        $team = $obj->getAllTeam();
        return $this->render('player.add', ['team' => $team]);
    }

    function add()
    {
        if (isset($_POST['add'])) {
            $targetDir = "../public/image/"; // Thư mục lưu trữ tệp ảnh

            // Kiểm tra xem thư mục lưu trữ tệp ảnh có tồn tại không
            if (!file_exists($targetDir)) {
                echo 'Lỗi: Thư mục lưu trữ tệp ảnh không tồn tại.';
                return;
            }

            // Xử lý tập tin ảnh từ $_FILES
            $team_logo_name = $_FILES['player_image']['name'];
            $team_logo_tmp = $_FILES['player_image']['tmp_name'];
            $team_logo_path = $targetDir . $team_logo_name;

            // Di chuyển hoặc sao chép tệp ảnh vào thư mục lưu trữ
            if (!move_uploaded_file($team_logo_tmp, $team_logo_path)) {
                echo 'Lỗi khi tải lên tập tin ảnh.';
                return;
            }
            // Thực hiện thêm đội mới vào cơ sở dữ liệu
            $obj = new PlayerModel();
            $obj->addPlayer($_POST['player_name'], $team_logo_path, $_POST['player_position'], $_POST['team_id']);
            header("location:list-player");
        }
    }

    function updateView()
    {
        $obj = new PlayerModel();
        $obj1 = new TeamModel();
        $player_id = $_GET['id'];
        $team = $obj1->getAllTeam();
        $player = $obj->getPlayer($player_id);
        return $this->render('player.update', ['team' => $team, 'player' => $player]);
    }
    function update() {
        if (isset($_POST['update'])) {
            $obj = new PlayerModel();
    
            // Kiểm tra xem người dùng đã tải lên hình ảnh mới hay không
            if ($_FILES['player_image']['size'] > 0) {
                // Nếu có hình ảnh mới, thực hiện tải lên và lưu trữ hình ảnh mới
                $targetDir = "../public/image/";
                $team_logo_name = $_FILES['player_image']['name'];
                $team_logo_tmp = $_FILES['player_image']['tmp_name'];
                $team_logo_path = $targetDir . $team_logo_name;
    
                // Di chuyển hoặc sao chép tệp ảnh vào thư mục lưu trữ
                if (!move_uploaded_file($team_logo_tmp, $team_logo_path)) {
                    echo 'Lỗi khi tải lên tập tin ảnh.';
                    return;
                }
    
                // Cập nhật đường dẫn hình ảnh mới
                $player_logo_path = $team_logo_path;
            } else {
                // Nếu không có hình ảnh mới, sử dụng hình ảnh cũ từ cơ sở dữ liệu
                $player_id = $_GET['id'];
                $player_info = $obj->getPlayer($player_id); // Phương thức getPlayer() trả về thông tin cầu thủ từ cơ sở dữ liệu
                $player_logo_path = $player_info['player_image']; // Đường dẫn của hình ảnh cũ
            }
    
            // Thực hiện cập nhật thông tin cầu thủ với hình ảnh mới hoặc cũ
            $player_id = $_GET['id'];
            $obj->updatePlayer($player_id, $_POST['player_name'], $player_logo_path, $_POST['player_position'], $_POST['team_id']);
    
            // Chuyển hướng người dùng đến trang danh sách đội
            header("location:list-player");
        }
    }
    function delete(){
        $obj = new PlayerModel();
        $player_id = $_GET['id'];
        $obj->deletePlayer($player_id);
        header("location:list-player");
    }
    
    }
