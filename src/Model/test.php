<?php
    session_start();
    //----------未入力チェック----------//
    if (!empty($_POST) && empty($_SESSION['input_data'])) {

        //名前チェック
        if (empty($_POST['input_name'])) {
            $error_message['name'] = '名前を入力して下さい';
        }

        //年齢チェック -- 数値以外はエラー
        if (empty($_POST['input_age'])) {
            $error_message['age'] = '年齢を入力して下さい';
        } elseif (!is_numeric($_POST['input_age'])) {
            $error_message['age'] = '数値を入れて下さい';
        }

        //ユーザIDチェック -- 4~8桁以外はエラー
        if (empty($_POST['input_id'])) {
            $error_message['id'] = 'ユーザIDを入力して下さい';
        } elseif (strlen($_POST['input_id']) < 8 || strlen($_POST['input_id']) > 20) {
            $error_message['id'] = '8～20桁で入力して下さい';
        }

        //エラー内容チェック -- エラーがなければconfirm.phpへリダイレクト
        if (empty($error_message)) {
            $_SESSION['input_data'] = $_POST;
            header('Location:./output.php');
            exit();
        }
    } elseif (!empty($_SESSION['input_data'])) {
        $_POST = $_SESSION['input_data'];
    }

    session_destroy();
?>