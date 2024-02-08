<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Example PHP+PDO+POO+MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script
        src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
        integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE="
        crossorigin="anonymous"></script>
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
        <form action="index.php?controller=employees&action=alta" method="post" class="col-lg-5">
            <h3>Add user</h3>
            <hr/>
            Name: <input type="text" name="Name" class="form-control"/>
            Gender: 
            <input type="radio" name="Surname" value="boy"/>boy
            <input type="radio" name="Surname" value="girl">girl
            <br/>
            <!-- Email: <input type="text" name="email" class="form-control"/> -->
            <!--email : drop down-->
            Email: 
            <?php
                $k_array = array(
                    '@gmail.com',
                    '@outlook.com',
                    '@yahoo.com',
                    'その他'
                );
            ?>
            <select name="email">
                <option value=""></option>
            <?php
                foreach ( $k_array as $value ) {
                    if ( ! empty( $clean['k'] ) ) {
                        if ( $value === $clean['k'] ) {
                            echo '<option value="' . $value . '" selected>' . $value . '</option>';
                        } else {
                            echo '<option value="' . $value . '">' . $value . '</option>';
                        }
                    } else {
                        echo '<option value="' . $value . '">' . $value . '</option>';
                    }
                }   
            ?>
            </select>
            <br  />
            <!-- phone: <input type="text" name="phone" class="form-control"/> -->
            phone:
            <input type="checkbox" id="checkbox1" name="phone[]" value="Line">   
            <label for="checkbox1">Line</label> 
            <input type="checkbox" id="checkbox2" name="phone[]" value="Messenger">       
            <label for="checkbox2">Messenger</label> 
            <input type="checkbox" id="checkbox3" name="phone[]" value="GoogleChat">    
            <label for="checkbox3">Google Chat</label> 
            <input type="checkbox" id="checkbox4" name="phone[]" value="etc">     
            <label for="checkbox4">etc</label>            
            <br />
            <input type="submit" value="Send" class="btn btn-success"/>
        </form>
        <div class="col-lg-7">
            <h3>Users</h3>
            <hr/>
        </div>
        <section class="col-lg-7 usuario" style="height:400px;overflow-y:scroll;">
            <?php foreach($datos["employees"] as $employee) {?>
                <?php echo $employee["id"]; ?> -
                <?php echo $employee["Name"]; ?> -
                <?php echo $employee["Surname"]; ?> -
                <?php echo $employee["email"]; ?> -
                <?php echo $employee['phone']; ?>
                <div class="right">
                    <a href="index.php?controller=employees&action=detalle&id=<?php echo $employee['id']; ?>" class="btn btn-info">Detalles</a>
                </div>
                <div class="right">
                    <a href="index.php?controller=employees&action=delete&id=<?php echo $employee['id']; ?>" class="btn btn-danger">Delete</a>
                </div>
                <hr/>
            <?php } ?>
        </section>
    </body>
    <script>

   $(document).ready(function() {

        //id=1
        //"URL-url.....=1" :
        //"expirytime-URL-url.......=1" : 123456
        
        //id=2
        //"URL-url.....=2" :
        //"expirytime-URL-url.......=2" :
        var expirytime = "";
        var urlValue = "";
        var key1 = "";
        var key2 = "";
        const now = new Date();

        if(localStorage.length!=0){
            checkValue();
        };

        function checkValue(){
            for(i = 0;i<localStorage.length;i++){
                if(localStorage.key(i).includes("expirytime-")){
                    key1 = localStorage.key(i);
                    expirytime = localStorage.getItem(key1);
                    if (now.getTime() > expirytime){
                        localStorage.removeItem(key1);
                        // Find the URL-url……id=n
                        for(j = 0;j<localStorage.length;j++){
                            if (key1.includes(localStorage.key(j))){
                                localStorage.removeItem(localStorage.key(j));
                                i=0;
                            }                                                           
                        } 
                    }    
                }else{
                    continue;
                }

            //console.log(i+"=after="+localStorage.key(i));   
            };
        };
    });
    </script>
</html>
