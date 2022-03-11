<?php /** @noinspection SpellCheckingInspection */

include('header.php');

$action = $_POST['action'];
if ($action === "yessubmit") {
    if ($_POST['passwd'] !== "hereisyourpassword") {
        echo "wrong password!";
        exit;
    }  // here you can set your password

    if (($_POST['title'] !== "title_here") || ($_POST['content'] !== "content_here")) {
        if ($_FILES['picture']['name'] !== "") {
            $imageInfo = getimagesize($_FILES['picture']['tmp_name']);
            $width = $imageInfo[0];
            $height = $imageInfo[1];
            if ($height > 443 || $width > 443) {
                echo "<script> alert('Image is to big! Try to resize the picture! 443 x 443') </script>";
                exit;
            }
            $newimg = date("YmdHis") . ".jpg";

            if (stripos($_SERVER['OS'], "linux") !== false) {
                $path = str_replace("addnew.php", "", $_SERVER['SCRIPT_FILENAME']) . "imgblog/";
            } else {
                $path = "imgblog/";
            }

            //move_uploaded_file ( $_FILES['picture']['tmp_name'], $path . $newimg  );}
            move_uploaded_file($_FILES['picture']['tmp_name'], $path . $newimg);
        } else {
            $newimg = "noimg";
        }

        $fileup = file("myblog.db");
        $id = count($fileup) + 1;
        $title = $_POST['title'];
        $title = str_replace("#", "", $title);
        $content = $_POST['content'];
        $content = str_replace(array("#", "\r\n"), array("", "<br>"), $content);
        $title = stripslashes($title);
        $content = stripslashes($content);
        $pics = $newimg;
        $datex = date("d.m.Y");

        // id / title / content / poza / data

        $fp = fopen("myblog.db", 'ab');
        $line = "#$id#$title#$content#$pics#$datex \r\n";
        fwrite($fp, $line);
        fclose($fp);
        echo "<script>alert('well done! everything is ok!!')</script>";
    } else {
        echo "<script>alert('hey! wake up! something is wrong! please verify again!')</script>";
    }
    echo "<script>location.replace('index.php')</script>";
}

?>

    <table style="width:350px">
        <tr>
            <td>
                <form action="addnew.php" method=post enctype='multipart/form-data' name="content">

                    Title: <label>
                        <input type=text name=title size=70 style="font-size: 11px" value='title_here'>
                    </label><BR><BR>

                    <script type="text/javascript">
                        function InstaSmilie() {

                        }

                        /**
                         *
                         * @param SmileCode
                         * @constructor
                         */
                        function AddSmile(SmileCode) {
                            let newPost;
                            let oldPost = document.content.content.value;
                            newPost = oldPost + SmileCode;
                            document.content.content.value = newPost;
                            document.content.content.focus();
                        }
                    </script>

                    <?php
                    for ($i = 0; $i < 44; $i++) {
                        ?>
                        <a href="javascript:InstaSmilie(':sm<?= $i ?>:')" onClick="AddSmile(' :sm<?= $i ?>: ');">
                            <img src="emoticons/sm<?= $i ?>.gif" style="border: none;" alt=""></a>
                        <?php
                    }
                    ?>
                    <BR>
                    Content:<label>
                        <textarea name='content' rows=7 cols=50 style="font-size: 11px"></textarea>
                    </label><BR><BR>
                    Picture:<input type=file name=picture size=40 style="font-size: 11px"><BR><BR>
                    <span style="color: #CCCCCC">password:</span>
                    <label>
                        <input type='password' name='passwd' style="font-size: 11px">
                    </label><BR><BR>

                    <input type='submit' name='submit' value='submit article'
                           style='font-size: 11px;background: #FFFFFF; font-weight:bold'>
                    <input type='hidden' name='action' value='yessubmit'>

                </form>
            </td>
        </tr>
    </table>

<?php include('menu.php'); ?>
<?php include('footer.php'); ?>