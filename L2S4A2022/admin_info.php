<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="assets/css/adminInfo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once 'assets/php/navbar.php';?>
    <h1><?=$trad['adminInfo']['title']?></h1>
    <div style="overflow-x:auto;">
        <table id='table'></table>
    </div>
    <p id="numberAdmins"><?=$trad['adminInfo']['numberAdmins']?></p>

    <section> 
        <form method="post"  id="login-form" action="addAdminVerification.php?lang="<?= $lang ?>>
            <h2 id="title"><?=$trad['adminInfo']['addAdminTitle']?></h2>
            <label for="username">
            <?= $trad['connection']['username']?> :</label>
            <input type="text" name="username" id="username" 
            placeholder="<?= $trad['connection']['username']?>" 
            required>
            <br> <br>
            <label for="password"><?= $trad['connection']['password']?> :</label>
            <input type="password" name="password" id="password" 
            placeholder="<?= $trad['connection']['password']?>" required>
            <br> <br>
            <button type="submit"><?= $trad['adminInfo']['button']?></button>
        </form>
        <p id="error-msg"><?php
            array_key_exists('error', $_GET) ? $error = $_GET['error'] : $error = 'none';
            if ($error != 'none') {
                echo $trad['adminInfo'][$error];
            }
        ?></p>
    </section>
</body>
</html>

<script>
  const ajaxFunc = async () => {
  const response = await fetch("serverAjax.php"); // Generate the Response object
  if (response.ok) {
    const jsonValue = await response.text(); // Get JSON value from the response body
    return Promise.resolve(jsonValue);
  } else {
    return Promise.reject("D:");
  }
};

    ajaxFunc()
    .then((response) => {
        var parsedresponse = JSON.parse(response);
        var indices = Array.from(Array(parsedresponse.length).keys()).map(v=> v+1);
        var response = [];
        for (x in parsedresponse) {
            response[x] = parsedresponse[x].USERNAME;
        }
        let tableMat = [];
        tableMat.push(indices);
        tableMat.push(response);
        
        let htmltable = document.getElementById("table");
        for (el in tableMat[0]) {//<- number of usernames
            let row = htmltable.insertRow();
            let cell0 = row.insertCell();
            let text0 = document.createTextNode(tableMat[0][el]);
            cell0.appendChild(text0);
            let cell1 = row.insertCell();
            let text1 = document.createTextNode(tableMat[1][el]);
            cell1.appendChild(text1);
        }
        document.body.appendChild(htmltable);

        document.getElementById("numberAdmins").innerHTML += tableMat[0].length;
    })
    .catch(console.log);

</script>

