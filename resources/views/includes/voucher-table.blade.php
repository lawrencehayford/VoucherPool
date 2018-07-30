<div class="panel panel-default">
  <!--=========start grid card=================-->
  <div class="panel-body card-1">

    <div class="row">
      <div class="col-md-12" >
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addvoucher">
         <span> + </span> Add Coupons
       </button>
      </div>
      <br/>
      <br/>
    </div>

    <div class="row">
      <div class="col-md-12 overflow-scroll" >
        <table id="voucherTable" class="display" style="width:100%">
          <thead>
            <tr>
              <th></th>
              <th>Code</th>
              <th>Used</th>
              <th>Reciever</th>
              <th>Used date</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($couponData as $couponDataRow)
              <tr>
                <td><input type='checkbox' id="{{$couponDataRow->voucher_id}}"/></td>
                <td>{{$couponDataRow->voucher_code}}</td>
                <td>@if($couponDataRow->usage_try >0)
                      <font color='red'>used</font>
                    @else
                      <font color='green'>Not Used</font>
                    @endif
                </td>
                <td>{{$couponDataRow->email}}</td>
                <td>{{$couponDataRow->date_used}}</td>
              </tr>
            @endforeach

          </tbody>
        </table>
       </div>

    </div>
  </div>
  <!--=========end grid card=================-->
</div>
