<?
    session_start();
    require_once('../db/connect.php');

    // Get Admin Data
    if($_GET['admin_login'] != '' and $_GET['admin_password'] != '') {
        $login = $_GET['admin_login'];
        $password = md5($_GET['admin_password']);

        $request = "SELECT * FROM `admins` WHERE `login` like ? and `password` like ?";
        $req_quer = $pdo->prepare($request);
        $req_quer->execute(array("$login", "$password"));
        $result = $req_quer->fetchAll();
        foreach($result as $admin) {
            $adminNick = $admin['login'];
            $adminSFL = $admin['sfl'];
        }
        $count = count($result);
        if($count > 0) {
            $_SESSION['autorized'] = true;
            $_SESSION['admin_nick'] = $adminNick;
            $_SESSION['admin_sfl'] = $adminSFL;
            $_SESSION['data_error'] = false;
            echo '<script type="text/javascript">location.href="../../pages/admin.php"</script>';
        }
        else {
            echo '<script type="text/javascript">location.href="../../index.php"</script>';
            $_SESSION['data_error'] = true;
        }
    }
?>