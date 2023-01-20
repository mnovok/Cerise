<?php 


function get_com(){

    
$con = mysqli_connect("localhost","root","","cerise") or die("Connection was not established");

    $get_id = $_GET['post_id'];

    $get_com = "SELECT * FROM comments WHERE post_ID = '$get_id' ORDER BY 1 DESC";

    $run_com = mysqli_query($con, $get_com);

    while($row = mysqli_fetch_array($run_com)){
        $com = $row['text'];
        $com_name = $row['user'];


        echo"
            <div class='row'>
                <div class=col-md-6 col-md-offset-3'>
                    <div class='panel panel-info'>
                    <div class='panel-body'>
                        <div>
                            <h4><strong>$com_name</strong><i> commented</i></h4>
                            <p class='text-primary' style='margin-left:5px; font-size:20px;'>$com</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        ";
    }
}
?>