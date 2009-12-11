<?php
/**
 * Debt form. We will discover how to use an existing form, and how to
 * extend it.
 *
 * This about commenting your code and your files ;-)
 *
 * @package    pwSandboxPlugin
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    1.2
 */
class DebtForm extends PluginDebtForm
{
  /**
   * This is the generic method to set up forms in symfony
   * It will be called automatically when creating a new DebForm()
   */
  public function configure()
  {
    /*
     * You will see that we will need the association ID of the current
     * user. As you saw in actions.class.php, we gave the ID as parameter
     * to this form ; so, let's save it in $id variable !
     */
    if (! $id = $this->getOption('associationId'))
    {
      throw new InvalidArgumentException('You must provide an ID');
    }

    /*
     * We can specify explicitely which fields we want to use.
     * That also defines the order fields will appear.
     *
     * If useFields() is not called, all fields will be used
     * by default, as described in you schema.yml
     */
    $this->useFields(array('member_id', 'income_id'));

    /*
     * Now, we want to include the existing Income form. There are
     * two different ways : we can merge the forms together or embed
     * an existing form into this DebtForm.
     * Here we are going to embed the Income form.
     *
     * First, create and Income object to bind it with
     */
    $income = new Income();
    $income = $this->getObject()->getIncome();

    /*
     * And then, we create our Income form, and embed it within this
     * Debt form. The $income object previously created is given to the
     * form to bind the values
     */
    $this->embedForm('income_id', new IncomeForm($income));

    /*
     * Last step, we want to uncheck the checkbox `received` that is
     * defined in the Income form.
     */
    $this->getEmbeddedForm('income_id')->setDefault('received', false);


    /*
     * But if we wanted to merge the IncomeForm instead of embeding
     * two forms, we would write :
     *
     *    $this->mergeForm(new IncomeForm());
     *    $this->setDefault('received', false);
     *
     * The last line uncheck the 'received' checkbox
     */

    /*
     * Hop ! Don't move on, it's not over ! Currently, the list of members
     * displays ALL the members. But if Piwam is managing several associations
     * at the same time, we want to display members who belong only to the
     * current user's association. The $id variable is finally useful !
     *
     * We will customize the default `member_id` field by giving a
     * Doctrine_Query object. We use a method already implemented in the
     * Piwam's core :
     */
    $this->widgetSchema['member_id']->setOption('query', MemberTable::getQueryEnabledForAssociation($id));

    /*
     * Finally, this is preferable to set labels of each field (at least
     * to display it in French ;-)
     *
     * You just have to set labels of your own fields, since fields
     * of IncomeForm have been directly set in IncomeForm class.
     */
    $this->widgetSchema->setLabels(array(
      // 'field'    => 'Displayed name',
      'member_id'   => 'Membre concerné',
      'income_id'   => 'Recette liée',
    ));
  }
}
