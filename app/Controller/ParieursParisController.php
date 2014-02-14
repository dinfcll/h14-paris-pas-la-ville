<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 14-02-04
 * Time: 18:31
 */
class ParieursParisController extends AppController {
    public $helpers = array('Html', 'Form');
    public $uses = array(
        'ParieursPari',
        'Pari'
    );

    public function beforeFilter() {
        parent::beforeFilter();
    }

    //Vue index: affiche toutes les mises du parieur
    public function index()
    {//TODO faire cette page
        $this->set('paris', $this->Pari->find('all'));
    }

    // Permet de miser sur un paris
    public function miser($id = null) {
        $this->set('id_util', $this->Auth->user('id'));
        if (!$id)
            return $this->redirect(array('action' => 'index', 'controller'=>'paris'));
        $pari = $this->Pari->findById($id);

        if (!$pari)
            return $this->redirect(array('action' => 'index', 'controller'=>'paris'));

        $this->loadModel('Choix');

        //Permet d'afficher les choix disponibles pour ce pari
        $choix = $this->Choix->find('all', array('conditions' => array('Choix.pari_id' => $id)));
        //Pour créer le groupe de radiobuttons qui montrent les choix disponibles pour le pari
        $options = $this->Choix->find('list', array('conditions' => array('Choix.pari_id' => $id), 'fields'=> array('id', 'nom')));

        //Pour vérifier si la personne a déjà misé sur ce pari.
        $dejaMise = false;
        if($this->ParieursPari->find('first', array('conditions'=> array('pari_id' => $id, 'parieur_id' => $this->Auth->user('id')))))
            $dejaMise = true;

        $this -> set('options', $options);
        $this -> set('paris', $pari);
        $this -> set('choix', $choix);
        $this -> set('dejaMise', $dejaMise);

        if ($this->request->is(array('post', 'put'))) {

            //On ne peut soumettre le formulaire si le pari est déjà terminé
            if(isset($pari['Pari']['choix_gagnant']))
                return ;
            //On ne peut soumettre le formulaire si on a créé ce pari OU si on a déjà misé
            if($pari['Pari']['parieur_id'] == $this->Auth->user('id') || $dejaMise)
                return;

            $this->ParieursPari->create();
            if ($this->ParieursPari->save($this->request->data)) {
                $this->Session->setFlash(__('La mise a bien été créée.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));
                return $this->redirect(array('action' => 'mes_mises', 'controller' => 'paris'));
            }
            $this->Session->setFlash(__('Une erreur est survenue lors de la création de la mise. Veuillez réessayer.'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
        }
    }
}