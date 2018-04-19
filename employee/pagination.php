<?php
/**
 * Created by PhpStorm.
 * User: Chaitanya.Padamati
 * Date: 4/9/2018
 * Time: 10:19 PM
 */
include_once 'config.php';
$record_per_page=10;
$page='';
$output= '';

if(isset($_POST['page']))
{
    $page= $_POST['page'];
}
else{
    $page=1;
}
$start_from= ($page-1) * $record_per_page;

$query= "select * from emptable ORDER By id DESC LIMIT $start_from, $record_per_page";
$result= mysqli_query($conn,$query);
$output .="
           <table border='3px' class='table table-bordered' align='center'>
    <tr>
        <th >Name</th>
        <th >T lead</th>
        <th >Team</th>
    </tr>
";
while($row= mysqli_fetch_array($result)){
    $output.="
            <tr>
                <td>".$row['EmpName']."</td>
                <td>".$row['email']."</td>
                <td>".$row['mobile']."</td>
                <td>".$row['gender']."</td>
            </tr>
    ";
}
$output .='</table><br/><div align="center">';
$page_query= "select * from emptable ORDER BY id DESC ";
$page_result= mysqli_query($conn, $page_query);
$total_records= mysqli_num_rows($page_result);
$total_pages= ceil($total_records/$record_per_page);

for($i=1; $i<=$total_pages;$i++){
    $output .="<span class='pagination_link' style='cursor: pointer;padding: 6px; border: 1px solid #ccc;
id='".$i."'>".$i."</span>";
}
echo $output;
?>