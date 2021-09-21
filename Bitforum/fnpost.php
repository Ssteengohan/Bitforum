<?php
function userlogout($connect)
{
    if (isset($_POST['logoutsubmit']))
    {
        session_start();
        session_destroy();
        header("Refresh:0");
        exit();
    }
}

function opties($connect)
{
    echo "<center><div class='filterposi'>
    <div class='filter'>
        
           
                <a class='nieuw1' href='pbpost.php'>Probleem posten<a>
        
    

        <div class='filterlinks'>
        
            <div class='positienieuw'>
            <form action='' method='POST'>
            <button type='submit' class='nieuw' name='nieuw' value='id' >Nieuw</button> 
                </form>
            </div>

            <div class='positienieuw'>
            <form action='' method='POST'>
            <button type='submit' class='nieuw' name='code' value='Html'>Html</button>
            </form>
            </div>
            <div class='positienieuw'>
            <form action='' method='POST'>
            <button type='submit' class='nieuw' name='code' value='Css'>Css</button>  
            </form>
            </div>
            <div class='positienieuw'>
            <form action='' method='POST'>
            <button type='submit' class='nieuw' name='code' value='PHP'>PHP</button>
                </form>
            </div>

            <div class='positienieuw'>
            <form action='' method='POST'>
            <button type='submit' class='nieuw' name='code' value='Js'>Js</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div></center>";
}

function opthies($connect)
{
    echo "<center><div class='filterposi'>
         <div class='filter'>
                     <a class='nieuw1' href='login.php'>Probleem posten<a>
             <div class='filterlinks'>
             
                 <div class='positienieuw'>
                 <form action='' method='POST'>
                 <button type='submit' class='nieuw' name='nieuw' value='id' >Nieuw</button> 
                     </form>
                 </div>
     
                 <div class='positienieuw'>
                 <form action='' method='POST'>
                 <button type='submit' class='nieuw' name='code' value='Html'>Html</button>
                 </form>
                 </div>
                 <div class='positienieuw'>
                 <form action='' method='POST'>
                 <button type='submit' class='nieuw' name='code' value='Css'>Css</button>  
                 </form>
                 </div>
                 <div class='positienieuw'>
                 <form action='' method='POST'>
                 <button type='submit' class='nieuw' name='code' value='PHP'>PHP</button>
                     </form>
                 </div>
     
                 <div class='positienieuw'>
                 <form action='' method='POST'>
                 <button type='submit' class='nieuw' name='code' value='Js'>Js</button>
                 </div>
                 </form>
             </div>
         </div>
     </div>
     </div></center>";
}

function Post($connect)
{
    $query = "SELECT * FROM post LIMIT 10";
    $i = 0;
    $statement = $connect->query($query);
    foreach ($statement as $eerste)
    {
        $i++;
        echo '<center><div class="post">
             <div class="Titel"><h1><a href=post.php?id=' . $i . '>' . $eerste["Titel"] . '</a></h1></div>
             <div class="Vraag"><h1><a href=post.php?id=' . $i . '>' . $eerste["Vraag"] . '</a></h1></div>
             <div class="Taal"><h1><a href=post.php?id=' . $i . '>' . $eerste["Taal"] . '</a></h1></div>
             <div class="User"><h1><a href=post.php?id=' . $i . '>' . $eerste["User"] . '</a></h1></div>
             <div class="Date"><h1><a href=post.php?id=' . $i . '>' . $eerste["date"] . '</a></h1></div>
             </center></div>';
    }
}

function showpost($connect)
{
    $statement = $connect->prepare("SELECT * FROM `post` WHERE id = :id");
    $id = $_GET["id"];
    $statement->execute(array(
        ':id' => $id
    ));
    foreach ($statement as $eerste)
    {
        $statement2 = $connect->prepare("SELECT * FROM `post` WHERE id = :id");
        $id = $_GET["id"];
        $statement2->execute(array(
            ':id' => $id
        ));
        if ($eerste2 = $statement2->fetch())
        {
            echo '<center><div class="postenen1"><h1>' . $eerste["Titel"] . '</h1>
     <h2>Taal : ' . $eerste["Taal"] . '</h2>
     <h2 class="vraag" >Vraag : ' . $eerste["Vraag"] . '</h2>
     <h2>Code: </h2> <div class="code"><h2 class="floatleft">' . $eerste["Code"] . '</h2></div>
     <h2>Datum : ' . $eerste["date"] . '</h2>
     <h2>User : ' . $eerste["User"] . '</h2></center>';
            if (isset($_SESSION['username']))
            {
                if ($_SESSION['username'] == $eerste2["User"])
                {
                    echo '<center><form class="deletepost" action="' . deletepost($connect) . '" method="POST">
            <input type="hidden" name="id" value="' . $eerste["id"] . '">
            <button type="submit" name="Deletepost">Delete</button></form></div></center';
                }
            }
        }
    }
}
function deletepost($connect)
{
    if (isset($_POST['Deletepost']))
    {
        $id = $_POST['id'];
        $cid = $_GET["id"];
        $sql = "DELETE FROM post WHERE id='$id'";
        $sql1 = "SET @autoid :=0; 
            UPDATE post set id = @autoid := (@autoid+1);
            ALTER TABLE post Auto_Increment = 1";
        $sql2 = "DELETE FROM comments WHERE post_id='$cid'";
        $results = $connect->query($sql2);
        $result = $connect->query($sql);
        $result1 = $connect->query($sql1);
        echo "<script>history.go(-2);</script>";
    }
}
function filter($connect)
{
    if (isset($_POST['code']))
    {
        $filter = $_POST['code'];
        $query = "SELECT * FROM post WHERE Taal LIKE '%$filter%'";
        $i = 0;
        $statement = $connect->query($query);
        foreach ($statement as $eerste)
        {
            $i++;
            echo '<center><div class="post">
                 <div class="Titel"><h1><a href=post.php?id=' . $i . '>' . $eerste["Titel"] . '</a></h1></div>
                 <div class="Vraag"><h1><a href=post.php?id=' . $i . '>' . $eerste["Vraag"] . '</a></h1></div>
                 <div class="Taal"><h1><a href=post.php?id=' . $i . '>' . $eerste["Taal"] . '</a></h1></div>
                 <div class="User"><h1><a href=post.php?id=' . $i . '>' . $eerste["User"] . '</a></h1></div>
                 <div class="Date"><h1><a href=post.php?id=' . $i . '>' . $eerste["date"] . '</a></h1></div>
                 </center></div>';
        }
    }
    else
    {
        Post($connect);
    }
}

function nieuw($connect)
{
    if (isset($_POST['nieuw']))
    {
        $filter = $_POST['nieuw'];
        $query = "SELECT * FROM post WHERE id ORDER BY id DESC";
        $i = 0;
        $statement = $connect->query($query);
        foreach ($statement as $eerste)
        {
            $i++;
            echo '<center><div class="post">
                     <div class="Titel"><h1><a href=post.php?id=' . $i . '>' . $eerste["Titel"] . '</a></h1></div>
                     <div class="Vraag"><h1><a href=post.php?id=' . $i . '>' . $eerste["Vraag"] . '</a></h1></div>
                     <div class="Taal"><h1><a href=post.php?id=' . $i . '>' . $eerste["Taal"] . '</a></h1></div>
                     <div class="User"><h1><a href=post.php?id=' . $i . '>' . $eerste["User"] . '</a></h1></div>
                     <div class="Date"><h1><a href=post.php?id=' . $i . '>' . $eerste["date"] . '</a></h1></div>
                     </center></div>';

        }
    }
    else
    {
        filter($connect);
    }
}
function search($connect)
{
    if (isset($_POST['net']))
    {

        $filter = $_POST['search'];
        $query = "SELECT * FROM post WHERE Taal LIKE '%$filter%'";
        $i = 0;
        $statement = $connect->query($query);
        foreach ($statement as $eerste)
        {
            $i++;
            echo '<center><div class="post">
                 <div class="Titel"><h1><a href=post.php?id=' . $i . '>' . $eerste["Titel"] . '</a></h1></div>
                 <div class="Vraag"><h1><a href=post.php?id=' . $i . '>' . $eerste["Vraag"] . '</a></h1></div>
                 <div class="Taal"><h1><a href=post.php?id=' . $i . '>' . $eerste["Taal"] . '</a></h1></div>
                 <div class="User"><h1><a href=post.php?id=' . $i . '>' . $eerste["User"] . '</a></h1></div>
                 <div class="Date"><h1><a href=post.php?id=' . $i . '>' . $eerste["date"] . '</a></h1></div>
                 </center></div>';
        }

    }
    else
    {
        nieuw($connect);
    }
}
function searchpost($connect)
{
    if (isset($_POST['net']))
    {
        opties($connect);
        $filter = $_POST['search'];
        $query = "SELECT * FROM post WHERE Taal LIKE '%$filter%'";
        $i = 0;
        $statement = $connect->query($query);
        foreach ($statement as $eerste)
        {
            $i++;
            echo '<center><div class="post">
                 <div class="Titel"><h1><a href=post.php?id=' . $i . '>' . $eerste["Titel"] . '</a></h1></div>
                 <div class="Vraag"><h1><a href=post.php?id=' . $i . '>' . $eerste["Vraag"] . '</a></h1></div>
                 <div class="Taal"><h1><a href=post.php?id=' . $i . '>' . $eerste["Taal"] . '</a></h1></div>
                 <div class="User"><h1><a href=post.php?id=' . $i . '>' . $eerste["User"] . '</a></h1></div>
                 <div class="Date"><h1><a href=post.php?id=' . $i . '>' . $eerste["date"] . '</a></h1></div>
                 </center></div>';
        }

    }
    else
    {
        showpost($connect);
        comment($connect);
        sentcomment($connect);
    }
}
function searchpost1($connect)
{
    if (isset($_POST['net']))
    {
        opties($connect);
        $filter = $_POST['search'];
        $query = "SELECT * FROM post WHERE Taal LIKE '%$filter%'";
        $i = 0;
        $statement = $connect->query($query);
        foreach ($statement as $eerste)
        {
            $i++;
            echo '<center><div class="post">
                 <div class="Titel"><h1><a href=post.php?id=' . $i . '>' . $eerste["Titel"] . '</a></h1></div>
                 <div class="Vraag"><h1><a href=post.php?id=' . $i . '>' . $eerste["Vraag"] . '</a></h1></div>
                 <div class="Taal"><h1><a href=post.php?id=' . $i . '>' . $eerste["Taal"] . '</a></h1></div>
                 <div class="User"><h1><a href=post.php?id=' . $i . '>' . $eerste["User"] . '</a></h1></div>
                 <div class="Date"><h1><a href=post.php?id=' . $i . '>' . $eerste["date"] . '</a></h1></div>
                 </center></div>';
        }

    }
    else
    {
        showpost($connect);
        comment($connect);
    }
}
?>
