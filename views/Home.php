<?php
    include("../servers/db.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
    <style>

        a{
            text-decoration: none;
            color: gray;
        }

        body{
            margin: 10px;
        }

        * {box-sizing: border-box}

        /* Style the tab */
        .tab, .tab2, .tab3 {
            float: left;
            border: 0px 0px 1px solid #ccc;
            background-color: white;
            width: 15%;
            height: 500px;
            overflow: auto;
        }

        .tab3{
            width: 70%;
        }

        .tab2 button {
            display: block;
            background-color: inherit;
            color: black;
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            display: block;
            background-color: inherit;
            color: black;
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        .tab2 button:hover {
            background-color: #ddd;
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
            background-color: aquamarine;
        }

        .tab2 button.active {
            background-color: aquamarine;
        }
        
        .tab::-webkit-scrollbar {
          width: 3px;
        }
        
        /* Track */
        .tab::-webkit-scrollbar-track {
          box-shadow: inset 0 0 5px grey; 
          border-radius: 10px;
        }
         
        /* Handle */
        .tab::-webkit-scrollbar-thumb {
          background: blue; 
          border-radius: 10px;
        }
        
        /* Handle on hover */
        .tab::-webkit-scrollbar-thumb:hover {
          background: rgb(0, 195, 255);  
        }

        .tab2::-webkit-scrollbar {
          width: 3px;
        }
        
        /* Track */
        .tab2::-webkit-scrollbar-track {
          box-shadow: inset 0 0 5px grey; 
          border-radius: 10px;
        }
         
        /* Handle */
        .tab2::-webkit-scrollbar-thumb {
          background: blue; 
          border-radius: 10px;
        }
        
        /* Handle on hover */
        .tab2::-webkit-scrollbar-thumb:hover {
          background: rgb(0, 195, 255); 
        }

        .tab3::-webkit-scrollbar {
          width: 3px;
        }
        
        /* Track */
        .tab3::-webkit-scrollbar-track {
          box-shadow: inset 0 0 5px grey; 
          border-radius: 10px;
        }
         
        /* Handle */
        .tab3::-webkit-scrollbar-thumb {
          background: blue; 
          border-radius: 10px;
        }
        
        /* Handle on hover */
        .tab3::-webkit-scrollbar-thumb:hover {
          background: rgb(0, 195, 255); 
        }

        td a{
            color: blue;
        }

        td a:hover{
            color: orangered;
        }

        td{
            width: 100%;
        }

        td span{
            margin-left:10px;
        }

    </style>
</head>
<body>
    <?php 
        require_once("../layouts/header.php");
        $query_threadtopic = "SELECT * FROM threadtopic";
        $query_threadsubtopic = "SELECT * FROM threadsubtopic";
        $query_thread = "SELECT * from thread";

        $result_threadtopic = mysqli_query($conn, $query_threadtopic);
        $topic = array();
        $id_topic = array();
        $index = 0;
        echo "<script> var topics = new Array()</script>";
        
        while($row = mysqli_fetch_assoc($result_threadtopic))
        {
            //echo 1;
            $topic[$index] = str_replace(" ", "", $row['topicname']);
            $id_topic[$index] = $row['id'];
            echo "<script>topics[".$index."] = '".$topic[$index]."'</script>";
            $index = $index + 1;
        }

        $result_threadsubtopic = mysqli_query($conn, $query_threadsubtopic);
        $subtopic = array();
        $id_subtopic = array();
        $index = 0;
        echo "<script>var subtopics = new Array()</script>";
        while($row = mysqli_fetch_assoc($result_threadsubtopic))
        {
            //echo 2;
            $subtopic[$index] = str_replace(" ","", $row['threadsubtopic_name']);
            $id_subtopic[$index] = $row['id'];
            echo "<script>subtopics[".$index."] ='".$subtopic[$index]."'</script>";
            $index = $index + 1;
        }
        

        $result_threadtopic = mysqli_query($conn, $query_threadtopic);
        $result_threadsubtopic = mysqli_query($conn, $query_threadsubtopic);
        $result_thread = mysqli_query($conn, $query_thread);
        // echo json_encode($topic);
        // die();
    ?>
    <br>
    <div class="container-fluid" style="display: inline;">
        <h5 style="display: inline;">Forum Groups</h3>
        <?php
            if(isset($_SESSION["UserID"]))
            {
                if($_SESSION["isVerified"] == 1)
                {
                    ?>
                        <button class="btn btn-primary" onclick="location.href = 'threadDetail/ViewThread.php'" style="float: right; margin-left:10px">CREATE THREAD</button>
                        <hr style="float: right; width: 77%; margin-right: 25px;">
                    <?php
                }
                else
                {
                    ?>
                    <hr style="float: right; width: 88%;">
                    <?php
                }
            }
            else
            {
                ?>
                <hr style="float: right; width: 88%;">
                <?php
            }
        ?>
    </div>
    <br>
    <br>
    <div class="container-fluid">
        <div class="tab">
        <?php
            // echo mysqli_num_rows($result_threadtopic);
            // die();
            if(mysqli_num_rows($result_threadtopic) > 0)
            {
                $count = 1;
                //echo $result_threadtopic;
                while($row = mysqli_fetch_assoc($result_threadtopic))
                {                
                    if($count == 1)
                    {
                        echo "<button id='defaultOpen' class='tablinks' onclick=generateSubTopic(event,'".str_replace(" ", "", $row['topicname'])."')>".strtoupper($row['topicname'])."</button>";
                    }
                    else
                    {
                        echo "<button class='tablinks' onclick=generateSubTopic(event,'".str_replace(" ", "", $row['topicname'])."')>".strtoupper($row['topicname'])."</button>";
                    }
                    $count = $count + 1;
                }
            }
            $result_threadtopic = mysqli_query($conn, $query_threadtopic);
            $result_threadsubtopic = mysqli_query($conn, $query_threadsubtopic);
        ?>
        </div>
        <div class="tab2">
        <?php
            if(mysqli_num_rows($result_threadsubtopic) > 0)
            {
                $count = 1;
                  while($row = mysqli_fetch_assoc($result_threadsubtopic))
                  {
                      for($i = 0; $i < count($id_topic); $i++)
                      {
                          if($id_topic[$i] == $row['threadtopic_id'])
                          {
                              if($row["threadsubtopic_name"] == "Painting")
                              {
                                echo "<button id='defaultOpen2' class='".$topic[$i]."' onclick=generateThread(event,'".str_replace(" ","", $row['threadsubtopic_name'])."')>".strtoupper($row['threadsubtopic_name'])."</button>";
                              }
                              else
                              {
                                echo "<button class='".$topic[$i]."' onclick=generateThread(event,'".str_replace(" ","", $row['threadsubtopic_name'])."')>".strtoupper($row['threadsubtopic_name'])."</button>";
                              }
                              break;
                          }
                      }
                      $count = $count + 1;
                  }
            }
            $result_threadtopic = mysqli_query($conn, $query_threadtopic);
            $result_threadsubtopic = mysqli_query($conn, $query_threadsubtopic);
        ?>
        </div>
        <div class="tab3">
            <table class="table table-striped">
                <tbody>
                <?php
                    if(mysqli_num_rows($result_thread) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result_thread))
                        {
                            for($i = 0; $i < count($id_subtopic); $i++)
                            {
                                if($id_subtopic[$i] == $row['threadsubtopic_id'])
                                {
                                    $query_getUser = "SELECT * FROM user WHERE id = '$row[creator_id]'";
                                    $result_getUser = mysqli_query($conn, $query_getUser);
                                    $row_getUser = mysqli_fetch_assoc($result_getUser);
                                    echo "<tr><td class ='".$subtopic[$i]."'>";
                                    if(strlen($row['title']) > 100)
                                    {
                                        echo "<a class='".$subtopic[$i]."' href='http://localhost/views/threadDetail/ViewThread.php?id=".$row['id']."'>".substr($row['title'], 0, 100)."...</a> <span class='".$subtopic[$i]."'> by ".$row_getUser['username']."</span>";
                                    }
                                    else
                                    {
                                        echo "<a class='".$subtopic[$i]."' href='http://localhost/views/threadDetail/ViewThread.php?id=".$row['id']."'>".$row['title']."</a> <span class='".$subtopic[$i]."'> by ".$row_getUser['username']."</span>";
                                    }
                                    echo "</td></tr>";
                                    break;    
                                }
                            }    
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container-fluid" style="display: inline; width: 100%;">
        <h5 style="display: inline;">Site</h3>
        <hr style="float: right; width: 95%;">
        <br>
        <span style="display: inline-block; margin-left: 10px;"> 
        <?php
            $query_getActiveUser = "SELECT COUNT(id) as totaluser FROM user WHERE moderationstatus = 'Active'";
            $result_getActiveUser = mysqli_query($conn, $query_getActiveUser);
            $row_activeuser = mysqli_fetch_assoc($result_getActiveUser);
            echo "Currently Active Users : ".$row_activeuser['totaluser'];
        ?>
        </span>
    </div>
<?php
    mysqli_close($conn);
?>

<script src="../javascript/generate_thread.js"></script>
<script>
    document.getElementById("defaultOpen").click();
    document.getElementById("defaultOpen2").click();
</script>
</body>
</html>