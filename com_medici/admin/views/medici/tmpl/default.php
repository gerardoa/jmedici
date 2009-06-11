<?php defined('_JEXEC') or die('Restricted access'); 
$rows = $this->rows;
$option = $this->option;
?>
	  <form action="index.php" method="post" name="adminForm"> 
	  <table class="adminlist"> 
	    <thead> 
	      <tr> 
	        <th width="20"> 
	          <input type="checkbox" name="toggle" 
	               value="" onclick="checkAll(<?php echo 
	               count( $rows ); ?>);" /> 
	        </th> 
	        <th class="title">Nome Utente</th> 
	        <th>Nome</th> 
	        <th>Cognome</th>
	        <th>E-mail</th> 
	        <th>Data di nascita</th>
	        <th>N. Ordine</th>
	        <th>Prov. Ordine</th>   
	        <th>Specializzazione</th>       
	      </tr> 
	    </thead> 
	    <?php
	    $k = 0;
	    for ($i=0, $n=count( $rows ); $i < $n; $i++) 
	    {
			$row = &$rows[$i]; 
			$checked = JHTML::_('grid.id', $i, $row->cf_id );
			$link = JRoute::_( 'index.php?option=' . $option . '&task=edit&cid[]='. $row->cf_id );
	      ?> 
	      <tr class="<?php echo "row$k"; ?>"> 
	        <td> 
	          <?php echo $checked; ?> 
	        </td> 
	        <td>
			<a href="<?php echo $link; ?>"> 
	          <?php echo $row->nome_utente; ?></a>
	        </td> 
	        <td> 
	          <?php echo $row->nome; ?> 
	        </td>
	        <td> 
	          <?php echo $row->cognome; ?> 
	        </td>
	        <td> 
	          <?php echo $row->email; ?> 
	        </td>
	        <td> 
	          <?php echo $row->data_nascita; ?> 
	        </td>
	        <td> 
	          <?php echo $row->ordine_num; ?> 
	        </td>
	        <td> 
	          <?php echo $row->ordine_prov; ?> 
	        </td>
	        <td> 
	          <?php echo $row->specializzazione; ?> 
	        </td>		        
	      </tr> 
	      <?php 
	      $k = 1 - $k; 
	    } 
	    ?> 
	  </table> 
	  <input type="hidden" name="option" value="<?php echo $option;?>" /> 
	  <input type="hidden" name="task" value="" /> 
	  <input type="hidden" name="boxchecked" value="0" /> 
	  <?php echo JHTML::_( 'form.token' ); ?>
	  </form> 