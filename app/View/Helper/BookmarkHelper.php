<?php
App::uses('AppHelper', 'View/Helper');

class BookmarkHelper extends AppHelper {
    var $helpers = array ('Session');

    public function checkBookmarkStatus($id){
        if($this->Session->check('Auth.User')){
            $Model=& ClassRegistry::init('Bookmark');
            $Model->recursive = -1;
            $data = $Model->find('first', array('conditions' => array('mez_fkid_ben_id = '.$this->Session->read('Auth.User.ben_id'), 'mez_fkid_obj_id = '. $id)));
            //debug($data); exit;
            if(!empty($data) && is_array($data['Bookmark'])){ return 'bookmarked'; }else{return 'bookmark';}
        }
        if($this->Session->check('bookmarks')){
                if(in_array($id, $this->Session->read('bookmarks'))){
                    return 'bookmarked';
                }else{
                    return 'bookmark';
                }
        }
        return 'bookmark';
    }

    public function anyBookmarks(){
         if($this->Session->check('Auth.User')){
            $Model=& ClassRegistry::init('Bookmark'); //debug($Model);
            $Model->recursive = -1;
            $data = $Model->find('first', array('conditions' => array('mez_fkid_ben_id = '.$this->Session->read('Auth.User.ben_id'))));
            if(is_array($data['Bookmark']))return true;
         }else{
             return $this->Session->check('bookmarks');
         }
    }
}
?>