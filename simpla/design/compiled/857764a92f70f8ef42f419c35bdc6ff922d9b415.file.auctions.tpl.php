<?php /* Smarty version Smarty-3.1.18, created on 2016-11-02 01:55:02
         compiled from "simpla/design/html/auctions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2107577758581135f3ba1344-03458085%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '857764a92f70f8ef42f419c35bdc6ff922d9b415' => 
    array (
      0 => 'simpla/design/html/auctions.tpl',
      1 => 1478040896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2107577758581135f3ba1344-03458085',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_581135f3c37d73_49190109',
  'variables' => 
  array (
    'auctions' => 0,
    'message_error' => 0,
    'auction' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_581135f3c37d73_49190109')) {function content_581135f3c37d73_49190109($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li class="active"><a href="index.php?module=AuctionsAdmin">Аукционы</a></li>
	<li><a href="index.php?module=LotsAdmin&current_auction=<?php echo $_smarty_tpl->tpl_vars['auctions']->value[0]->id;?>
">Лоты</a></li>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>


<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Аукционы', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>


<div id="header">
	<h1>Аукционы</h1> 
	<a class="add" href="index.php?module=AuctionAdmin">Добавить аукцион</a>
</div>	

<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
<!-- Системное сообщение -->
<div class="message message_error">
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_error']->value=='bets_exists') {?>Данный аукцион был активен, удалять его нельзя
		<?php  } else { if (!isset($_smarty_tpl->tpl_vars['message_error'])) $_smarty_tpl->tpl_vars['message_error'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['message_error']->value = "lots_exists") {?>К данному аукциону привязаны лоты, если хотите удалить, сначала удалите лоты. А вот так просто взять и, ни с того ни с чего, удалить, так нельзя!
		<?php } else { ?>
		<?php echo $_smarty_tpl->tpl_vars['message_error']->value;?>
<?php }}?></span>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">

<?php if ($_smarty_tpl->tpl_vars['auctions']->value) {?>
<div id="main_list">
	
	
	<form id="form_list" method="post">

		<div id="list">	
			<div class=" row" style="font-weight:bold">

				<div class="order_name cell" style="width:110px; padding-left:20px">
										
					№ аукциона	 				
	 				 	 			
				</div>
				<div class="order_date cell">				 	
	 				дата начала
				</div>
				<div class="order_date cell">				 	
	 				рассчётная дата закрытия
				</div>					
				<div class="order_date cell">				 	
	 				длительность лота
				</div>												
				<div class="name cell" style="white-space:nowrap;">
	 				закрытие первого лота
				</div>



				<div class="clear"></div>
			</div>	

			<?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['auctions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value) {
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
			<div class=" row">

				<div class="order_name cell" style="width:110px; padding-left:20px">
										
					<a href="index.php?module=AuctionAdmin&id=<?php echo $_smarty_tpl->tpl_vars['auction']->value->id;?>
">Аукцион № <?php echo $_smarty_tpl->tpl_vars['auction']->value->id;?>
</a>
	 				 	 			
				</div>
				<div class="order_date cell">				 	
	 				<?php echo $_smarty_tpl->tpl_vars['auction']->value->date_start;?>
 
				</div>
	
				<div class="order_date cell">				 	
	 				<?php echo $_smarty_tpl->tpl_vars['auction']->value->date_closing;?>
 
				</div>				
				<div class="order_date cell">				 	
	 				<?php echo $_smarty_tpl->tpl_vars['auction']->value->duration;?>
 
				</div>												

				<div class="icons cell">	
					<?php if ($_smarty_tpl->tpl_vars['auction']->value->sum==0) {?>				
					<a class="delete" data-id="<?php echo $_smarty_tpl->tpl_vars['auction']->value->id;?>
" title="Удалить" href="#"></a>
					<?php }?>
				</div>	
				<div class="icons cell">
					
					<?php echo $_smarty_tpl->tpl_vars['auction']->value->date_end;?>
 
				</div>							
				<div class="clear"></div>
			</div>		
			<?php } ?>
		</div>
	</form>
</div>

<?php } else { ?>

Нет аукцион

<?php }?>


<script>
$(function() {

	$('a.delete').click(function() {
		if (confirm('Вы хотите удалить аукцион. Уверены?'))
		{
			window.location.href = 'index.php?module=AuctionsAdmin&action=delete&id='+$(this).attr('data-id');
		}
	});
 	
});
</script>

<?php }} ?>
