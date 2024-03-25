<?php

namespace App\models;

class TeamModel extends BaseModel
{
    function getAllTeam()
    {
        $sql = "SELECT *FROM team";
        return $this->getAllData($sql);
    }
    function addTeam($team_name, $team_logo, $team_color, $coach_id)
    {
        $sql = "INSERT INTO team (team_name, team_logo, team_color, coach_id )
       values('$team_name','$team_logo','$team_color','$coach_id')";
        return $this->getRowData($sql, false);
    }
    function deleteTeam($team_id)
    {
        $sql = "DELETE from team 
        where id='$team_id'";
        return $this->getRowData($sql, false);
    }
    function updateTeam($team_id, $team_name, $team_logo, $team_color, $coach_id)
    {
        $sql = "UPDATE team set team_name='$team_name',team_logo='$team_logo',team_color='$team_color',coach_id='$coach_id'
        where id='$team_id'";
        return $this->getRowData($sql, false);
    }
    function getTeam($team_id)
    {
        $sql = "SELECT* FROM team
        where id='$team_id'";
        return $this->getRowData($sql, false);
    }
}
