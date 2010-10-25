<?php defined('_JEXEC') or die('Restricted access'); 
global $option;
$medico = $this->medico;
?>

<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Details' ); ?></legend>

		<table class="admintable">
		<tr>
			<td width="100" align="right" class="key">
				<label for="nome_utente">
					<?php $userName = JText::_( 'Nome Utente' ); 
					jimport('joomla.filter.output');
					$link = JFilterOutput::ampReplace( 'index.php?option=' . com_users . '&task=edit&cid[]='. $medico->cf_user_id );
					echo '<a href="' . $link . '">' . $userName . '</a>';
					?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="nome_utente" id="nome_utente" size="32" maxlength="250" value="<?php echo $medico->nome_utente;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="email">
					<?php echo JText::_( 'E-Mail' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="email" id="email" size="40" maxlength="250" value="<?php echo $medico->email;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="nome">
					<?php echo JText::_( 'Nome' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="nome" id="nome" size="32" maxlength="250" value="<?php echo $medico->nome;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="cognome">
					<?php echo JText::_( 'Cognome' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="cognome" id="cognome" size="32" maxlength="250" value="<?php echo $medico->cognome;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="data_nascita">
					<?php echo JText::_( 'Data di nascita' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="data_nascita" id="data_nascita" size="32" maxlength="250" value="<?php echo $medico->data_nascita;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="tel">
					<?php echo JText::_( 'Tel.' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="tel" id="tel" size="32" maxlength="250" value="<?php echo $medico->tel;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="ordine_prov">
					<?php echo JText::_( 'Provincia d\'iscrizione all\'ordine' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="ordine_prov" id="ordine_prov" size="32" maxlength="250" value="<?php echo $medico->ordine_prov;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="ordine_num">
					<?php echo JText::_( 'Numero d\'iscrizione all\'ordine' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="ordine_num" id="ordine_num" size="32" maxlength="250" value="<?php echo $medico->ordine_num;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="laurea_anno">
					<?php echo JText::_( 'Anno di laurea' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="laurea_anno" id="laurea_anno" size="32" maxlength="250" value="<?php echo $medico->laurea_anno;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="specializzazione">
					<?php echo JText::_( 'Specializzazione' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="specializzazione" id="specializzazione" size="32" maxlength="250" value="<?php echo $medico->specializzazione;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="struttura">
					<?php echo JText::_( 'Struttura' ); ?>:
				</label>
			</td>
			<td>
				<?php echo $this->struttura;?>
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="denominazione">
					<?php echo JText::_( 'Denominazione' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="denominazione" id="denominazione" size="32" maxlength="250" value="<?php echo $medico->denominazione;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="citta">
					<?php echo JText::_( 'Città' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="citta" id="citta" size="32" maxlength="250" value="<?php echo $medico->citta;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="indirizzo">
					<?php echo JText::_( 'Indirizzo' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="indirizzo" id="indirizzo" size="32" maxlength="250" value="<?php echo $medico->indirizzo;?>" />
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="recordtime">
					<?php echo JText::_( 'Data di registrazione' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="recordtime" id="recordtime" size="32" maxlength="250" value="<?php echo $medico->recordtime;?>" />
			</td>
		</tr>
	</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="<?php echo $option; ?>" />
<input type="hidden" name="cf_id" value="<?php echo $medico->cf_id; ?>" />
<input type="hidden" name="task" value="" />
</form>