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
}
