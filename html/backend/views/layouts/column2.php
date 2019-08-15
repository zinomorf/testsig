<?php $this->beginContent('//layouts/main'); ?>

	<div id="header">
		<div id="logo"><?= Yii::t('app', 'The admin panel of the site ');  ?><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- #header-->

			<div id="mainmenu">
			    <div style="text-align: center;">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Modules', 'url'=>array('/admin/index')),
						array('label'=>'Page trees', 'url'=>array('/admin/addtree')),
						//array('label'=>'Виджеты', 'url'=>array('/admin/contact')),
						array('label'=>'Login', 'url'=>array('/admin/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Unlogin ('.Yii::app()->user->name.')', 'url'=>array('/admin/logout'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Main', 'url'=>array('/index.php?r=site/index')),
						//array('label'=>'Внутриние страницы', 'url'=>array('backend.php?r=site/backend'))					    
					    ),
				)); ?>
			    </div>
			</div><!-- mainmenu -->
				

		<div id="container">
			<div  id="sideLeft">
	


			    
<?php //foreach($this->leftmenu as $i=>$this->leftmenu): ?>	
			    
	<?php //echo $this->leftmenu->name_tree; ?>
			    
   <?php //endforeach; ?> 			    
			   
			    
				<?php if(isset($this->breadcrumbs)):?>
					<?php $this->widget('CLeftMenu'); ?><!-- breadcrumbs -->
				<?php endif?>

					

			    
			    
			</div><!-- .sidebar#sideLeft -->		    

			<div  id="content">
			    
				<?php if(isset($this->breadcrumbs)):?>
					<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
					)); ?><!-- breadcrumbs -->
				<?php endif?>

				<?php echo $content; ?>
			</div><!-- #content-->
		</div><!-- #container-->


	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Vakoms..<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- #footer -->
	
	







<?php $this->endContent(); ?>