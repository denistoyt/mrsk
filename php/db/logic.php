<?
    require_once('connect.php');
    // Session Destroy 
    if(isset($_GET['admin_logout'])) {
        session_start();
        session_unset();
        session_destroy();
        echo '<script type="text/javascript">location.href="../index.php"</script>';
    }
?>