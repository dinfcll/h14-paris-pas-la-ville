<h1>Mon compte</h1>

<?php echo $this->Form->create('Parieur', array('class'=>'well')); ?>

<legend><?php echo __('Modifier mes informations'); ?></legend>


<?php echo $this->Form->input('pseudo', array('label'=>'Pseudo:', 'readonly' => 'readonly'));  ?>
<?php echo $this->Form->input('mot_passe', array('label'=>'Mot de passe:'));  ?>
<?php echo $this->Form->input('courriel', array('label'=>'Adresse courriel:'));  ?>
<label><?php echo __('Jetons:'); ?></label>
<div class="input text"><?php echo $this->Html->link('Acheter des jetons', array('controller' => 'parieurs', 'action' => 'acheter_jetons')); ?></div>
<br/>
<?php echo $this->Form->submit('Soumettre', array(
'class' => 'btn btn-primary'
)); ?>

<?php echo $this->Form->end(); ?>
