<?php
header('Content-Type: application/json');
 require "conn.php";
 require "models.php";
 session_start();
 $user=$_SESSION['user_data'];
class Any {
    var $id;
    var $location;
    var $name_event;
    var $start;
    var $start_date;   
    var $end_date;
    var $end;
}
$i=0;
$j=0;
$l=0;
$s=0;

$arr=array();
$arr_date=array();
$arr_date_sorted=array();
$interested = array();
$user_id=$user->id;
$event_id;

$mysql="SELECT * FROM event_interested where event_interested.user_id=$user_id";
$r_sql=mysqli_query($conn,$mysql);
 
  while($row_sql= mysqli_fetch_assoc($r_sql)) 
   {
$interested[$s] = $row_sql['event_type_id'];
$s++;
print_r($interested);
   }
  $s=0;     

$mysql_qry="SELECT * FROM my_event where my_event.event_type_id=$interested[$s]";
$r=mysqli_query($conn,$mysql_qry);
if (!$r)
{
    echo "Failed";
   die(mysqli_error($conn)); 
}

else {
  
while ($row= mysqli_fetch_assoc($r)) 
        {
$myObj0 = new Any();
$myObj0->id = $row['event_id'];
$id=$row['event_id'];
$myObj0->location =$row['location_id'];
$myObj0->name_event = $row['event_name'];
$myObj0->start_date = $row['start_date'];
$myObj0->end_date = $row['end_date'];
$arr_date[$j] =  $row['start_date'];
///////////////////////////////////////////////////////////////////
$mysql_qry3="SELECT * FROM agenda WHERE agenda.event_id = $id ";
$r3=mysqli_query($conn,$mysql_qry3);
if (!$r3)
{
$myObj0->start = 'un';
$myObj0->end ='un';
}
else{
 $row3= mysqli_fetch_assoc($r3);
$myObj0->start = $row3['start_time'];
$myObj0->end = $row3['end_time'];
}
/////////////////////////////////////////////////////////////////
$arr[$i]=$myObj0;
$i++;
$j++;
    }
}

function date_sort($a, $b) {
    return  strtotime($b)-strtotime($a);
}
usort($arr_date, "date_sort");


for ($k=0;$k<count($arr);$k++)
{
 for ($m=0;$m<count($arr_date);$m++)
{
    if ($arr_date[$k] === $arr[$m]->start_date)
    {
       $arr_date_sorted[$k]=$arr[$m];
     
    }
      
}   
}
echo json_encode($arr_date_sorted);

?>

