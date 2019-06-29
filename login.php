<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Simple News Site</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Simple News Site</h1>
        <div id=loginstuff>
        <h2>Login Page</h2>
        <form action="loginphp.php" method="POST"> <!-- goes to login php code. -->
            Enter Username: <input type="text" name="username">
            Enter Password: <input type="text" name="password">
            <input type="submit" name="loginsubmit" value="Login">
        </form>    
        <br>
        <hr>
        <form action="createuser.php" method="POST"> <!-- goes to create user php goes. -->
            <h3>Not Registered?</h3>
            Create Username: <input name="newUser" type="text"  />
            Create Password: <input name="newPassword" type="text"  />
            <input type="submit" name="createUser" value="Create User" />
        </form>
</div>
        
    </body>
</html>
