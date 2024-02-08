<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Ajax動作サンプル</title>
</head>
<body>
    <h1>Ajax動作サンプル</h1>
    <form method="" action="" onsubmit="return false" >
        <select name="Fruits" id="Fruits" onchange="getData()">
            <option value="">果物を選択</option>
            <option value="1">リンゴ</option>
            <option value="2">バナナ</option>
            <option value="3">イチゴ</option>
        </select>
        <input type="text" name="Result" id="Result" value="選択してください">
        <h2></h2>
    </form>
</body>
<script>

function getData() {
  document.getElementById("Result").value = "問い合わせ中です…";
  var data = {
    "code": document.getElementById("Fruits").value
  }
  var json = JSON.stringify(data);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax.php");
  xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=UTF-8");
  xhr.send(json);
  xhr.onreadystatechange = function () {
    try {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          var result = JSON.parse(xhr.response);
          document.getElementById("Result").value = result.value == 0 ? "選択してください" : result.value;
        } else {
        }
      } else {
      }
    } catch (e) {
    }
  };
}

</script>
</html>
