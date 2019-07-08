<?php 
  include("session.php");
  if(!isset($_SESSION["UID"])){
    header("location:home.php");
  }
  include("config.php");
  //echo $_SESSION['UID'];
if (isset($_POST['submit'])){
    $query3 = "select B_Code, Issue_Status from book_issue where U_ID = '" .$_POST['id']. "' AND Issue_Status = 'Unreturned'";
    $result3 = mysqli_query($connection, $query3);
    $row3 = mysqli_fetch_assoc($result3);
    $bcode = $row3["B_Code"];
    $bstatus = $row3["Issue_Status"];

    $query8 = "select available from book where B_Code = '$bcode'";
    $result8 = mysqli_query($connection, $query8);
    $row8 = mysqli_fetch_assoc($result8);
    $available8 = $row8["available"] + 1;

     if($bstatus == "Unreturned"){
      $query4 ="update book set available = '$available8' where B_Code = '$bcode'";
      $result4 = mysqli_query($connection, $query4);
      }

    $query = "update book_issue set Issue_Status = 'Returned' where B_Code = '$bcode' AND U_ID = '" .$_POST['id']. "' AND Issue_Status = 'Unreturned'";
    $result = mysqli_query($connection, $query);
    header('refresh:0 url=adminviewissue.php');
    echo "Book returned!";   
}else{
    ?>
    <div style="margin-top: 250px;">   
     <center> <h2><b>Are you sure you want to return this book</b></h2> </center>
     </div>
 
    <form method="post" action="update.php">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" class="form-control">
        </div>
        <div class="form-group">
           <center>   <input type="submit" name="submit" value="Yes" class="form-control">
            <input type="button" value="No" onclick="history.go(-1);" class="form-control"></center> 
        </div>
    </form>
    <?php
}
?>