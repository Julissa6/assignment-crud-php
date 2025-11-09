<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Event - Event Management System</title>
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
    .back-home{
      background-color: blue;
      padding: 5px;
      border-radius: 7px;
      border:none;

    }
  </style>
</head>
<body>
<a href="index.php">
  <button class="back-home">Home</button>
</a>
  <div class="form-box">
    <h2>Create Event</h2>
    <form method="POST" action="index.php">
      EVENT_TITLE:
      
        <input type="text" name="title" placeholder="Event Title" required> <br>
      
      Description:
        <textarea maxlength="50" name="des" rows="3" placeholder="Event Description not more than 50" required></textarea>
      
      <br>
      Event_Date:
        <input type="date" name="date" required><br>
        Venue:
      
        <input type="text" name="venue" placeholder="Venue" required><br>
        Organizer:
      
        <input type="text" name="organ" placeholder="Organizer" required><br>
        Max_Attandance:
      
      
        <input type="number" name="max" placeholder="Max Attendees" required><br>
        Ticket_Price:
     
        <input type="number" step="0.01" name="price" placeholder="Ticket Price (frw)" required><br>
      
      <input type="submit" class="" name="save" value="Save Event">
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

    $conn=mysqli_connect('localhost','root','','event_management');
    $query=mysqli_query($conn,"insert into event(title,description,event_date,venue,organizer,max_attandes,ticket_price) 
    values('$tit','$des','$dt','$vn','$org','$max','$pr')");
    if($query){
        echo"<script> alert('event created successful')</script>";
    }
    else
    {
        echo"<script>alert('fail banange')</script>;";
    }
}
  ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<table border="1">
    <tr>
        <th>EVENT_ID</th>
         <th>EVENT_TITLE</th>
          <th>EVENT_Description</th>
           <th>EVENT_Date</th>
            <th>EVENT_Venue</th>
             <th>EVENT_Organizer</th>
              <th>EVENT_ Max_Attandance</th>
               <th>EVENT_ticket_price</th>
               <th>action</th>
    </tr>
    <?php
    $con=mysqli_connect('localhost','root','','event_management');
    $query=mysqli_query($con,"select * from event");
    while ($fetch=mysqli_fetch_array($query)) { 
    ?>
    <tr>
        <td><?php echo $fetch['eve_id'];?></td>
        <td><?php echo $fetch['title'];?></td>
        <td><?php echo $fetch['description'];?></td>
         <td><?php echo $fetch['event_date'];?></td>
          <td><?php echo $fetch['venue'];?></td>
           <td><?php echo $fetch['organizer'];?></td>
            <td><?php echo $fetch['max_attandes'];?></td>
             <td><?php echo $fetch['ticket_price'];?></td>
             <td>
                <a href="modify.php? x=<?php echo $fetch['eve_id'];?>">Modify</a>
                <a href="remove.php? b=<?php echo $fetch['eve_id'];?>">REMOVE</a>
             </td>
    </tr>

    <?php
    }
    ?>

</table>
</body>
</html>