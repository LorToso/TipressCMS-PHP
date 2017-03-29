<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    //if($_SERVER["HTTPS"] != "on")
    //{
        //header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        //exit();
    //}


/**
 * @return bool
 */
function IsLoginCorrect()
{
    return $_POST['user'] === "secret" && $_POST['password'] === "secret";
}
function IsLoginDefined()
{
    return !empty($_POST['user']) && !empty($_POST['password']);
}

if (IsLoginDefined() && IsLoginCorrect())
{
    $_SESSION['authenticated'] = true;
    echo "<script> window.location.replace(\"" . $_SESSION['redirect'] . "\"); </script>";
    exit();
}
else {
    include 'Header.php';
}
?>

<form method="post">

    <table>
        <tr>
            <td>
                Utente:
            </td>
            <td>
                <label>
                    <input type="text" name="user"/>
                </label>
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                <label>
                    <input type="password" name="password"/>
                </label>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit">Login</button>
            </td>
        </tr>
    </table>
    <?php
    if(IsLoginDefined())
    {
    echo "<input hidden type=\"text\" name=\"redirect\" value=\"" . $_SESSION['redirect'] . "/>";
    }
    ?>
</form>

<?php
    include 'Footer.html';
?>