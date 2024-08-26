<?php

  

  class Student {
    private $id;
    private $studentNumber;
    private $fname;
    private $lname;
    private $email;

    public function __construct($id, $studentNumber, $fname, $lname, $email)
    {
      $this->id = $id;
      $this->studentNumber = $studentNumber;
      $this->fname = $fname;
      $this->lname = $lname;
      $this->email = $email;
    }

    public function get_student_full_info () {
      return 'The student\'s name is '.$this->fname. ' '.$this->lname. ', with an ID of '.$this->id.' and a student number of '.$this->studentNumber.'. Student\'s email is '.$this->email;;
    }

    public function get_id () {
      return $this->id;
    }
    public function get_studentNumber () {
      return $this->studentNumber;
    }
    public function get_fname () {
      return $this->fname;
    }
    public function get_lname () {
      return $this->lname;
    }
    public function get_email () {
      return $this->email;
    }
  }

  class Teacher extends Student {
    private $id;
    private $teacherNumber;
    private $fname;
    private $lname;
    private $email;

    public function __construct($id, $teacherNumber, $fname, $lname, $email)
    {
      $this->id = $id;
      $this->teacherNumber = $teacherNumber;
      $this->fname = $fname;
      $this->lname = $lname;
      $this->email = $email;
    }

    public function get_teacherNumber () {
      return $this->teacherNumber;
    }

    public function get_teacher_full_info () {
      return 'The teacher\'s name is '.$this->fname. ' '.$this->lname. ', with an ID of '.$this->id.' and a teacher number of '.$this->teacherNumber.'. Teacher\'s email is '.$this->email;;
    }
  }
?>