<!DOCTYPE html>
<html lang="en">
<head>
     <title>Wintec Cricket Academy - Login</title>
     <meta charset = "utf-8">
     <meta name = "viewport" content = "width=device-width, initial-scale=1">
</head>
<body>
  <form name ="custBooking" action = "bookProcess.php" method = "post">
    <label name = "emailLabel">Email</label>
  <input type = "email" name = "userMail"><br>
  <label name = "massageLabel1">Please tell more about yourself to serve better</label>
  <textarea name = "custInfo" cols = 30 rows = 5></textarea><br>
  <label name = "massageLabel1">Did you have anxiety and mental distress ? </label>
  <input type = "radio" name = "massageOption1" value = "yes">Yes
  <input type = "radio" name = "massageOption1" value = "no">No<br>
  <label name = "massageLabel2">Did you have a head injury recently ? </label>
  <input type = "radio" name = "massageOption2" value = "yes">Yes
  <input type = "radio" name = "massageOption2" value = "no">No<br>
  <label name = "massageLabel3">Select the Massage type </label>
  <select name = "massageType">
  <option name = "Relaxation"> Relaxation Massage </option>
  <option name = "Head"> Head Massage </option>
</select><br>
  <label name = "massageLabel4">Please pick your timeslot</label>
  <label name = "tSlot1">11am - 12pm</label>
  <input type = "radio" name = "timeSlot" value = "1112">
  <label name = "tSlot2`">12am - 1pm</label>
  <input type = "radio" name = "timeSlot" value = "1213">
  <label name = "timeSlot2">1pm - 2pm</label>
  <input type = "radio" name = "timeSlot" value = "1314">
  <label name = "tSlot3">2pm - 3pm</label>
  <input type = "radio" name = "timeSlot" value = "1415">
  <label name = "appDate">Please select a date</label>
  <input type = "date" name = "appointmentDate">
  <input type = "submit" name = "submit" value = "submit">
</form>
</body>
</html>
