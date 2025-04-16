<?php
class Thongke extends controller {
    private $chartModel;

    public function __construct() {
        $this->chartModel = $this->model('chart_m');
    }

    public function Get_data() {
        // Lấy dữ liệu từ Model
        $data = $this->chartModel->loaibang();
        $data1 = $this->chartModel->sinhvienchuacapbang();
        $groupedData = $this->chartModel->getGroupedBarData();

        // Truyền dữ liệu sang View
        $this->view('Masterlayout_admin', [
            'page' => 'chart_view',
            'dulieu' => $data,
            'dulieu1' => $data1,
            'groupedData' => $groupedData
        ]);
    }
}
?>
