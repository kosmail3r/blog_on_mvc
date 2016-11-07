<div  class= "text-center"><form action="../../account/login" method="POST" role="form" style="margin:0 auto; width:400px">
        <legend>Login</legend>
<?php
//var_dump($data);
if ($data!== null){
    echo "<div class=\"alert-danger\">Не верный лог/пас </div>";
}
    ?>


        <div class="form-group">
            <input type="text" class="form-control" name="login" id="login" placeholder="login">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" id="password" placeholder="password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form></div>