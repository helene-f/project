<?php
session_start();

if (empty($_SESSION['id']))
{
		header("Location:/view/frontOffice/login.php");
}
include ('header.php');

$action = '';
if(isset($_GET['id']) && $_GET['id'] > 0) {
	$action = '/admin.php?action=modifyPost&amp;id='.$post['id'];
	$value = 'Modifier';
} else {
	$action = '/admin.php?action=addPost';
	$value = 'Ajouter';
}
?>

<h2>Editer un chapitre</h2>

<div class="container">

	<?php if(isset($_GET['message']))
	{
		$message = $_GET['message']; ?>
		<div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
			<?php echo $message; ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php
	}
	?>

	<form class="addPost" action="<?php echo $action; ?>" method="post">

	<div class="form-group">
		<label for="title">Titre du chapitre : </label>
		<input id="title" type="text" placeholder=" Titre du chapitre" name="chapterTitle" value="<?php if(isset($post['title'])) {echo htmlspecialchars($post['title']);} ?>"/>
	</div>

	<div class="form-group">
		<label for="article">Votre article : </label>
		<textarea class="tinymce" id="article" type="text" placeholder="votre article" name="chapterContent"><?php if(isset($post['content'])) {echo htmlspecialchars($post['content']);} ?></textarea>
	</div>

	<input type="submit" class="btn btn-primary" value="<?php echo $value; ?>"/>

</form>
</div>

<script src="/public/js/plugin/tinymce/tinymce.min.js"></script>
<script> tinymce.init({
	selector: 'textarea.tinymce',
	height: 500,
	menubar: false,
	plugins: [
		'advlist autolink lists link image charmap print preview anchor textcolor',
		'searchreplace visualblocks fullscreen',
		'insertdatetime media table contextmenu paste help wordcount'
	],
	toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
	content_css: [
		'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i'],
		cleanup: true
	});
</script>

	<!-- Bootstrap core JavaScript -->
	<script src="/public/js/jquery/jquery.min.js"></script>
	<script src="/public/js/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Custom scripts for this template -->
	<script src="/public/js/clean-blog.min.js"></script>
	<script src="/public/js/search-button.js"></script>


</body>
</html>

</body>
</html>
