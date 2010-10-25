<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class MediciViewMedici extends JView
{
	function display( $tpl = null )
	{
		global $option;
		
		JToolBarHelper::title( JText::_('Medici') );
		JToolBarHelper::addNew();
		JToolBarHelper::editList();
		JToolBarHelper::trash();

		$rows =& $this->get( 'Medici' );
		$this->assignRef( 'rows', $rows );
		$this->assignRef( 'option', $option );
		parent::display( $tpl );
		
	}
}
?>