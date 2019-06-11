@extends('layouts.sellerlayouts.seller-design')

@section('content')
<div class="container-fluid">
    <div class="row">    
        <h3>Add {{ $saledata->sell_name }} Products</h3>
        <div class="row">
            <div class="col-md-6 pr-md-1">
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Choose Product Category</label>
                    <select class="selectpicker" id="cat_id" name="category_id" data-style="btn btn-primary btn-round" title="Select Product Category" data-size="3">
                        <?php echo $categorydropdown; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <h4>Select Products</h4>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Products</h4>
                    <div class="content-view">
                    <div class="material-datatables">
                        <table id="datatable1" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Price </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Price </th>
                                    <th> Action </th>
                                </tr>
                            </tfoot>
                            <tbody id="pro">
                                
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <h4>Selected Products</h4>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Products</h4>
                    <div class="content-view">
                    <div class="material-datatables">
                    <form action="{{ route('admin.create-sale-products') }}" method="post">
                        @csrf 
                        <input type="hidden" name="sell_id" value="{{ $saledata->sell_id }}">
                        <table id="datatable2" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Price </th>
                                    <th>Discount %</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Price </th>
                                    <th>Discount %</th>
                                    <th> Action </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                            </tbody>
                        </table>
                        <button class="btn btn-success" type="submit">Add</button>
                    </form>    
                    </div>
                    </div>  
                </div>
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>
</div>
@endsection

@section('scripts')
<script>
var abc = [];
function addpro(p){
    var proid = p.dataset.id;
    var proname = p.dataset.name;
    var procode = p.dataset.code;
    var promarkprice = p.dataset.markprice;
    var prosellprice = p.dataset.sellprice
    //console.log(proname);
    for (let index = 0; index < abc.length; index++) {
        const element = abc[index];
        if(element == proid){
            alert('already Exist');
            return false;
        }  
    }
    abc.push(proid);
    $('#datatable2').append("<tr class='product" +proid+ "' id='product"+proid+"'>"+
        "<input type='hidden' name='product_id[]' value='"+proid+"'/>"+
        "<td>"+ procode + "</td>"+
        "<td>"+ proname + "</td>"+
        "<td>"+ promarkprice + "</td>"+
        "<td><input type='text' class='form-control' name='discount_percent[]'/></td>"+
        "<td><a onclick='removepro(this);' class='btn btn-danger' data-id='"+proid+"' data-name='"+proname+"'> Remove </a>"+
        "</tr>"
    );
}
function removepro(q){
    var prodid = q.dataset.id; 
    //console.log(prodid);
    $('.product' + prodid).remove();
    for (let index = 0; index < abc.length; index++) {
        const element = abc[index];
        if(element == prodid){
            console.log(index);
            abc.splice(index,1);
            return;
        }  
    }
}
 $(document).ready(function(){
    $('#cat_id').on('change',function(){
        var catid = $('#cat_id').val();
        //console.log(catid);
        $.ajax({
            type: 'post',
            url: '/vendor/get-category-products',
            data: { 'cat_id' : catid },
            success: function(products){
                products.forEach(function(product){
                $('#pro').append("<tr class='products" + product.product_id + "' id='product"+product.product_id+"'>"+
                "<td>"+ product.product_code + "</td>"+
                "<td>"+ product.product_name + "</td>"+
                "<td>"+ product.mark_price + "</td>"+
                "<td><button onclick='addpro(this);' class='btn btn-primary' data-id='"+product.product_id+"' data-name='"+product.product_name+"' data-code='"+product.product_code+"' data-markprice='"+product.mark_price+"' data-sellprice='"+product.sell_price+"'> Add </button>"+
                "</tr>"
                );
            });
            },
        });
    }); 
});
</script>
@endsection