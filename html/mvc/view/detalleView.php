<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Example PHP+PDO+POO+MVC</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <style>
        input {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .right {
            float: right;
        }
    </style>
</head>

<body>
    <div class="col-lg-5 mr-auto">
        <form action="index.php?controller=employees&action=actualizar" method="post" id="contact-form">
            <h3>User detail</h3>
            <hr />
            <!--id: hidden-->
            <input type="hidden" name="id" id="id" value="<?php echo $datos["employee"]->id ?>" />
            <!--name: text-->
            Name: <input type="text" name="Name" id="Name" value="<?php echo $datos["employee"]->Name ?>" class="form-control" />
            <!--gender: radio button-->
            Gender:
            <input type="radio" name="Surname" id="Surname" <?php echo ($datos["employee"]->Surname == 'boy') ? 'checked' : '' ?> value="boy" /> boy
            <input type="radio" name="Surname" id="Surname" <?php echo ($datos["employee"]->Surname == 'girl') ? 'checked' : '' ?> value="girl" /> girl
            <br />
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
                    if ( ! empty( $value ) ) {
                        if ( $value === $datos["employee"]->email ) {
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
            <!--email : checkbox-->
            <br/ >
 
            phone:
            <?php
            // form value
            $v_array = array(
                'Line',
                'Messenger',
                'GoogleChat',
                'etc'
            );
            // set db value into an array
            $iter = explode(',',$datos["employee"]->phone);      
            $dbDataArr = array();
            foreach ($iter as $key => $value){
                $dbDataArr[] = $value;
            };
			for($i=0;$i<count($v_array);$i++){                             
                echo "<input type='checkbox' id='checkbox1' name='phone[]'  value='".$v_array[$i]."'";

                for($j=0;$j<count($dbDataArr);$j++){
                    if($dbDataArr[$j] == $v_array[$i]){ 
                        echo ($dbDataArr[$j] == $v_array[$i]) ? 'checked' : '' ;                      
                    }        
                }

                echo "/>"; 
                echo $v_array[$i];     
            }                    
            ?>
            <div>
            <input type="submit" value="Send" id="send" class="btn btn-success" />
            </div>            
            <div id="retrieve"></div>
        </form>
        <div>
        <a href="index.php" class="btn btn-info">Return</a>
        </div>       
    </div>
</body>
<script>
    $(document).ready(function() {
        var form = $("#contact-form");
        //transform form content to json object
        var before = convertFormToJSON(form);
        var url = "URL-"+location.href ;
        
        function convertFormToJSON(form) {
            // Encodes the set of form elements as an array of names and values.
            var array = $(form).serializeArray();
            const values = array.values();

            var json = {};
            var test = "";

            for(var i = 0 ; i<array.length;i++){
                if(array[i].name=='phone[]'){ //暫時寫死的
                    test+=","+array[i].value;
                };
                //console.log(array[i].name);
                if(array[i].name=='phone[]'){ //暫時寫死的
                    json[array[i].name] = test.substring(1); 
                }else{
                    json[array[i].name] = array[i].value ;  
                }
            };

            return json;
        }

        //detect change
        $("#contact-form").change(function() {
             //如果form物件跟LocalStorage物件 id相同才改 不同就不要改
            //set json object to local storage
            if (localStorage.getItem(url) !== null) {
                var dataFromLocalstorage = localStorage.getItem(url);
                var obj = JSON.parse(dataFromLocalstorage);  
                if(obj['id']==before['id']){
                    setChangedDataToLocalStorage();
                }else{
                    return;
                }
            } else {
                setChangedDataToLocalStorage();
            }            
        });

        //set json object to local storage function
        function setChangedDataToLocalStorage() {
            $this = $("#contact-form");
            var after = convertFormToJSON($this);
            if (before === after) {
                return;
            } else {              
                setWithExpiry(url, after, 5000);
            }
        };
        //create object with expiry function
        function setWithExpiry(key, value, ttl) {
            const now = new Date()
            // `testObject` is an object which contains the original value
            // as well as the time when it's supposed to expire
            var expirytime = (now.getTime() + ttl).toString();
            var content = JSON.stringify(value);
            localStorage.setItem(key, content);
            localStorage.setItem("expirytime-"+key, expirytime);
        }

        //if localStorage is not null then create the retrieve button
        var dataFromLocalstorage = localStorage.getItem(url);
        var obj = JSON.parse(dataFromLocalstorage);  

        if (dataFromLocalstorage != null && (obj['id']===before['id'])) {
            if(obj['id']===before['id']){
                alert("SAME");
            }
            var html = `<input type="button" value="retrieve" class="btn btn-danger"/>`
            $("#retrieve").html(html);
        };

        //click retrieve button to get data at local storage
        $("#retrieve").click(function() {           
            $("#contact-form").find("textarea, :text, select").val("").end().find(":checked").prop("checked", false);
            //console.log(obj);
            console.log(obj['id']);
            console.log(before['id']);
            if(obj['id']===before['id']){
                console.log("SAME");
            }
            for (const key in obj) {  
                console.log(key); 
                if (obj.hasOwnProperty(key)) {
                    //console.log("RARARARARA");
                    var str = $("input[name=\""  + key + "\"]"); 

                    if($("select[name=\"" + key + "\"]")){
                        $("select[name=\"" + key + "\"]").val(obj[key]);
                    }

                    if ($(str).attr('type')== 'radio') {
                        //console.log("HEREISME");
                        $("input[name=\"" + key + "\"][value=\"" + obj[key] + "\"]").prop('checked', true);
                    } else if($(str).attr('type')=='checkbox'){
                        console.log("HEREISMEHAHAH");
                            var testobj =  obj[key]; 
                            var arraytest =testobj.split(','); 
                            console.log("in2");  
                            for(var i=0; i< arraytest.length;i++){
                                console.log(arraytest[i]);
                                    $("input[name=\"" + key + "\"][value=" + arraytest[i] + "]").prop('checked', true);
                            }
                    }else{
                        $(`input[name=` + key + `]`).val(obj[key]);
                    };  
                }
            }
        });

        getWithExpiry(url);

        function getWithExpiry(key) {
            const expirytime = localStorage.getItem("expirytime-"+key)
            // if the item doesn't exist, return null
            if (!expirytime) {
                return null;
            }
            const now = new Date();
            alert(now.getTime());
            // compare the expiry time of the item with the current time          
            if (now.getTime() > expirytime) {
                alert("time's up");
                // If the item is expired, delete the item from storage and return null
                localStorage.removeItem(key);
                localStorage.removeItem("expirytime-"+key)
                // clear retrieve button
                $("#retrieve").html("");
                return null;
            }
            return null;
        }

        $("#send").click(function() {
            localStorage.clear();
        });
    });
</script>

</html>
