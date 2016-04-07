<?php
class BookmarkController extends AppController{
    var $name = 'Bookmark';
    var $components = array('Auth', 'Miscfunctions', 'Translator');
    var $helpers = array('Html', 'Ajax');

    public $paginate = array();

    function beforeFilter(){
        $this->Auth->allow('*');
    }

    function search($short = null){
        App::import('Model','Gesamtobjekt');
        $Gesamtobjekt = new Gesamtobjekt();
        $str = '';
        if($this->Auth->user()){
            // logged user

            // if there are session object, save them into DB
            if($this->Session->check('bookmarks') && count($this->Session->read('bookmarks'))){
                foreach($this->Session->read('bookmarks') as $k => $objs){
                    $this->data['mez_fkid_ben_id'] = $this->Auth->user('ben_id');
                    $this->data['mez_fkid_obj_id'] = $objs;
                    $this->data['mez_date_added'] = date('Y-m-d H:i:s');

                    $this->Bookmark->create();
                    $this->Bookmark->save($this->data);
                }
                $this->Session->delete('bookmarks');
            }
            //$this->Bookmark->recursive = -1;
            $first = $this->Bookmark->find('all', array(
                                                      'conditions' => array(
                                                          'mez_fkid_ben_id = '. $this->Auth->user('ben_id')
                                                      ),
                                                      'joins' => array(
                                                            array(
                                                                'table' => 'Objekte',
                                                                'alias' => 'Objekte',
                                                                'type' => 'LEFT',
                                                                'conditions' => array(
                                                                    'Bookmark.mez_fkid_obj_id = Objekte.obj_id'
                                                                )

                                                            )
                                                      ),
                                                      'order' => array('Objekte.OBJ_PREIS ASC')
                                                    )); //debug($first);
            foreach($first as $k => $bookmark){
                $str.= $bookmark['Bookmark']['mez_fkid_obj_id'].',';
            }
            $str=substr($str,0,-1); //debug($str);
        }else{
            // session user
            if($this->Session->check('bookmarks') && count($this->Session->read('bookmarks'))){
                foreach($this->Session->read('bookmarks') as $k => $objs){
                    if(empty($objs)){
                        $key = array_search($objs, $this->Session->read('bookmarks'));
                        $this->Session->delete('bookmarks.'.$key);
                        continue;
                    }
                    $str.= $objs.',';
                }
                $str=substr($str,0,-1); //debug($str);
            }
        }
        if(!empty($str)){
            $this->paginate['conditions'] = $Gesamtobjekt->preparePaginateConditions(null, array('OBJ_ID IN ('.$str.')'));
			$this->paginate['fields'] = 'DISTINCT OBJ_NUMMER, OBJ_ID, OBJ_UET_UEBERSCHRIFT, OBI_ID, OBI_UET_BESCHREIBUNG, OBJ_UET_WERBETEXT, OBJ_PREIS, OBJ_PREIS_BIS, OBJ_PREIS_INTERNETREL, OBJ_UET_PREISZUSATZ, REG_ID, BER_ID, REG_NAME, BER_NAME, BER_EXPOSERELEVANT';
			$this->paginate['order'] = 'OBJ_PREIS '.Configure::read('DefaultPriceSortDirection');
			$this->paginate['limit'] = Configure::read('SearchResultsPerPage');
            $results = $this->paginate($Gesamtobjekt, $this->paginate['conditions']);
            $Gesamtobjekt->allObjectsArray(); if($short) return $str;
            $this->set('objects', $Gesamtobjekt->manipulateSearchResults($results));
            $this->set('defaultMaxPerPage', Configure::read('SearchResultsPerPage'));

        }
    }

    function add($id){
        $this->autoRender = false;
        if($this->Auth->user()){
            // save in DB
            if (!empty($id)) {
                $this->data['mez_fkid_ben_id'] = $this->Auth->user('ben_id');
                $this->data['mez_fkid_obj_id'] = $id;
                $this->data['mez_date_added'] = date('Y-m-d H:i:s');

                $this->Bookmark->create();
                if($this->Bookmark->save($this->data)){
                    if ($this->referer() != '/') $ziel=preg_replace('~(.*)#[^/]+$~', '\\1', $this->referer()); $this->redirect($ziel.'#'.$id);
                    //$this->redirect($this->referer());
                }
            }else{$this->redirect($this->referer());}
        }else{
            if(!$this->Session->check('bookmarks')){
		        $bookmarks = array();
                $this->Session->write('bookmarks', $bookmarks);
	        }
            if(!in_array($id, $this->Session->read('bookmarks'))){
                $next = count($this->Session->read('bookmarks'))+1;
                $this->Session->write('bookmarks.'.$next, $id);
                if ($this->referer() != '/') $ziel=preg_replace('~(.*)#[^/]+$~', '\\1', $this->referer()); $this->redirect($ziel.'#'.$id);
                //$this->redirect($this->referer());
            }else{$this->redirect($this->referer());}
        }
        
    }

    function delete($id){
        $this->autoRender = false;
        if($this->Auth->user()){
            // get primary id
            $this->Bookmark->recursive = -1;
            $prid = $this->Bookmark->find('first', array('conditions' => array('mez_fkid_ben_id = '. $this->Auth->user('ben_id'), 'mez_fkid_obj_id = '. $id)));
            // and delete
            if($this->Bookmark->query('DELETE FROM link_obj_ben WHERE mez_id = '. $prid['Bookmark']['mez_id'])){
                if ($this->referer() != '/') $ziel=preg_replace('~(.*)#[^/]+$~', '\\1', $this->referer()); $this->redirect($ziel.'#'.$id);
                //$this->redirect($this->referer());
            }
        }else{
            if($this->Session->check('bookmarks')){
                if(in_array($id, $this->Session->read('bookmarks'))){
                    $key = array_search($id, $this->Session->read('bookmarks'));
                    $this->Session->delete('bookmarks.'.$key);
                    if(!count($this->Session->read('bookmarks'))) $this->Session->delete('bookmarks');
                    if ($this->referer() != '/') $ziel=preg_replace('~(.*)#[^/]+$~', '\\1', $this->referer()); $this->redirect($ziel.'#'.$id);
                    //$this->redirect($this->referer());
                }
            }
        }
    }
}
?>