<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'User.php';
//if($_SERVER["HTTPS"] != "on")
//{
//header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
//exit();
//}


/**
 * @return bool
 */
function IsLoginCorrect($username, $password)
{
    return (strcmp($_POST['user'],$username)==0) && (strcmp($_POST['password'],$password)==0);
}
function IsLoginDefined()
{
    return isset($_POST['user']) && isset($_POST['password']);
}

if (IsLoginDefined() && IsLoginCorrect($username, $password))
{
    $_SESSION['authenticated'] = true;
    if(!isset($_SESSION['redirect']))
        $_SESSION['redirect'] = './';
    echo "<script> window.location.replace(\"" . $_SESSION['redirect'] . "\"); </script>";
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
                    <img src="img/check_mark_wrong.png" id="check_mark_login" style="max-height: 25px;max-width: 25px" hidden/>
                    <?php
                    if(IsLoginDefined() && !IsLoginCorrect($username, $password))
                        echo "<script>$('#check_mark_login').prop('hidden',false);</script>";
                    ?>
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