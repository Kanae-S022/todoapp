<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Todo</title>
    </head>
    <body>
        <h1>Todo登録</h1>
        <form action="/todoapp/resources/views/form" method="post"> 
            <input type="text" name="title">
            <input type="text" name="detail">
            <input type="submit" value="登録">
        </form>
        <hr>
        <h1>Todo一覧</h1>
        <div>
          <p>タイトル：<?php echo $title; ?></p>
          <p>詳細：<?php echo $detail; ?></p>
        </div>
    </body>
</html>