<style>
    .display {
        display: flex;
        justify-content: space-around;
        flex-direction: column;
        align-items: center;
    }

    .content {
        margin: 20px;
    }

    .sections {
        width: 210px;
        height: 80px;
        display: block;
    }

    li {
        list-style: none;
    }

    #myUL {
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        overflow: hidden;
    }

    .profile-picture {
        height: 80px;
        width: 80px;
        border-radius: 50px;
    }

    button {
        width: fit-content;
    }

    .btn.active {
        background-color: deepskyblue;
        color: white;
    }

    .user a {
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .filterDiv {
        display: none;
    }

    .show {
        display: list-item;
    }
</style>
<div class="display">
    <form action="" class="searchbar activated" style="margin: 20px 0 20px 0;">
        <input type="search" id="searchinput" onkeyup="searchFunction()"> <i class="fa fa-search"></i> </form>
    <div id="myBtnContainer" style="display: flex; width: 100%; justify-content: space-evenly;">
        <button id="backhome" onclick="document.location.reload();">Retour</button>
        <button class="btn active" onclick="sortList();filterSelection('all');">Tout</button>
        <button class="btn" onclick="filterSelection('user')">Utilisateur</button>
        <button class="btn" onclick="filterSelection('6e')">6e</button>
        <button class="btn" onclick="filterSelection('5e')">5e</button>
        <button class="btn" onclick="filterSelection('4e')">4e</button>
        <button class="btn" onclick="filterSelection('3e')">3e</button>
    </div>
</div>
<ul id="myUL">
    <?php
    $dir = "../quizmaths/users/";
    // Open a directory, and read its contents
    if (is_dir($dir))
    {
        if ($dh = opendir($dir))
        {
            while (($file = readdir($dh)) !== false)
            {
                if (is_dir($file) == false)
                {
                    if (strpos($file, ".php") == true)
                    {
                        $filename = str_replace(".php", "", $file);
                        echo "<li class='filterDiv user show'><div class='content'>";
                        echo "<a class='sections' href='" . $filename . "'>";
                        echo $filename;
                        echo "<img src='/quizmaths/images/user.png' class='profile-picture'>";
                        echo "</a>";
                        echo "</div></li>";
                    }
                }
            }
            closedir($dh);
        }
    }
    $sixieme = "../quizmaths/cours/6e";
    $cinquieme = "../quizmaths/cours/5e";
    $quatrieme = "../quizmaths/cours/4e";
    $troisieme = "../quizmaths/cours/3e";
    // Open a directory, and read its contents
    if ($dh = opendir($sixieme))
    {
        while (($file = readdir($dh)) !== false)
        {
            if (is_dir($file) == false)
            {
                if (strpos($file, ".pdf") == true)
                {
                    $filename = str_replace(".pdf", "", $file);
                    echo "<li class='filterDiv 6e show'><div class='content'>";
                    echo "<a class='sections' href='cours/6e/" . utf8_encode($filename) . ".pdf' target='_blank'>" . utf8_encode($filename) . "</a>";
                    echo "</div></li>";
                }
            }
        }
        closedir($dh);
    }
    if ($dh = opendir($cinquieme))
    {
        while (($file = readdir($dh)) !== false)
        {
            if (is_dir($file) == false)
            {
                if (strpos($file, ".pdf") == true)
                {
                    $filename = str_replace(".pdf", "", $file);
                    echo "<li class='filterDiv 5e show'><div class='content'>";
                    echo "<a class='sections' href='cours/5e/" . utf8_encode($filename) . ".pdf' target='_blank'>" . utf8_encode($filename) . "</a>";
                    echo "</div></li>";
                }
            }
        }
        closedir($dh);
    }
    if ($dh = opendir($quatrieme))
    {
        while (($file = readdir($dh)) !== false)
        {
            if (is_dir($file) == false)
            {
                if (strpos($file, ".pdf") == true)
                {
                    $filename = str_replace(".pdf", "", $file);
                    echo "<li class='filterDiv 4e show'><div class='content'>";
                    echo "<a class='sections' href='cours/4e/" . utf8_encode($filename) . ".pdf' target='_blank'>" . utf8_encode($filename) . "</a>";
                    echo "</div></li>";
                }
            }
        }
        closedir($dh);
    }
    if ($dh = opendir($troisieme))
    {
        while (($file = readdir($dh)) !== false)
        {
            if (is_dir($file) == false)
            {
                if (strpos($file, ".pdf") == true)
                {
                    $filename = str_replace(".pdf", "", $file);
                    echo "<li class='filterDiv 3e show'><div class='content'>";
                    echo "<a class='sections' href='cours/3e/" . utf8_encode($filename) . ".pdf' target='_blank'>" . utf8_encode($filename) . "</a>";
                    echo "</div></li>";
                }
            }
        }
        closedir($dh);
    }
    ?>
</ul>
<?php echo('<script>
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }</script>'); ?>