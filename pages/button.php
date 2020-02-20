
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/jquery-3.3.1.min.js"></script>
				<form id="bookform" action="bookdatail.php?postar=<?php echo $book_show;?>" method="POST">
				<input type="hidden" name="npo" value="<?php echo $book_show; ?>">
				<button style="background-color:#d35400" type="submit" name="pub" class="btn btn-block">book </button>
			    </form>
