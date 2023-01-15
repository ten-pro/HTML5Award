<?php

//CROSエラーの解消
header("Access-Control-Allow-Origin: *");
//JSON形式で返却すること、文字形式がUTF-8だということの宣言
header('Content-Type: application/json; charset=UTF-8');

//DAOの読み込み
require_once './ClearDAO.php';

$data = false;

//create_clear_infomationの引数がある時の処理
if (isset($_POST['create_clear_infomation']) == true) {
    $class = new enGameClear();
    $data = $class->create_clear_information(
        $_POST['user_id'],
        $_POST['clear_time'],
        $_POST['clear_emplyee'],
        $_POST['clear_money'],
        $_POST['clear_score']
    );
}

//get_score_rankの引数がある時の処理
if (isset($_POST['get_score_rank']) == true) {
    $class = new enGameClear();
    $data = $class->score_rank();
}


//arrayの中身をJSON形式に変換している
$json_array = json_encode($data);

print $json_array;
