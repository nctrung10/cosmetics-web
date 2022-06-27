@extends('adminmaster')

@section('title', 'Biến động giá sản phẩm')

@section('content')
    <div class="col-12">
        <h5 class="text-center">Biểu đồ biến động giá</h5>
    </div>
    <div class="col-12">
        <h6 class="text-center text-success font-weight-bold">{{ $show->ten }}</h6>
        <h6 class="text-center">Giá nhập: <span style="font-weight: bold;">{{  number_format($show->gia) }}đ</span></h6>
        <h6 class="text-center">Giá bán: <span style="font-weight: bold; color: rgb(11, 98, 164)">{{  number_format($show->gia_ban) }}đ</span></h6>
    </div>
    <div class="col-12 mt-2">
        <div id="pricechart" style="height: 300px;"></div>
    </div>
    
    <div class="col-12 mt-5">
        <a href="javascript:history.back()" class="btn btn-dark">Quay lại</a>
    </div>
@stop()
@section('css')
<style>
    
</style>
@stop()
@section('js')
<script>
    $(document).ready(function() {

        var chart = new Morris.Line({
            element: 'pricechart',

            data:[
                <?php 
                foreach($bdgia as $data){
                    echo '{period:"'.$data->ngaycapnhat.'", price:"'.$data->sanpham_gia.'" },';
                }
                ?>
            ],
            xkey: 'period',
            ykeys: ['price'],
            labels: ['Giá sản phẩm'],

            //chart's option
            barColors: ['#17a2b8', '#28a745'],
            pointFillColors: ['#fff'],
            pointStrokeColors: ['#000'],
            fillOpacity: 0.5,
            resize: true,
            hideHover: 'auto',
            parseTime: false,
            /* xLabelFormat: function(d) {
                return ("0" + d.getDate()).slice(-2) + '-' + ("0" + (d.getMonth() + 1)).slice(-2) + '-' + d.getFullYear();
            } */
        });
    });
</script>
@stop()