
<?php
header('Content-Type: application/json');
require "conn.php";
require "models.php";
$user_email=$_GET["email"];
$user_pass=$_GET["pass"];
$event_id=$_GET["id"];

session_start();

$mysql_qry="SELECT * FROM login WHERE password = '$user_pass' AND email = '$user_email'";
$result=mysqli_query($conn, $mysql_qry);
if(!$result) 
{
    die(mysqli_error($conn));
}
else
{
    $rows = mysqli_num_rows($result);
    if ($rows == 1)
    {
        $user = new UserData();
        $mysql_qry="SELECT * FROM users WHERE  email = '$user_email'";
        $result=mysqli_query($conn, $mysql_qry);
        if(!$result) 
        {
            die(mysqli_error($conn));
        }
        else
            {
                if (mysqli_num_rows($result) == 1)
                {
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        
                            $user->firstname=$row["first_name"];
                            $user->lastname=$row["last_name"];
                            $user->email=$row["email"];
                            $user->id=$row["user_id"];
                        
                    }
                       
                    echo  json_encode("{\"status\":\"success\"}");
                    $mysql_qry2="SELECT * FROM meta_data WHERE  user_id = '$user->id'";
                    $result2=mysqli_query($conn, $mysql_qry2);
                    if(!$result2) 
                    {
                        die(mysqli_error($conn));
                    }

                    if (mysqli_num_rows($result2) == 1)
                    {
                        while($row2 = mysqli_fetch_assoc($result2)) 
                        {
                            $user->gender=$row2["gender"];
                            $user->address=$row2["address"];
                            $user->job=$row2["job"];
                        }
                
                    }
                
            
                } 
                else
                {
                    echo  json_encode("{\"status\":\"failure\"}");
                }      
            }

        $_SESSION['user_data'] = $user;
        $user=$_SESSION['user_data'];
        $user_id= $user->id;
        $mysql_qry="SELECT * FROM audience WHERE user_id = $user_id ";
        $result=mysqli_query($conn, $mysql_qry);
        $row = mysqli_fetch_assoc($result);
        $audience_id=$row['audience_id'];
            
        if($audience_id==null)
        {
            $mysql_qry2 = "INSERT INTO audience (user_id,audience_id) VALUES ('$user_id',null)";
            $result2=mysqli_query($conn, $mysql_qry2);

        }
        $mysql_qry3="SELECT * FROM audience WHERE user_id = $user_id ";
        $result3=mysqli_query($conn, $mysql_qry3);
        $row3 = mysqli_fetch_assoc($result3);
        $audience_id2=$row3['audience_id'];

        $mysql_qry4="INSERT INTO event_audience(event_id, audience_id) VALUES ($event_id,$audience_id2) ";
        $result4=mysqli_query($conn, $mysql_qry4);

        $mysql_qry5="SELECT * FROM my_event WHERE event_id = $event_id ";
        $result5=mysqli_query($conn, $mysql_qry5);
        $row5 = mysqli_fetch_assoc($result5);
        $NoOfAttendeeFirst=$row5['NoOfAttendee'];
        $NoOfAttendeeSecond = $NoOfAttendeeFirst+1;;
    
        $mysql_qry6="UPDATE my_event SET NoOfAttendee = $NoOfAttendeeSecond  WHERE event_id = $event_id";
        $result6=mysqli_query($conn, $mysql_qry6);
    
    }
}