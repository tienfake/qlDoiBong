<?php

namespace App\models;

class PlayerModel extends BaseModel
{
    function getAllPlayer()
    {
        $sql = "SELECT p.player_id,p.player_name,p.player_image,p.player_position, t.team_name
         from player As p INNER JOIN team AS t ON t.id= p.team_id";
        return $this->getAllData($sql);
    }
    function addPlayer($name, $image, $position, $team_id)
    {
        $sql = "INSERT into player (player_name,player_image,player_position,team_id)
         values('$name','$image','$position','$team_id')";
        return $this->getRowData($sql, false);
    }

    function getPlayer($player_id)
    {
        $sql = "SELECT p.player_id,p.player_name,p.player_image,p.player_position, t.team_name
        from player As p INNER JOIN team AS t ON t.id= p.team_id
        where player_id='$player_id'";
        return $this->getRowData($sql, false);
    }
    function updatePlayer($player_id, $name, $image, $position, $team_id)
    {
        $sql = "UPDATE player set player_name='$name',player_image='$image',player_position='$position',team_id='$team_id'
        where player_id='$player_id' ";
        return $this->getRowData($sql, false);
    }

    function deletePlayer($player_id)
    {
        $sql = "DELETE from player 
        where player_id='$player_id'";
        return $this->getRowData($sql, false);
    }
}
