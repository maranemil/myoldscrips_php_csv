<?php /** @noinspection SpellCheckingInspection */
/**
 *
 * Homepage.............: http://maran.pamil-visions.com / http://maran-emil.de
 * Released.............: 12.09.2006
 * Created by...........: Emil Maran (maran-emil.de)
 * Release type.........: Script PHP/mySQL
 * Price................: Freeware
 * Version..............: 1.0 Beta
 * Contact..............: maran_emil@yahoo.com
 * ----------------------------------------------------------------------------------
 */
include('header.php');
$key = mt_rand(90000, 99999);
?>

    <form action='commentsadd.php' method='post'>
        Your name: <label>
            <input type='text' name='yourname' size=50 style='font-size:11px'>
        </label> <br><br><br>
        Your comment: <br><br>
        <label>
            <textarea name='yourcomment' rows='8' cols='40' style='font-size:11px'></textarea>
        </label><br><br>
        <input type='hidden' name='id' value='<?php echo $_GET['id']; ?>'><br>

        Please enter the next code: <?= $key ?>

        <input type='hidden' name='checkcode1' readonly value='<?= $key ?>' style='font-size:11px'>
        <label>
            <input type='text' name='checkcode2'>
        </label><BR><BR>

        <input type='submit' name='submit' value='add your comment' style='font-size:11px'><br>
        <input type='hidden' name='action' value='yes'><br>

    </form>

<?php include('menu.php'); ?>
<?php include('footer.php'); ?>