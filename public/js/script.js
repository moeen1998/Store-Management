$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
function add(){
  sortField: 'text';
  var value = $('#item_id').children("option:selected").val();
  var text = $('#item_id').children("option:selected").text();
  var packing, select, selectoptions="",
  input ='<input class="form-control" style="width:110px;" v-model="item.disc"></input>',
  button = '<button id="remove" class="btn btn-danger">Remove</button>';
  ;

  $.ajax({
    method: "get",
    url: "http://127.0.0.1:8000/item_packing/"+value,
  }).done(function( res ) {
      packing = res;

      for (const key in packing) {
        selectoptions += `<option value="${packing[key]['value']}">${packing[key]['name']}</option>`;
      }
      select= '<select name="packing" class="form-select"><option value="#" disabled selected></option>'+selectoptions+'</select>';

      $('#tblCustomers tbody').append($('<tr>')
      .append(`<td> ${value}`)
      .append(`<td> ${text}`)
      .append(`<td> ${input}`)
      .append(`<td> ${select}`)
      .append(`<td> ${button}`))
    });
  $('#send').removeClass('disabled')

}

/** for deleting row from table whem press remove button*/

$("#tblCustomers tbody").on("click",function(e){
  if(e.target.id == 'remove')
    $(e.target).parent().parent().remove()
});

/** create purchase method */
function send(){
  var items = [], 
      qty = [], 
      packingv = [], //packing value
      packingt = [], //packing text
      from= String($('#from').val()), 
      transaction_number = String($('#transaction_number').val());

  $("#tblCustomers tbody tr").each(function(){

    items.push($(this).find("td:eq(0)").text()); //items id
    qty.push($(this).find("input").val()); //qty
    packingv.push($(this).find("option:selected").val()); //packing qty
    packingt.push($(this).find("option:selected").text()); //packing text

  })
  $.ajax({
    
    method: "post",
    url: "http://127.0.0.1:8000/purchase",
    data: {
      'transaction_number':transaction_number,
      'from': from,
      'items': items,
      'qty':qty,
      'packingv':packingv,
      'packingt':packingt,
    }
  }).done(function( res ) {
    console.log(res);
      window.location.replace("http://127.0.0.1:8000/purchase");
    });

}
/** update purchase method */
function update(){
  var items = [], 
      qty = [], 
      packingv = [], //packing value
      packingt = [], //packing text
      from= String($('#from').val()), 
      id= String($("#purchase_id").text()), 
      transaction_number = String($('#transaction_number').val());

  $("#tblCustomers tbody tr").each(function(){

    items.push($(this).find("td:eq(0)").text()); //items id
    qty.push($(this).find("input").val()); //qty
    packingv.push($(this).find("option:selected").val()); //packing qty
    packingt.push($(this).find("option:selected").text()); //packing text

  })
  // console.log(qty)
  $.ajax({
    
    method: "PUT",
    url: "http://127.0.0.1:8000/purchase/"+id,
    data: {
      'transaction_number':transaction_number,
      'from': from,
      'items': items,
      'qty':qty,
      'packingv':packingv,
      'packingt':packingt,
    }
  }).done(function( res ) {
      window.location.replace("http://127.0.0.1:8000/purchase");
    });

}
/** create order method */
function sendorder(){
  var items = [], 
      qty = [], 
      packingv = [], //packing value
      packingt = [], //packing text
      from= String($('#from').val()), 
      transaction_number = String($('#transaction_number').val());

  $("#tblCustomers tbody tr").each(function(){

    items.push($(this).find("td:eq(0)").text()); //items id
    qty.push($(this).find("input").val()); //qty
    packingv.push($(this).find("option:selected").val()); //packing qty
    packingt.push($(this).find("option:selected").text()); //packing text

  })
  $.ajax({
    
    method: "post",
    url: "http://127.0.0.1:8000/order",
    data: {
      'transaction_number':transaction_number,
      'from': from,
      'items': items,
      'qty':qty,
      'packingv':packingv,
      'packingt':packingt,
    }
  }).done(function( res ) {
      window.location.replace("http://127.0.0.1:8000/order");
    });

}
/** update ordr method */
function updateorder(){
  var items = [], 
      qty = [], 
      packingv = [], //packing value
      packingt = [], //packing text
      from= String($('#from').val()), 
      id= String($("#order_id").text()), 
      transaction_number = String($('#transaction_number').val());

  $("#tblCustomers tbody tr").each(function(){

    items.push($(this).find("td:eq(0)").text()); //items id
    qty.push($(this).find("input").val()); //qty
    packingv.push($(this).find("option:selected").val()); //packing qty
    packingt.push($(this).find("option:selected").text()); //packing text

  })
  // console.log(qty)
  $.ajax({
    
    method: "PUT",
    url: "http://127.0.0.1:8000/order/"+id,
    data: {
      'transaction_number':transaction_number,
      'from': from,
      'items': items,
      'qty':qty,
      'packingv':packingv,
      'packingt':packingt,
    }
  }).done(function( res ) {
      window.location.replace("http://127.0.0.1:8000/order");
    });

}