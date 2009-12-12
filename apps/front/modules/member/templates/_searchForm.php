<?php
/**
 * Display a SearchUserForm instance
 */
?>

<?php use_javascript('/sfFormExtraPlugin/js/jquery.autocompleter.js') ?>
<?php use_stylesheet('/sfFormExtraPlugin/css/jquery.autocompleter.css') ?>

<form action="<?php echo url_for('@member_search'); ?>" method="post">
    Prénom / Nom :
    <?php echo $form->renderHiddenFields() ?>
    <?php echo $form['magic'] ?> <input type="submit" name="submit" value="rechercher" class="small blue button" />
</form>
