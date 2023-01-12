<?php

//CROSエラーの解消
header("Access-Control-Allow-Origin: *");
//JSON形式で返却すること、文字形式がUTF-8だということの宣言
header('Content-Type: application/json; charset=UTF-8');

//DAOの読み込み
require_once './LoginDAO.php';



//login_userの引数がある場合はtrueを返す
if (isset($_POST['login_user']) == true) {
    $class = new enGame();
    $data = $class->login_user($_POST['user_name'], $_POST['user_pass']);
}


//create_userの引数がある時の処理
if (isset($_POST['create_user']) == true) {
    $class = new enGame();
    $data = $class->create_user($_POST['user_name'], $_POST['user_pass']);
}


//arrayの中身をJSON形式に変換している
$json_array = json_encode($data);

print $json_array;