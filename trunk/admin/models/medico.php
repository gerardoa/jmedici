<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.model');

class MediciModelMedico extends JModel
{
	var $_id;
	var $_medico;

	
	function __construct()
	{
		parent::__construct();
		$id = JRequest::getVar( 'cid', 0, 'default', 'array' ); 
		$this->setId( $id[0] );
		
	}
	
	function setId( $id )
	{
		$this->_id = $id;
		$this->_medico = null;
	}
	
	/**
	 * Retrieves the medici data
 	* @return array Array of objects containing the data from the database
 	*/
	function &getMedico()
	{
	    // Lets load the data if it doesn't already exist
	    if (empty( $this->_medico ))
	    {
	    	$tablename = "#__chronoforms_regMedico";
	        $query = "SELECT * FROM " . $tablename . " WHERE cf_id = " . $this->_id; 
	        $this->_db->setQuery( $query );
			$this->_medico = $this->_db->loadObject();
	    }
	    if (!$this->_medico)
	    {
	    	//$this->_medico = new stdClass();
	    	//$this->_medico->cd_id = 0;
	    	$this->_medico =& $this->getTable();
	    	$this->_medico->bind(JRequest::get('post'));
	    }
	    return $this->_medico;
	}

	function store()
	{
		$row =& $this->getTable();
		
		if ( !$row->bind(JRequest::get('post')) )
		{
			return false;
		}
		
		if ( !$row->check() )
		{
			$this->setError( $row->getError() );
			return false;
		}
		
		if ( !$row->store() )
		{
			return false;
		}
		
		return true;
	}
	
	function delete()
	{
		$row =& $this->getTable();
		$cids = JRequest::getVar('cid', array(0), 'default', 'array');
		foreach ($cids as $cid) {
			if ( !$row->delete($cid) )
			{
				$this->setError( $row->getErrorMsg() );
				return false;
			}
		}
		return true;
	}
}
?>