<?php
$d = $_GET['x'];
$con = mysqli_connect('localhost', 'root', '', 'event_management');

// Correct table and column names
$query = mysqli_query($con, "SELECT * FROM event WHERE eve_id='$d'");
$f = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Event - Event Management System</title>
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

    input, textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      outline: none;
      margin-bottom: 15px;
    }

    input:focus, textarea:focus {
      border-color: #007bff;
    }

    textarea {
      resize: none;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: white;
      border: none;
      font-weight: bold;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
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
    <h2>Update Event</h2>
    <form method="POST" action="">
      <input type="text" name="title" placeholder="Event Title" value="<?php echo $f['title']; ?>" required>

      <textarea name="des" rows="3" placeholder="Event Description" required><?php echo $f['description']; ?></textarea>

      <input type="date" name="date" value="<?php echo $f['event_date']; ?>" required>

      <input type="text" name="venue" placeholder="Venue" value="<?php echo $f['venue']; ?>" required>

      <input type="text" name="organ" placeholder="Organizer" value="<?php echo $f['organizer']; ?>" required>

      <input type="number" name="max" placeholder="Max Attendees" value="<?php echo $f['max_attandes']; ?>" required>

      <input type="number" step="0.01" name="price" placeholder="Ticket Price (USD)" value="<?php echo $f['ticket_price']; ?>" required>

      <input type="submit" name="save" value="UPDATE EVENT">
    </form>
  </div>

  <div class="footer">
    <p>Copyright &copy; 2025 <span>Julissa</span>. All Rights Reserved.</p>
  </div>

<?php
if (isset($_POST['save'])) {
    $tit = $_POST['title'];
    $des = $_POST['des'];
    $dt = $_POST['date'];
    $vn = $_POST['venue'];
    $org = $_POST['organ'];
    $max = $_POST['max'];
    $pr = $_POST['price'];

    // Correct table and column names in UPDATE query
    $up = mysqli_query($con, "UPDATE event SET 
        title='$tit',
        description='$des',
        event_date='$dt',
        venue='$vn',
        organizer='$org',
        max_attandes='$max',
        ticket_price='$pr'
        WHERE eve_id='$d'");

    if ($up) {
        header("Location: insert.php");
    } else {
        echo "<script>alert('Update failed');</script>";
    }
}
?>
</body>
</html>
