
<!-- Modal -->
<div id="addvoucher" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title span-style">Add New Coupon</h4></center>
      </div>
      <!--=======modal body==============-->
      <div class="modal-body">

           <div class="form-group">
             <label for="email">Reciept Details :</label>
             <select class="form-control" id="recipient_id">
               <option value="">---Please Select recipient---</option>
               @foreach ($recepientData as $recepientDataRow)
                 <option value="{{$recepientDataRow->recipient_id}}">{{$recepientDataRow->name}}-{{$recepientDataRow->email}}</option>
              @endforeach
             </select>
           </div>

           <div class="form-group">
             <label for="email">Offer Type:</label>
             <select class="form-control" id="offerType">
               <option value="">---Please Select An Offer---</option>
               @foreach ($offer as $offerRow)
						      <option value="{{$offerRow->offer_id}}">{{$offerRow->offer_name}}</option>
						   @endforeach
             </select>
           </div>

           <div class="form-group">
             <label for="pwd">Expiring Date:</label>
             <input type="date" class="form-control" id="expringdate">
           </div>
           <button type="submit" id="btnCreate" class="btn btn-primary">Create Coupon</button>

      </div>
      <!--=======end modal body==============-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
