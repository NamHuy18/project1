@extends ('admin.layouts.master')
@section ('content')
<div class="titleArea">
  <div class="wrapper">
      <div class="pageTitle">
          <h5>Thống Kê</h5>
      </div>
      <div class="clear"></div>
  </div>
</div>
    <div class="wrapper">
        <div class="widgets">
            <!-- Stats -->
            <!-- User -->
            <div class="oneTwo">
                <div class="widget">
                    <div class="title">                        
                        <h6>Thống kê dữ liệu</h6>
                    </div>

                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
                        <tbody>

                        <tr>
                            <td>
                                <div class="left">Tổng số đơn hàng</div>
                                <div class="right f11"><a href="{{ route('listOrder') }}" target="_blank">Chi tiết</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{$totalOrder}}					</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="left">Tổng số sản phẩm</div>
                                <div class="right f11"><a href="{{ route('listFood') }}" target="_blank">Chi tiết</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{$totalFood}}					</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="left">Tổng số bài viết</div>
                                <div class="right f11"><a href="{{ route('listNews') }}" target="_blank">Chi tiết</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{$totalNews}}					</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="left">Tổng số thành viên</div>
                                <div class="right f11"><a href="{{ route('listUser') }}" target="_blank">Chi tiết</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{$totalUser}}					</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clear"></div>

            <!-- Giao dich thanh cong gan day nhat -->

            <div class="widget">
                <div class="title">
                    <h6>Danh sách giao dịch gần đây</h6>
                    <div class="num f12">Tổng số: <b>{{$totalOrderDone}}/{{$totalOrder}}</b></div>
                </div>
                @if($totalOrderDone >0)
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
                        <td>Tên khách hàng</td>
                        <td>Số tiền</td>
                        <td>Hình thức</td>
                        <td>Giao dịch</td>
                        <td>Thời gian đặt hàng</td>
                        <td>Ghi chú</td>
                        <td>Hành động</td>
                    </tr>
                    </thead>
                    <tbody class="list_item">
                    @foreach($orderDone as $row)
                        <tr class='row_12'>

                            <td>
                                {{$row->user->name}}
                            </td>

                            <td class="textR red">{{number_format($row->total)}} VND</td>

                            <td>
                                {{$row->payment}}					</td>


                            <td class="status textC">
						<span class="completed">
						Thành công						</span>
                            </td>

                            <td class="textC">{{$row->date_order}}</td>
                            <td class="textC">{{$row->note}}</td>
                            <td class="option"><a href="{{ route('listDetail', $row->id) }}"><img src="{{ asset('bower_components/source/backend/admin/images/icons/view.png') }}" /></a></td>
                        </tr>

                    @endforeach
                    </tbody>

                </table>
                @else
                    <h5 style="margin: 15px">Không có giao dịch nào</h5>
                @endif
            </div>

        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.chitiet').click(function (e) {
                e.preventDefault();
                $.ajax({
                    type:'get',
                    url:'admin/transaction/chitiet/'+$(this).attr('value')+'.html',
                    success:function (data) {
                        var str = '<table cellpadding="0" cellspacing="0" ' +
                            'width="100%" class="sTable mTable myTable" id="checkAll">'+
                            '<thead>\n' +
                            '                <tr>\n' +
                            '                    <td style="width:60px;">Mã số đơn hàng</td>\n' +
                            '                    <td>Sản phẩm</td>\n' +
                            '\n' +
                            '                    <td style="width:70px;">Số tiền</td>\n' +
                            '                    <td style="width:50px;">Số lượng</td>\n' +
                            '                    <td style="width:75px;">Đơn hàng</td>\n' +
                            '                    <td style="width:75px;">Ngày tạo</td>\n' +
                            '                </tr>\n' +
                            '                </thead>'+
                            ' <tbody class="list_item">\n';
                        data.forEach(function (value) {
                            str +='<tr><td class="textC">'+value.id_order+'</td>\n'+
                                ' <td>\n' +
                                '                        <div class="image_thumb">\n' +
                                '                            <img src="source/image/product/'+value.image+'" height="50">\n' +
                                '                        </div>\n' +
                                '                        <div style="margin-top: 17px">\n' +
                                '                            <a href="'+value.id_product+'/chitiet.html" class="tipS" title="" target="_blank">\n' +
                                '                                <b>'+value.name+'</b>\n' +
                                '                            </a>\n' +
                                '                        </div>\n' +
                                '                        <div class="clear"></div>\n' +
                                '\n' +
                                '                    </td>\n' +
                                '\n' +
                                '                    <td class="textC">\n' +
                                '                        '+value.unit_price+' đ\n' +
                                '                    </td>\n' +
                                '\n' +
                                '                    <td class="textC">'+value.quantity+'</td>\n' +
                                '\n' +
                                '                    <td class="status textC">\n' +
                                '\t\t\t\t\t\t<span class="pending">\n' +
                                '\t\t\t\t\t\tChờ xử lý\t\t\t\t\t\t</span>\n' +
                                '                    </td>\n' +
                                '\n' +
                                '                    <td class="textC">'+value.created_at+'</td></tr>'
                        });
                        str+='</tbody></table>';

                        $.dialog({
                            theme: 'material',
                            title: '',
                            content: str,
                            animationSpeed: 100,
                            backgroundDismiss: true,
                        });
                    }
                });
            });
        });
    </script>
@endsection