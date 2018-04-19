<?php
/**
 * Created by PhpStorm.
 * User: Chaitanya.Padamati
 * Date: 4/9/2018
 * Time: 10:06 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/form_style.css" rel="stylesheet" type="text/css" media="screen">
</head>
</head>
<body>
    <div class="container">
        <h3>Interview Applicants Details</h3>
        <div class="table-responsive" id="pagination_data">

        </div>
    </div>
</body>
<script src="angular.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/registration_controller.js"></script>
<script>

    $(document).ready(function () {
        load_data();
        function load_data(page) {
            $.ajax({
                url:'pagination.php',
                method:'POST',
                data: {
                    page:page
                },
                success: function (data) {
                    $('pagination_data').html(data);
                }
            })
        }
        $(document).on('click','.pagination_link', function () {
            var page= $(this).attr("id");
            load_data(page);
        })
    })
</script>
</html>

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
        <th>Employee Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Gender</th>
        <th>Experience</th>
        <th>Previous Company</th>
        <th>Source</th>
        <th>Applied Position</th>
        <th>Round</th>
        <th>Interview Date</th>
        <th>Interview Time</th>
        <th>Comments</th>
    </tr>
";
while($row= mysqli_fetch_array($result)){
    $output.="
            <tr>
                <td>".$row['EmpName']."</td>
                <td>".$row['email']."</td>
                <td>".$row['mobile']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['experience']."</td>
                <td>".$row['prev_company']."</td>
                <td>".$row['about_jd']."</td>
                <td>".$row['position_applied']."</td>
                <td>".$row['round']."</td>
                <td>".$row['interview_date']."</td>
                <td>".$row['interview_time']."</td>
                <td>".$row['comments']."</td>
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
