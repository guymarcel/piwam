<?php

/**
 * depense actions.
 *
 * @package    piwam
 * @subpackage depense
 * @author     Your name here
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
		$depenses = DepensePeer::doSelectForAssociation($this->getUser()->getAttribute('association_id', null, 'user'));

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


	public function executeIndex(sfWebRequest $request)
	{
		$this->depense_list = DepensePeer::doSelectForAssociation($this->getUser()->getAttribute('association_id', null, 'user'));
	}

	public function executeShow(sfWebRequest $request)
	{
		$this->depense = DepensePeer::retrieveByPk($request->getParameter('id'));
		
		if ($this->depense->getAssociationId() == $this->getUser()->getAttribute('association_id', null, 'user')) {
    		$this->forward404Unless($this->depense);
		}
		else {
		    $this->forward('association', 'credentials');
		}
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new DepenseForm();
		$this->form->setDefault('mis_a_jour_par', $this->getUser()->getAttribute('user_id', null, 'user'));

	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod('post'));
		$this->form = new DepenseForm();
		$this->form->setDefault('mis_a_jour_par', $this->getUser()->getAttribute('user_id', null, 'user'));
		$this->processForm($request, $this->form);
		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->forward404Unless($depense = DepensePeer::retrieveByPk($request->getParameter('id')), sprintf('Object depense does not exist (%s).', $request->getParameter('id')));
		$this->form = new DepenseForm($depense);
		$this->form->setDefault('mis_a_jour_par', $this->getUser()->getAttribute('user_id', null, 'user'));
	}

	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
		$this->forward404Unless($depense = DepensePeer::retrieveByPk($request->getParameter('id')), sprintf('Object depense does not exist (%s).', $request->getParameter('id')));
		$this->form = new DepenseForm($depense);
		$this->form->setDefault('mis_a_jour_par', $this->getUser()->getAttribute('user_id', null, 'user'));
		$this->processForm($request, $this->form);
		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{
		$request->checkCSRFProtection();
		$this->forward404Unless($depense = DepensePeer::retrieveByPk($request->getParameter('id')), sprintf('Object depense does not exist (%s).', $request->getParameter('id')));
		$depense->delete();
		$this->redirect('depense/index');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$depense = $form->save();
			$this->redirect('depense/index');
		}
	}
}
