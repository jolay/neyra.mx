<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_stpagebuilder
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


class StpagebuilderViewPage extends JViewLegacy
{
	protected $form;

	protected $item;

	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$doc = JFactory::getDocument();
		
		if($this->getLayout()=='edit'){

			//JFactory::getApplication()->input->set('hidemainmenu', true);
			$this->id=JRequest::getVar('id',0);
			$this->form = $this->get('Form');

			$model=$this->getModel();
			// Add Style And JS
			$this->url = JURI::root().'administrator/components/com_stpagebuilder/assets/';
			$doc->addStyleSheet($this->url.'css/jquery-ui.css');
			$doc->addStyleSheet($this->url.'css/style.css');
			
			//Get Data
			$this->item = $model->getItemcode();
			$this->listModule = $model->getListModule();
			$this->configpage = $model->getConfigPage($this->id);
			if($this->configpage==null){
				$this->configpage = json_decode('{"id":"","class":"","fullwidth":"1"}');
			}else{
				$this->configpage = json_decode($this->configpage);
			}
			// Get Design
			$this->design = $model->getDesign($this->id);
			//$this->images = $model->getImageFolder('images/content');
			
			$this->name="";
			$this->name= $model->getPageName($this->id);
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since   1.6
	 */
	protected function addToolbar()
	{
		JToolbarHelper::title(JText::_('COM_STPAGEBUILDER'));
		JToolbarHelper::apply('page.stsave');
		JToolbarHelper::cancel('page.cancel');
	}
}
