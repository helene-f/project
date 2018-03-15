<html>
  <head>
    <title>Editer un chapitre</title>
    <meta charset="utf-8">

  </head>
  <body>
    <h2>Editer un chapitre</h2>
    <br /><br />
    <form class="edit" action="index.php?action=addContent&amp;id=<?= $post['id'] ?>" method="post">
      <label for="url">Lien de votre image : </label>
      <input id="url" type="text" placeholder="votre url" name="url" value="<?php if(isset($admin)) {echo $admin;} ?>" />
      <input type="submit" value="Ajouter" name="formEdit"></input>
      <br />
      <label for="title">Titre du chapitre : </label>
      <input id="title" type="text" placeholder="Titre du chapitre" name="title" value="<?php if(isset($admin)) {echo $admin;} ?>" />
      <br />
      <label for="texte">Votre article : </label>
      <textarea class="tinymce" id="article" type="text" placeholder="votre article" name="article"></textarea>
      <br />
      <input type="submit" value="Publier" name="formEdit"></input>
    </form>
        <?php
        if(isset($error))
        {
          echo $error;
        }
         ?>
         <script src="../../public/js/plugin/tinymce/tinymce.min.js"></script>
       <script>tinymce.init({ selector:'textarea', height: 500,
  theme: 'modern',
  plugins: 'preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
  ]
 });</script>
  </body>
</html>
