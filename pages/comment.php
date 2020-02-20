<div class="post-comments">
<?php
$post_show=$row['post_id'];
$sh=$boi->showComment($post_show);
while($aa=$sh->fetch_assoc()):
?>                    
                    <div class="card h-25">
					<div class="book bg-light">					
					<img id="im" src="../profile/<?php echo $aa['comment_author_img']; ?>" alt="">
					<a href="#" class="text-primary"><?php echo $aa['comment_author']; ?></a>
					<span ><?php echo $aa['comment_content']; ?></span>
			 		</div>
					</div>
<?php endwhile;?>
<?php
$non='comm'.$i;
if (isset($_POST[$non])){
$comment=$_POST[$non];
$comment_author=$_SESSION['user_name'];
$comment_author_img=$_SESSION['user_img'];
$post_id=$row['post_id'];
$boi->newComment($comment_author,$comment_author_img,$comment,$post_id);
}
?>                
					<div class="card h-25">
					<div class="book bg-light">
					<img id="im" class="float-left mr-5" src="../profile/<?php echo $_SESSION['user_img']; ?>" alt="">
					<form id="cform" action="" method="POST">
					<input class="form-control w-75 mt-2" placeholder="Add a comment" name="comm<?php  echo $i;$i++;?>" type="text">
					</form>
					</div>						
					</div>
					</div>