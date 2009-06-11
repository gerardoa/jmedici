<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.model');

class MediciModelMedici extends JModel
{
	var $_medici;
	
	function _buildQuery() 
	{
		$tablename = "#__chronoforms_regMedico";
		$query = "SELECT * FROM " . $tablename;
		return $query;	
	}
	
	/**
	 * Retrieves the medici data
 	* @return array Array of objects containing the data from the database
 	*/
	function &getMedici()
	{
	    // Lets load the data if it doesn't already exist
	    if (empty( $this->_medici ))
	    {
	        $query = $this->_buildQuery();
	        $this->_medici = $this->_getList( $query );
	    }
	    return $this->_medici;
	}	
}
?>