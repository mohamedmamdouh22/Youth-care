<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ادارة رعاية الشباب بكلية شبرا جامعة بنها</title>
    <link rel="stylesheet" href="adminstyle.css" />
  </head>
  <style></style>
  <body>
    <div class="top">
      <img src="شعار_جامعة_بنها.png" />
      <h1>ادارة رعاية الشباب</h1>
    </div>
    <div class="lista">
      <ul>
        <li><a class="active" href="#">الاخبار</a></li>
        <?php
          session_start();
          if ($_SESSION['isadmin'] === true) 
          {
            echo '<li><a href="add">إضافة خبر</a></li>';
            echo '<li><a href="../Solidarity Request Page/Solidarity_Request_Page.html">طلبات التكافل</a></li>';
          }
          session_destroy();
        ?>
        <li class="log"><a href="../login-page/index.html">تسجيل الدخول</a></li>
      </ul>
    </div>
    <div id="content">
      <div class="news">
        <h1>أحدث الأخبار</h1>
      </div>
      <?php
        include "../php_soliders/dbconfig.php";
        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
        $news = $pdo->query("SELECT * FROM news ORDER BY pubdate DESC", PDO::FETCH_ASSOC);
        while($new = $news->fetch())
        {
          echo '<div id="gallery">';
            echo "<div>";
              echo '<img src="شعار_جامعة_بنها.png" alt="new1" />';
            echo "</div>";
            echo '<div id="desc">';
              echo "<h2>" . $new["title"] . "</h2>";
              $pub_date = date_create($new["pubdate"]);
              echo "<h5>" . date_format($pub_date, "Y") . " - " . $months[date_format($pub_date, "M")] . " - " . date_format($pub_date, "d") . "</h5>";
              echo "<p>" . $new['content'] . "</p>";
            echo '</div>';
          echo '</div>';
        }
      ?>
    </div>
  </body>
</html>
