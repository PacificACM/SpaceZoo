<!doctype html>
<?php
    require 'facebookIncludes.php';
?>

<html xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
    <title>SpaceZoo</title>
    <link rel="stylesheet" type="text/css" href="default.css" /> 
  </head>
  <body>
    <h1 style = "text-align: center;">Space Zoo</h1>
    <?php
        $user = new UserClass($facebook->getUser());
        MainMenuClass::show($user->isAdmin());
    ?>
    <br />
    <br />
    <br />
    <table class="main">
        <tr>
            <th colspan=2>
                Ship Info
            </th>    
        </tr>
        <tr>
            <td>
                Location:
            </td>
            <td>
                <?php echo $user->getXLocation() ?>, <?php echo $user->getYLocation() ?>
            </td>
        </tr>
        <tr>
            <td>
                Thruster Level: 
            </td>
            <td>
                <?php echo $user->getThrusterLevel() ?>
            </td>
        </tr>
        <tr>
            <td>
                Scanner Level: 
            </td>
            <td>
                <?php echo $user->getScannerLevel() ?>
            </td>
        </tr>
    </table>
    <br />
    <br />
    <form name="form1" method="post" action="shipActions.php">
    <?php
        if(isset($_POST['confirmMove']))
        {
            $user->makeMove();
        }
        if($user->isTraveling())
        {
    ?>
            <table class="main">
            <tr>
                <th>
                    Traveling
                </th>
            </tr>
            <tr>
                <td>
                    You are moving to location <?php echo $user->getStringFutureLocation() ?> and it will take you <?php echo round($user->getTravelMicroTimeLeft()/1000000) ?> seconds longer
                </td>
            </tr>
            </table>
    <?php
        }
        if(isset($_POST['calculateTrajectory']))
        {
            $user->setLocationToMove($_POST['xLocation'], $_POST['yLocation']);
    ?>
            <table class="main">
            <tr>
                <th>
                    Confirm Move
                </th>
            </tr>
            <tr>
                <td>
                    Moving to location (<?php echo $_POST['xLocation'] ?>, <?php echo $_POST['yLocation'] ?>) will take <?php echo round($user->calculateTimeToMoveInSeconds($_POST['xLocation'], $_POST['yLocation'])) ?> seconds
                </td>
            </tr>
            <tr>
                <td style="text-align: center">
                    <input type="submit" name="confirmMove" value="Confirm"> <input type="submit" name="cancelMove" value="Cancel">
                </td>
            </tr>
            </table>
    <?php
        }
        else
        {
    ?>
            <table class="main">
                <tr>
                    <th>
                        Move
                    </th>
                </tr>
                <tr>
                    <td>
                        X Coordinates: <input type="text" name="xLocation"> Y Coordinates: <input type="text" name="yLocation">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        <input type="submit" name="calculateTrajectory" value="Calculate Trajectory">
                    </td>
                </tr>
            </table>
    <?php
        }
    ?>
    </form>
  </body>
</html>