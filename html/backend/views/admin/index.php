<?php//  Yii::app()->translate->editLink('Translate'); ?>
<?php $this->pageTitle=Yii::app()->name; ?>


<b>Main page of the site administration system  <i><?php echo CHtml::encode(Yii::app()->name); ?></i></b>
<br>

<p>1. Get started by adding page trees.</p>
<p>Each page tree is a group of menu items that is displayed in the corresponding area of the site.</p>
<p>2. Right-click on the tree name in the left part of the admin panel.</p>
<p>3. Create a page. The page can be of two types.. <br>
    а) plug-in with its functionality. <br>
    b) HTML Builder Pages "Text Editor". The "text editor" allows you to create static pages that will later be displayed on the site when you select the appropriate menu item.
</p>
<p>4. In the left part of the admin panel, select the name of the created page. If a form appears when creating the page, the text editor will appear
     in which create the page design, if the module was chosen - the transition to the module functionality.
</p>
<p>5. Editing and deleting pages is done by clicking the appropriate icons after the page title.</p>
<p>6. Pages can be formed as a nested structure. To do this, before the page name in the left part of the admin panel, click the "edit" icon
</p>
<p>7. To delete the tree of pages, you must first remove the page, from the last level to the initial level. The last step is to remove the initial level.
</p>

