<?php
  include ('./includes/newclass.inc.php');




  $student1 = new Student(1, '23-2583', 'Mark Ian', 'Bustillo', 'bustillo.markian.bueanvista@gmail.com');

  $teacher1 = new Teacher(2, '23-2999', 'Abdul', 'Jabol','abduljabolskiiez69@gmail.com');

  echo $student1->get_student_full_info ();
  echo '<br>';
  echo $teacher1->get_teacher_full_info();

  include_once ('./connection/connection.php');
  $conn = connect();

  $sql = "SELECT * FROM student_list ORDER BY RAND()";
  $students = $conn->query($sql) or die ($conn->error);
  $row = $students->fetch_assoc();
  $i = 1;

  do {
    echo '<br>'.$i.'. '.$row['first_name'].' '.$row['last_name'];
    $i++;
  } while ($row = $students->fetch_assoc());
?>