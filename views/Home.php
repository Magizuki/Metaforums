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
    <script src="../javascript/generate_thread.js"></script>
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
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width: 10%;
            height: 300px;
            overflow: auto;
        }

        .tab3{
            display: none;
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
            background-color: rgb(247, 16, 16);
        }

        .tab2 button.active {
            background-color: rgb(247, 16, 16);
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
        $result_threadsubtopic = mysqli_query($conn, $query_threadsubtopic);
        $result_thread = mysqli_query($conn, $result_thread);
    ?>
    <br>
    <br>
    <div class="container-fluid" style="display: inline;">
        <h5 style="display: inline;">Forum Groups</h3>
        <hr style="float: right; width: 88%;">
    </div>
    <br>
    <div class="container-fluid">
        <div class="tab">
        <?php
            if(mysqli_num_rows($result_threadtopic) > 0)
            {
                $count = 1;
                while($row = mysqli_fetch_assoc($result_threadtopic))
                {
                    if($count == 1)
                    {
                        echo "<button id='defaultOpen' class='tablinks' onclick='openCity(event, '".$row['topicname']."')'>".$row['topicname']."</button>";
                    }
                    else
                    {
                        echo "<button class='tablinks' onclick='openCity(event, '".$row['topicname']."')'>".$row['topicname']."</button>";
                    }
                    $count = $count + 1;
                }
            }
            
        ?>
        </div>
        <div class="tab2">
        <?php
            if(mysqli_num_rows($result_threadsubtopic) > 0)
            {
                $count = 1;
                  while($row = mysqli_fetch_assoc($result_threadsubtopic))
                  {
                      while($row2 = mysqli_fetch_assoc($result_threadtopic))
                      {
                          if($row2['id'] == $row['threadtopic_id'])
                          {
                              if($count == 1)
                              {
                                echo "<button id='defaultOpen2' class='".$row2['topicname']."' onclick='openCity(event, '".$row['threadsubtopic_name']."')'>".$row['threadsubtopic_name']."</button>";
                              }
                              else
                              {
                                echo "<button class='".$row2['topicname']."' onclick='openCity(event, '".$row['threadsubtopic_name']."')'>".$row['threadsubtopic_name']."</button>";
                              }
                              break;
                          }
                      }
                      $count = $count + 1;
                  }
            }
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
                            while($row2 = mysqli_fetch_assoc($result_threadsubtopic))
                            {
                                if($row2['id'] == $row['threadsubtopic_id'])
                                {
                                    echo "<tr><a class='".$row2['threadsubtopic_name']."' href='http://localhost/views/threadDetail/ViewThread.php?id='".$row['id']."'>".$row['title']."</a></tr>";
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
<?php
    mysqli_close($conn);
?>
</body>
</html>