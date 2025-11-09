<?php
$d=$_GET['x'];
$con=mysqli_connect('localhost','root','','event_management');
$query=mysqli_query($con,"SELECT * FROM event WHERE eve_id='$d'");
$f=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UPDATE Event - Event Management System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f8fc;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }

    .form-box {
      background: white;
      width: 40%;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #007bff;
      margin-bottom: 20px;
    }

    input {
      margin-bottom: 15px;
    }

     input, textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      outline: none;
    }

     input:focus,textarea:focus {
      border-color: #007bff;
    }

     textarea {
      resize: none;
    }

    .footer {
      text-align: center;
      margin-top: 25px;
      font-size: 13px;
      color: #555;
    }

    .footer span {
      color: #007bff;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="form-box">
    <h2>Create Event</h2>
    <form method="POST" action="">
        
      EVENT_TITLE:
      
        <input type="text" name="title"values="<?php echo $f['title'];?>" required> <br>
      
      Description:
        <textarea maxlength="50" name="des" rows="3" values="<?php echo $f['description'];?>"required></textarea>
      
      <br>
      Event_Date:
        <input type="date" name="date" values="<?php echo $f['event_date'];?>"required><br>
        Venue:
      
        <input type="text" name="venue" values=<?php echo $f['venue'];?> required><br>
        Organizer:
      
        <input type="text" name="organ"  values="<?php echo $f['organizer'];?>" required><br>
        Max_Attandance:
      
      
        <input type="number" name="max" values="<?php echo $f['max_attandes'];?>" required><br>
        Ticket_Price:
     
        <input type="number" step="0.01" name="price"  values="<?php echo $f['ticket_price'];?>" required><br>
      
      <input type="submit" class="" name="save" value="UPDATE_EVENT">
    </form>
  

  <div class="footer">
    <p>Copyright &copy; 2025 <span>Julissa</span>. All Rights Reserved.</p>
  </div>

  <?php
if(isset($_POST['save'])){
    $tit=$_POST['title'];
    $des=$_POST['des'];
    $dt=$_POST['date'];
    $vn=$_POST['venue'];
    $org=$_POST['organ'];
    $max=$_POST['max'];
    $pr=$_POST['price'];
$con=mysqli_connect('localhost','root','','event_management');
    $up=mysqli_query($con,"UPDATE event set title='$tit',description='$des',event_date='$dt',
    venue='$vn',organizer='$org',max_attandes='$max',ticket_price='$pr' where even_id='$d'");
    if($up){
        header("location:insert.php");
    }
    else{
       header("location:index.php"); 
    }
}
?>

</html>