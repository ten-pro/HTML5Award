<?php
class enGame
{
    function get_pdo()
    {
        $pdo = new PDO('mysql:host=mysql209.phy.lolipop.lan;dbname=LAA1418138-engineergame;charset=utf8', 'LAA1418138', 'tensura');
        return $pdo;
    }

    function login_user($user_name, $user_pass)
    {
        //配列の宣言（無いとエラーが発生した）
        $data = array();

        $pdo = $this->get_pdo();
        $sql = "SELECT * FROM user_tbl WHERE user_name = ? AND user_pass = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_name, PDO::PARAM_STR);
        $ps->bindValue(2, $user_pass, PDO::PARAM_STR);
        $ps->execute();
        $search = $ps->fetchAll();
        if ($search == null) {
            $data = false;
        } else {
            foreach ($search as $row) {
                array_push($data, array('id' => $row['user_id'], 'chk' => true));
            }
        }
        return $data;
    }

    function chk_name($user_name)
    {
        $pdo = $this->get_pdo();
        $sql = "SELECT * FROM user_tbl WHERE user_name = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $user_name, PDO::PARAM_STR);
        $ps->execute();
        $search = $ps->fetchAll();
        if ($search == null) {
            $data = false;
        } else {
            $data = true;
        }
        return $data;
    }

    function create_user($name, $pass)
    {

        $pdo = $this->get_pdo();
        $sql = 'INSERT INTO user_tbl (user_name,user_pass) VALUE (?,?)';

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $name, PDO::PARAM_STR);
        $ps->bindValue(2, $pass, PDO::PARAM_STR);

        $chkname = $this->chk_name($name);
        if ($chkname == false) {
            $ps->execute();
            $data = true;
        } else {
            $data = false;
        }
        return $data;
    }
}
