<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class MediciViewMedico extends JView
{
	function display( $tpl = null )
	{
		$medico =& $this->get( 'Medico' );
		$isNew = ( $medico->cf_id < 1 );
		$text = ($isNew) ? JText::_( 'New' ) : JText::_( 'Edit' );
		
		JToolBarHelper::title( JText::_('Medico') . ':<small>[ ' . $text . ' ]</small>');
		JToolBarHelper::save();
		JToolBarHelper::cancel();
		
		$struttura = array (
			0 => array( 'value' => 'non definito', 'text' => 'Seleziona qui' ),
			1 => array( 'value' => 'Ambulatorio', 'text' => 'Ambulatorio' ),
			2 => array( 'value' => 'Azienda ospedaliera', 'text' => 'Azienda ospedaliera' ),
			3 => array( 'value' => 'Casa di cura', 'text' => 'Casa di cura' ),
			4 => array( 'value' => 'Casa di riposo', 'text' => 'Casa di riposo' ),
			5 => array( 'value' => 'Clinica privata', 'text' => 'Clinica privata' ),
			6 => array( 'value' => 'IRCCS', 'text' => 'IRCCS' ),
			7 => array( 'value' => 'Presidio ospedaliero', 'text' => 'Presidio ospedaliero' ),
			8 => array( 'value' => 'Università', 'text' => 'Università' ),
			9 => array( 'value' => 'Altro', 'text' => 'Altro' )
		);
		
		$strutturaSelect = JHTML::_('select.genericList', $struttura, 'struttura', 'class="inputbox"', 'value',
'text', $medico->struttura_lavorativa );

		$this->assignRef( 'struttura', $strutturaSelect );
		$this->assignRef( 'medico', $medico );
		parent::display( $tpl );
		
	}
}

?>