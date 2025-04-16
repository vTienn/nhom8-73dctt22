<?php
class Homepage extends controller{

    private $homepage;
    function hienthi() {
        $dulieu = $this->homepage->getAll();
        $this->view('Masterlayout_admin', [
            'page' => 'hienthi',
            'dulieu' => $dulieu
        ]);
    }

}
?>