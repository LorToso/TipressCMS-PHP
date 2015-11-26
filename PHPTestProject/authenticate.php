<?php
    session_start();

    //if($_SERVER["HTTPS"] != "on")
    //{
        //header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        //exit();
    //}

if ($_POST['user'] == "secret" && $_POST['password'] == "secret")
{
    $_SESSION['authenticated'] = true;
    echo "<script> window.location.replace(\"" . $_SESSION['redirect'] . "\"); </script>";
    exit();
}
else
{
    include "Header.php";

?>

<form method="post">

    <table>
        <tr>
            <td>
                Utente:
            </td>
            <td>
                <input type="text" name="user" />
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                <input type="password" name="password" />
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit">Login</button>
            </td>
        </tr>
    </table>
    <input hidden type="text" name="redirect" value="<?php $_POST['redirect']?>" />
</form>

<?php
    include "Footer.php";
}


?>