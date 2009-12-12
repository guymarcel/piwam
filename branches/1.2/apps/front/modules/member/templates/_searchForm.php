<?php
/**
 * Display a SearchUserForm instance
 */
?>

<?php use_javascript('/sfFormExtraPlugin/js/jquery.autocompleter.js') ?>
<?php use_stylesheet('/sfFormExtraPlugin/css/jquery.autocompleter.css') ?>

<form action="<?php echo url_for('@member_search'); ?>" method="post">
  <?php echo $form['due_state']->renderLabel() ?>
  <?php echo $form['due_state']->render() ?>

  <?php echo $form['by_page']->renderLabel() ?>
  <?php echo $form['by_page']->render() ?>

  Prénom / Nom :
  <?php echo $form->renderHiddenFields() ?>
  <?php echo $form['magic'] ?> <input type="submit" name="submit" value="rechercher" class="small blue button" />
</form>
