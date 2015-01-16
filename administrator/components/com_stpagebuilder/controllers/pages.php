<?php
/**
 * 
 * @copyright ShineTheme.com
 * @author  ShineTheme
 * @mail contact@shinetheme.com
 * @link  http://shinetheme.com
 * @license  License GNU General Public License version 2 or later
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
// Include the syndicate functions only once



jimport('joomla.application.component.controlleradmin');

class StpagebuilderControllerPages extends JControllerAdmin
{
	public function __construct($config = array())
	{
		parent::__construct($config);
	}

	public function getModel($name = 'pages', $prefix = 'StpagebuilderModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}


	public function edit(){
		$ids    = $this->input->get('cid', array(), 'array');
		$this->setRedirect(JRoute::_('index.php?option=com_stpagebuilder&view=page&id='.$ids[0], false));
		return false;
	}

	// public function delete(){
	// 	$model = $this->getModel();
	// 	$model->delete();
		
	// }
}
