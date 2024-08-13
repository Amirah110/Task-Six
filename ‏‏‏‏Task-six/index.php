<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>تسجيل الصوت وتحويله إلى نص</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>TASK FOUR</h1>
  <h2>Convert audio to text and save it in the Database</h2>
  <form id="speechForm" action="save.php" method="post">
    <textarea id="output" name="soundtext" rows="5" cols="50"></textarea>
    <button id="saveButton" disabled>حفظ البيانات</button>
  </form>
  <div class="button-container">
    <button id="recordButton">تسجيل</button>
    <button id="stopButton">إيقاف</button>
  </div>

  <script>
    // استدعاء الكود الخاص بتسجيل الصوت وتحويله إلى نص
    recordAndConvertSpeech();
  </script>

  <div class="container mt-3">
    <?php
    if(isset($_GET['s'])){
        if($_GET['s']==1){
            echo "<div class='alert alert-success text-center'><h3 class='text-center'>تم حفظ البيانات</h3></div>";
            header("refresh:5; url=index.php");
        } else {
            echo "<div class='alert alert-danger text-center'><h3 class='text-center'>لم يتم حفظ البيانات</h3></div>";
            header("refresh:2; url=index.php");
        }
    }
    ?>
  </div>
</body>
</html>
