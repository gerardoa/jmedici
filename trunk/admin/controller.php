<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class MediciController extends JController
{
	function __construct()
	{
		parent::__construct();
		$this->registerTask( 'add', 'edit' );
	}
	
	function display()
	{
		parent::display();
	}
	
	function edit() 
	{
		JRequest::setVar( 'view', 'medico' );
		
		parent::display();
	}
	
	function save() 
	{
		$model = $this->getModel( 'medico' );
		if ( $model->store() )
		{
			$msg = JText::_( 'Medico salvato' );
		    $link = 'index.php?option=com_medici';
		    $this->setRedirect($link);
		} 
		else 
		{
			$msg = JText::_( 'Salvataggio fallito<p><ol>' . $model->getError() . '</ol></p>' );
			JError::raiseWarning( 'DATI INVALIDI', $msg );
			$this->edit();
		}		
	}
	
	function remove()
	{
		$model = $this->getModel( 'medico' );
		if ( $model->delete() )
		{
			$msg = JText::_( 'Medico eliminao(i)' );
		}
		else 
		{
		}
		$link = 'index.php?option=com_medici';
		$this->setRedirect($link, $msg);
	}
}
?>