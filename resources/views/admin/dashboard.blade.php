@extends('adminmaster')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $product_count }}</h3>

                <p>Tổng sản phẩm trong kho</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <a href="{{ route('sanpham.index') }}" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h4 style="line-height: 1.85; font-weight:bold">{{ number_format($sales_count) }}đ</h4>

                <p>Tổng doanh thu</p>
            </div>
            <div class="icon">
                <i class="fas fa-signal"></i>
            </div>
            <a href="#" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $new_order }}</h3>

                <p>Đơn hàng mới</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            <a href="{{ route('donhang.index') }}" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger" title="Sản phẩm còn dưới 2 tháng nữa sẽ hết HSD" data-bs-toggle="tooltip">
            <div class="inner">
                <h3>{{ count($exp_product) }}</h3>

                <p>Sản phẩm sắp/hết HSD</p>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <a href="{{ route('sanpham.expire') }}" class="small-box-footer">Thông tin thêm <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
</div>
<hr>
<!-- Thống kê chart -->
<div class="row">
    <div class="col-12">
        <p class="title-thongke">Thống kê doanh số</p>
    </div>
    <div class="col-12">
        <form autocomplete="off">
            @csrf
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Từ ngày</label>
                    <input class="form-control" type="text" id="thongke_start">
                </div>
                <div class="form-group col-md-2">
                    <label>Đến ngày</label>
                    <input class="form-control" type="text" id="thongke_end">
                </div>
                <div class="form-group col-md-2 mt-auto">
                    <button type="button" id="btn-thongke-dashboard" class="btn btn-primary w-75">Thống kê</button>
                </div>
                <div class="form-group col-md-3">
                    <label>Thống kê theo:</label>
                    <select class="form-control w-75 thongke-by-timeline">
                        <option>Chọn thời gian thống kê</option>
                        <option value="1tuan">Một tuần qua</option>
                        <option value="thangnay">Tháng này</option>
                        <option value="thangtruoc">Tháng trước</option>
                        <option value="1nam">Một năm qua</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
    
    <div class="col-12 my-2">
        <span class="badge px-5 bg-info" style="font-size: 15px;">Doanh thu</span>
        <span class="badge px-5 bg-success" style="font-size: 15px;">Lợi nhuận</span>
    </div>
    <div class="col-12">
        <div id="firstchart" style="height: 320px;"></div>
    </div>
</div>
<hr>
<!-- <div class="row">
    <div class="col-12">
        <p class="title-thongke">Thống kê trạng thái</p>
    </div>
</div> -->
@stop()
@section('css')
<style>
    .title-thongke {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }
</style>
@stop()
@section('js')
<!-- first chart -->
<script>
    $(document).ready(function() {

        var chart = new Morris.Bar({
            element: 'firstchart',
            
            xkey: 'period',
            ykeys: ['sales','profit'],
            labels: ['Doanh thu','Lợi nhuận'],

            //chart's option
            barColors: ['#17a2b8', '#28a745'],
            resize: true,
            hideHover: 'auto',
            parseTime: false,
        });

        /* Thong ke mac dinh */
        function chart30day(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('admin.showdays') }}",
                method: 'POST',
                dataType: 'JSON',
                data: {_token: _token},

                success:function(data) 
                {
                    chart.setData(data);
                }
            });
        }
        chart30day();

        /* Chon ngay thong ke */
        $('#btn-thongke-dashboard').click(function() {
            var _token = $('input[name="_token"]').val();
            var from_date = $('#thongke_start').val();
            var to_date = $('#thongke_end').val();

            $.ajax({
                url:"{{ route('admin.filterdate') }}",
                method: 'POST',
                dataType: 'JSON',
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    _token: _token
                },

                success:function(data) {
                    chart.setData(data);
                }
            });
        });
        /* Chon moc thoi gian thong ke */
        $('.thongke-by-timeline').change(function() {
            var _token = $('input[name="_token"]').val();
            var dashboard_value = $(this).val();
            $.ajax({
                url:"{{ route('admin.filtertimeline') }}",
                method: 'POST',
                dataType: 'JSON',
                data: {dashboard_value:dashboard_value, _token:_token},

                success:function(data) {
                    chart.setData(data);
                }
            });
        });

    });
</script>
@stop()