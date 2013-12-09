<?php
class OjAction extends BaseAction {
    
    public function index() {
        
        $ojhistoryDB = M('Ojhistory');
        $data = $ojhistoryDB -> order('vid DESC') -> select();
        $this -> commonassign();
        if($data === null) $this -> display('nodata');
        else {
            for($i = 0; $i < count($data); $i++) {
                if($data[$i]['photos']) {  //有照片
                    $data[$i]['photo'] = explode(',', $data[$i]['photos']);
                    for($j = 0; $j < count($data[$i]['photo']); $j++) {
                        $data[$i]['photo'][$j] = base64_decode($data[$i]['photo'][$j]);
                    }
            
                    $data[$i]['title'] = explode(',', $data[$i]['titles']);
                    for($j = 0; $j < count($data[$i]['title']); $j++) {
                        $data[$i]['title'][$j] = base64_decode($data[$i]['title'][$j]);
                    }
            
                    $data[$i]['desc'] = explode(',', $data[$i]['descs']);
                    for($j = 0; $j < count($data[$i]['desc']); $j++) {
                        $data[$i]['desc'][$j] = base64_decode($data[$i]['desc'][$j]);
                    }
                }
                else {  //无照片
                    $data[$i]['photo'] = array();
                    $data[$i]['title'] = array();
                    $data[$i]['desc'] = array();
                }
            }
            $this -> assign('data', $data);
            $this -> display();
        }
    }
}