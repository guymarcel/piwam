<?php
/**
 * depense actions.
 *
 * @package    piwam
 * @subpackage depense
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class depenseActions extends sfActions
{
  /**
   * Export the list of Depense within a file
   *
   * @param 	sfWebRequest	$request
   * @since	r39
   */
  public function executeExport(sfWebRequest $request)
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers('Number');
    $csv = new FileExporter('liste-depenses.csv');
    $depenses = DepensePeer::doSelectForAssociation($this->getUser()->getAssociationId());

    echo $csv->addLineCSV(array(
			'Libellé',
			'Montant (euros)',
			'Compte',
			'Activité',
			'Date',
    ));

    foreach ($depenses as $depense)
    {
      echo $csv->addLineCSV(array(
                $depense->getLibelle(),
                format_currency($depense->getMontant()),
                $depense->getCompte(),
                $depense->getActivite(),
                $depense->getDate(),
      ));
    }
    $csv->exportContentAsFile();
  }

  /**
   * List Depenses of current association
   *
   * @param 	sfWebRequest     $request
   */
  public function executeIndex(sfWebRequest $request)
  {
    $id   = $this->getUser()->getAssociationId();
    $page = $request->getParameter('page', 1);

    $this->expensesPager = ExpenseTable::getPagerForAssociation($id, $page);
  }

  /**
   * View details of a particular Depense
   *
   * @param 	sfWebRequest     $request
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->depense = ExpenseTable::getById($request->getParameter('id'));

    if ($this->depense->getAssociationId() == $this->getUser()->getAssociationId())
    {
      $this->forward404Unless($this->depense);
    }
    else
    {
      $this->redirect('@error_credentials');
    }
  }

  /**
   * Display the form to register a new entry
   *
   * @param   sfWebRequest    $request
   */
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ExpenseForm();
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());

  }

  /**
   * Perform creation
   *
   * @param   sfWebRequest    $request
   */
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new ExpenseForm();
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  /**
   * Display edit form
   *
   * @param   sfWebRequest    $request
   */
  public function executeEdit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->forward404Unless($depense = ExpenseTable::getById($id));

    if ($depense->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $this->form = new ExpenseForm($depense);
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
  }

  /**
   * Perfoms update.
   *
   * @param   sfWebRequest    $request
   */
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $id = $request->getParameter('id');
    $this->forward404Unless($depense = ExpenseTable::getById($id));
    $this->form = new ExpenseForm($depense);
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  /**
   * Delete an existing Depense if user has required credentials
   *
   * @param  sfWebRequest $request
   */
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $id = $request->getParameter('id');
    $this->forward404Unless($depense = ExpenseTable::getById($id));
    $depense->delete();
    $this->redirect('@expenses_list');

    if ($depense->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }
  }

  /**
   * Process the values given by the form. Redirects to index if success
   *
   * @param   sfWebRequest    $request
   * @param   sfForm          $form
   */
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $depense = $form->save();
      $this->redirect('@expenses_list');
    }
  }
}
