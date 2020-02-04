<?php
      include 'config.php';

class BookShare{
        private $host=HOST;
        private $user=USER;
        private $pass=PASS;
        private $db=DB;
        private $connection;
        public function __construct(){
        	session_start();
          $info=new mysqli($this->host,$this->user,$this->pass,$this->db);
        	$this->connection=$info;

        }
        public function userRegistration($name,$ce,$pass,$sel,$ses,$roll,$uimg,$timg){
               $this->connection->query("INSERT INTO user(name,dept,session,roll,cell,pass,img) VALUES('$name','$sel','$ses','$roll','$ce','$pass','$uimg')");
               move_uploaded_file($timg,'profile/'.$uimg);
               return"<p>ok</p>";

        }
        public function userLogin($uname,$upass)
        {
          $data=$this->connection->query("SELECT * FROM user WHERE cell='$uname' AND pass='$upass' ");
          $row=$data->num_rows;

         if ($row==1){
          while ($add=$data->fetch_assoc()) {
          $_SESSION['user_name']=$add['name'];
          $_SESSION['user_img']=$add['img'];  
          $_SESSION['user_dept']=$add['dept'];  
          $_SESSION['user_ses']=$add['session'];  
          $_SESSION['user_roll']=$add['roll'];  
          $_SESSION['user_cell']=$add['cell'];  
          }
             header("location:pages/homepage.php");
         }else{
          return "<h1 style='color:red;text-align:center;'>wrong</h1>";
         }

        }
        public function userPost($post_content,$uimg,$post_author,$post_author_img,$post_time,$post_imgt,$post_author_dept,$post_author_ses,$post_author_roll,$post_author_cell,$book_name,$author_name,$publisher,$publish_year,$subject){
           $this->connection->query("INSERT INTO posts (post_author,post_author_img,post_date,post_content, post_img,post_author_dept,post_author_ses,post_author_roll,post_author_cell,bookname,authorname,publisher,publishyear,subject) VALUES('$post_author','$post_author_img','$post_time','$post_content','$uimg','$post_author_dept','$post_author_ses','$post_author_roll','$post_author_cell','$book_name','$author_name','$publisher','$publish_year','$subject')");
           move_uploaded_file($post_imgt,'images/'.$uimg);
              
        }
        public function recPost(){
          $data=$this->connection->query("SELECT * FROM posts ORDER BY post_id DESC ");
            return $data;
        }
        public function bookPost($book_pro){
          $data=$this->connection->query("SELECT * FROM posts WHERE bookname='$book_pro' ");
            return $data;
        }
        public function recPosts($post_pro){
               
             $data=$this->connection->query("SELECT * FROM posts WHERE post_author='$post_pro' ");
            return $data;
        }
        public function newComment($comment_author,$comment_author_img,$comment,$post_id){
                $data=$this->connection->query("INSERT INTO comments (comment_author,comment_author_img,comment_content, post_id) VALUES('$comment_author','$comment_author_img','$comment','$post_id')");
           
        }
        public function showComment($post_show){
           $data=$this->connection->query("SELECT * FROM comments WHERE post_id='$post_show' ");
            return $data;
        }
         public function newBook($comment_author,$comment_author_img,$comment,$post_id){
                $data=$this->connection->query("INSERT INTO booklist (book_author,book_author_img,book_content, post_id) VALUES('$comment_author','$comment_author_img','$comment','$post_id')");
           
        }
         public function newReview($review_content,$review_author,$review_author_img,$book_name){
                $data=$this->connection->query("INSERT INTO reviewlist (content,author,img,bookname) VALUES('$review_content','$review_author','$review_author_img','$book_name')");
           
        }
         public function showReview($book_pro){
           $data=$this->connection->query("SELECT * FROM reviewlist WHERE bookname='$book_pro' ");
            return $data;
        }

         public function showBook($book_show){
           $data=$this->connection->query("SELECT * FROM booklist WHERE post_id='$book_show' ");
            return $data;
        }
        public function showBooked($book_show){
           $data=$this->connection->query("SELECT * FROM booklist WHERE post_id='$book_show' ");
            $rowd=$data->num_rows;
            return $rowd;
        }
        public function search($bname,$dept){
           $data=$this->connection->query("SELECT * FROM posts WHERE post_content='$bname' OR post_author_dept='$dept' ");
            return $data;
        }      
}
?>