<html>
    <?php include '../View/Include/Header.php' ?> 
    <body>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="requestToken">
            Username:<br>
            <input type="text" name="username" value="">
            <br>
            Password:<br>
            <input type="text" name="password" value="">
            <br>
            Member Type:<br>
            <input type="text" name="memberType" value="">
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
