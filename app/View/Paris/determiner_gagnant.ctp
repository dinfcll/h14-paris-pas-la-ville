    <h1><?php echo $paris['Pari']['nom']; ?>
    <small>Déterminez le choix gagnant.</small>
    </h1>

    <p>Lorsque vous aurez déterminé le choix gagnant du pari, tous ceux qui avaient misé correctement recevront leurs jetons. Il sera alors trop tard pour modifier le choix gagnant.</p>
<?php
    echo $this->Form->create('Pari', array(
        'inputDefaults' => array(
    'div' => 'form-group',
    'wrapInput' => false,
    'class' => 'form-control'
))); ?>
    <fieldset>
        <?php

        $attributes = array('legend' => false, 'separator' => '<br/>', 'required' => 'required');
        echo $this->Form->radio('choix_gagnant', $options, $attributes);
        ?>
        <div class="clearfix"></div>

            <?php
            echo $this->Form->submit('Soumettre', array(
                'div' => false,
                'class' => 'btn btn-primary'
            ));

         echo $this->Html->link('Retour à mes paris', array('controller' => 'paris', 'action' => 'mes_paris'), array('class' => 'btn btn-default')); ?>

    </fieldset>
    <?php echo $this->Form->end(); ?>