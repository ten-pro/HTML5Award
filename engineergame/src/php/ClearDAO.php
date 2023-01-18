<?php
class enGameClear
{
    function get_pdo()
    {
        $pdo = new PDO('mysql:host=mysql209.phy.lolipop.lan;dbname=LAA1418138-engineergame;charset=utf8', 'LAA1418138', 'tensura');
        return $pdo;
    }

    function create_clear_information($user_id, $clear_time, $clear_emplyee, $clear_money, $clear_score)
    {

        $pdo = $this->get_pdo();
        $sql = "INSERT INTO clear_tbl (user_id,clear_time,clear_employee,clear_money,clear_score) VALUES (?,?,?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_id, PDO::PARAM_STR);
        $ps->bindValue(2, $clear_time, PDO::PARAM_STR);
        $ps->bindValue(3, $clear_emplyee, PDO::PARAM_STR);
        $ps->bindValue(4, $clear_money, PDO::PARAM_STR);
        $ps->bindValue(5, $clear_score, PDO::PARAM_STR);

        try {
            $ps->execute();
            $data = true;
        } catch (Exception $e) {
            $data = $e;
        } catch (Error $e) {
            $data = $e;
        }


        return $data;
    }

    function score_rank()
    {
        //配列の宣言（無いとエラーが発生した）
        $data = array();
        $score_data = array();
        $money_data = array();
        $employee_data = array();

        $pdo = $this->get_pdo();
        $sql = "SELECT T2.user_id,T2.SCMAX FROM (SELECT user_id,MAX(clear_score) AS SCMAX FROM clear_tbl GROUP BY user_id) T2 ORDER BY T2.SCMAX DESC LIMIT 5";
        $sql2 = "SELECT T2.user_id,T2.MNMAX FROM (SELECT user_id,MAX(clear_money) AS MNMAX FROM clear_tbl GROUP BY user_id) T2 ORDER BY T2.MNMAX DESC LIMIT 5";
        $sql3 = "SELECT T2.user_id,T2.EMMAX FROM (SELECT user_id,MAX(clear_employee) AS EMMAX FROM clear_tbl GROUP BY user_id) T2 ORDER BY T2.EMMAX DESC LIMIT 5";
        $ps = $pdo->prepare($sql);
        $ps2 = $pdo->prepare($sql2);
        $ps3 = $pdo->prepare($sql3);
        $ps->execute();
        $ps2->execute();
        $ps3->execute();
        $search = $ps->fetchAll();
        $search2 = $ps2->fetchAll();
        $search3 = $ps3->fetchAll();
        foreach($search as $row){
            $user_name=$this->get_username($row['user_id']);
            array_push($score_data, array('name'=> $user_name, 'score' => $row['SCMAX']));
        }
        foreach($search2 as $row){
            $user_name=$this->get_username($row['user_id']);
            array_push($money_data, array('name'=> $user_name, 'money' => $row['MNMAX']));
        }
        foreach($search3 as $row){
            $user_name=$this->get_username($row['user_id']);
            array_push($employee_data, array('name'=> $user_name, 'employee' => $row['EMMAX']));
        }

        $data=array('score_rank'=>$score_data,'money_rank'=>$money_data,'employee_rank'=>$employee_data);
        return $data;
    }

    function get_username($id)
    {

        $pdo = $this->get_pdo();
        $sql = "SELECT * FROM user_tbl WHERE user_id = $id";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $search = $ps->fetchAll();
        foreach ($search as $row) {
            $name=$row['user_name'];
        }
        return $name;
    }

    function myrank($id)
    {
        //配列の宣言（無いとエラーが発生した）
        $data = array();

        $pdo = $this->get_pdo();
        $sql = "SELECT user_id, clear_score, FIND_IN_SET(clear_score, (SELECT GROUP_CONCAT(clear_score ORDER BY clear_score DESC) FROM clear_tbl)) AS rank FROM clear_tbl WHERE user_id = ?;";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $id, PDO::PARAM_INT);
        $ps->execute();
        $search = $ps->fetchAll();
        foreach($search as $row){
            array_push($data, array('rank'=> $row['rank'], 'score' => $row['clear_score']));
        }
        return $data;
    }
}
