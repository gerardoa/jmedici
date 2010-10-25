<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
class TableMedico extends JTable
{
	var $cf_id = null;
	var $uid = null;
	var $recordtime = null;
	var $ipaddress = null;
	var $cf_user_id = null;
	var $nome_utente = null;
	var $email = null;
	var $nome = null;
	var $cognome = null;
	var $data_nascita = null;
	var $tel = null;
	var $ordine_prov = null;
	var $ordine_num = null;
	var $laurea_anno = null;
	var $specializzazione = null;
	var $denominazione = null;
	var $citta = null;
	var $indirizzo = null;
	var $struttura_lavorativa = null;
	

	function __construct(&$db)
	{
		parent::__construct( '#__chronoforms_regmedico', 'cf_id', $db );
	}

	function check()
	{
		function convertiData($dataEur){
			$rsl = explode ('/',$dataEur);
			$rsl = array_reverse($rsl);
			return implode($rsl,'-');
		}

		function checkUsers($nome_utente, $email) {
			$db =& JFactory::getDBO();
			$query = "SELECT * FROM #__users WHERE username = ".$db->Quote($nome_utente)." OR email = ".$db->Quote($email);
			$db->setQuery( $query );
			$rows = $db->loadRow();
			if ( $rows ) {
				return "<li>Attenzione: Nome utente o email già in uso, riprovare</li>";
			} else {
				return '';
			}
		}

		jimport('joomla.mail.helper');


		if ( ! preg_match("/^[a-z0-9\-\._]{3,25}$/i", $this->nome_utente) ) {
			$error .= "<li>Il nome utente deve essere di almeno 3 caratteri e massimo 25</li>";
		}


		if ( !JMailHelper::isEmailAddress( $this->email ) ) {
			$error .= "<li>Inserisci un'indirizzo e-mail valido</li>";
		}

		if ( ($pw=JRequest::getString('password')) != JRequest::getString('vpassword') ) {
			$error .= "<li>La password non coincide verifica di nuovo</li>";
		} else if ( (5 > strlen($pw)) || (strlen($pw) > 15) ) {
			$error .= "<li>La password deve essere di almeno 5 caratteri e massimo 15</li>";
		}

		if ( ! preg_match("/^[a-z][a-z ]{2,25}$/i", $this->nome) ) {
			$error .= "<li>Il nome deve essere di almeno 3 caratteri e massimo 25</li>";
		}
		if ( ! preg_match("/^[a-z][a-z ']{2,25}$/i", $this->cognome) ) {
			$error .= "<li>Il cognome deve essere di almeno 3 caratteri e massimo 25</li>";
		}

		if ( $this->data_nascita ) {
			if ( ! preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i", $this->data_nascita) ) {
				$error .= "<li>Il formato della data di nascita deve essere gg/mm/aaaa</li>";
			} else {
				$data_nascita_mysql = convertiData($this->data_nascita);
				$today = strtotime( date("Y-m-d") );
				if ( strtotime($data_nascita_mysql) < $today ) {
					$this->data_nascita = $data_nascita_mysql;
				} else {
					$error .= "<li>La data non è valida</li>";
				}
			}
		}

		if ( ! preg_match("/^[a-z]{2,20}$/i", $this->ordine_prov) ) {
			$error .= "<li>Provincia non valida</li>";
		}

		if ( $this->tel ) {
			if ( ! preg_match("/^[0-9][0-9\-]{2,20}$/i", $this->tel) ) {
				$error .= "<li>Il numero di tel inserito non è valido</li>";
			}
		}

		if ( !1 ) {
			$error .= "<li>Il numero dell'ordine all'albo non è valido</li>";
		}

		if ( ! preg_match("/^[0-9]{4}$/i", $this->laurea_anno) || $this->laurea_anno > date('Y') || $this->laurea_anno < 1901 ) {
			$error .= "<li>L'anno di laurea non è valido (es. valido: 2000)</li>";
		}

		if ( ! preg_match("/^[a-z][a-z ']{2,25}$/i", $this->specializzazione) ) {
			$error .= "<li>Specializzazione non valida</li>";
		}

		$error .= checkUsers($nome_utente, $email);
			
		if ( $error ) {
			$this->setError( $error );
			return false;
		} 
		
		return true;
	}
}
?>