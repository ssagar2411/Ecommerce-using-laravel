@extends('layouts.sellerlayouts.seller-design')
@section('content')
<div class="container-fluid">
    <div class="col-sm-10 col-sm-offset-1">
        <!--      Wizard container        -->
        <div class="wizard-container">
            <div class="card wizard-card" data-color="rose" id="wizardProfile">
                <form action="{{ route('vendor.create-product') }}" method="post" enctype="multipart/form-data">
                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                    <div class="wizard-header">
                        <h3 class="wizard-title">
                            Create your Product Here. . .
                        </h3>
                    </div>
                    <div class="wizard-navigation">
                        <ul>
                            <li>
                                <a href="#general" data-toggle="tab">General Info</a>
                            </li>
                            <li>
                                <a href="#images" data-toggle="tab">Product Images</a>
                            </li>
                            <li>
                                <a href="#attribute" data-toggle="tab">Attributes</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="general">
                            <h4 class="info-text">Product Information </h4>
                            <div class="container-fluid">
                            <input type="hidden" value="{{ Auth::user()->id }}">
                            <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Code</label>
                                <input type="text" class="form-control"  value="" name="product_code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Name</label>
                                <input type="text" class="form-control"  value="" name="product_name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8 pr-md-1">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Choose Product Brand</label>
                            <select class="selectpicker" id="exampleFormControlSelect1" name="brand_id" data-style="btn btn-primary " title="Select Product Brand" data-size="3">
                                <?php echo $branddropdown; ?>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8 pr-md-1">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Choose Product Category</label>
                            <select class="selectpicker" id="exampleFormControlSelect1" name="category_id" data-style="btn btn-primary " title="Select Product Category" data-size="3">
                                <?php echo $categorydropdown; ?>
                            </select>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                <label class="control-label">Description</label>
                                <textarea rows="4" cols="80" class="form-control"  name="product_description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product SKU</label>
                                <input type="text" class="form-control"  value="" name="product_sku">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Mark Price</label>
                                <input type="text" class="form-control"  value="" name="mark_price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Sell Price</label>
                                <input type="text" class="form-control"  value="" name="sell_price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8 pr-md-1">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Product Stock Status</label>
                            <select class="selectpicker" id="exampleFormControlSelect1" name="stockstatus_id" data-style="btn btn-primary " title="Select Stock Status" data-size="3">
                                <?php echo $statusdropdown; ?>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Quantity</label>
                                <input type="text" class="form-control"  value="" name="quantity">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Weight</label>
                                <input type="text" class="form-control"  value="" name="weight">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8 pr-md-1">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Weight Class</label>
                            <select class="selectpicker" id="exampleFormControlSelect1" name="weight_class_id" data-style="btn btn-primary " title="Select Weight Class" data-size="3">
                                <option value="1">Gram</option>
                                <option value="2">Kilogram</option>
                                <option value="3">Miligram</option>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Length</label>
                                <input type="text" class="form-control"  value="" name="length">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Breadth</label>
                                <input type="text" class="form-control"  value="" name="breadth">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 pr-md-1">
                                <div class="form-group label-floating">
                                <label class="control-label">Product Height</label>
                                <input type="text" class="form-control"  value="" name="height">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8 pr-md-1">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Dimension Class</label>
                            <select class="selectpicker" id="exampleFormControlSelect1" name="dimension_class_id" data-style="btn btn-primary " title="Select Dimension Class" data-size="3">
                               <option value="1">Milimeter(MM)</option>
                               <option value="2">Centimeter(CM)</option>
                               <option value="3">Meter(m)</option>
                            </select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <label for="">Image</label>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{ asset('images/backend_images/image_placeholder.jpg') }}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-rose btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="product_main_images" />
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="images">
                            <h4 class="info-text">Product Images </h4>
                            <div class="row">
                                <div class="field_wrapper">
                                    <div class="col-md-4">
                                        <div class="col-md-4 col-sm-4">
                                            
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{ asset('images/backend_images/image_placeholder.jpg') }}" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="product_images[]" />
                                                    </span>
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="add_button btn btn-primary" title="Add field">ADD</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="attribute">
                            <h4 class="info-text">Product Attributes </h4>
                            <div class="row">
                                <div class="container-fluid">
                                <div class="disabled-sorting "><a href="#" class="add-field btn btn-primary"><i class="material-icons">add_to_queue</i></a></div>
                                <div id="table_items">
                                    @csrf
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-footer">
                        <div class="pull-right">
                            <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                            <input type="submit" class='btn btn-finish btn-fill btn-rose btn-wd' value='Finish' />
                        </div>
                        <div class="pull-left">
                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        <!-- wizard container -->
    </div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    var attribute_id=0;
    function attchange(p){
            var groupid = $(p).val();
            var attid = p.dataset.id;
             $.ajax({
                    type: 'post',
                    url: '/vendor/get-attribute',
                    data: {'_token': $('input[name=_token]').val(), 'attribute_group_id' : groupid  },
                    success: function(data){
                        document.getElementById("attribute-"+attid).innerHTML = data;
                    },
            });
        }
   $(document).ready(function() {
        demo.initMaterialWizard();
        setTimeout(function() {
            $('.card.wizard-card').addClass('active');
        }, 600);
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = ' <div class="col-md-4"><div class="col-md-4 col-sm-4"><div class="fileinput fileinput-new text-center" data-provides="fileinput"><div class="fileinput-new thumbnail"><img src="{{ asset("images/backend_images/image_placeholder.jpg") }}" alt="..."></div><div class="fileinput-preview fileinput-exists thumbnail"></div><div><span class="btn btn-rose btn-round btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="product_images[]" /></span><a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a></div></div></div><a href="javascript:void(0);" class="remove_button btn btn-danger" title="Add field">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
    $(document).on('click','.add-field',function(){
        var html = '';
        var group = " <?php echo $attributegroup ?>";
        html += '<div class="row" id="att">';
        html += '<div class="col-md-4"><select onchange="attchange(this);" data-id="'+attribute_id+'" id="attribute_group'+attribute_id+'" class=" form-control dynamic" name="attributegroupid[]" data-style="btn btn-primary btn-round" title="Select Attribute Group" data-size="5" data-dependent="attribute">'+ group +'</select></div>';
        html += '<div class="col-md-4"><div class="form-group"><select id="attribute-'+attribute_id+'" class="form-control"  data-style="btn btn-primary btn-round" title="Select Attribute" data-size="5" name="attribute[]"></select></div></div>';
        html += '<div class="col-md-3"><input type="text" id="abc" name="attribute_value[]" class="form-control" /></div>';
        html += '<div class="col-md-1"><a href="#" class="remove-field"><i class="material-icons">remove_from_queue</i></a></div>';
        html += '</div>';
        $('#table_items').append(html); 
        attribute_id++;
       
    });

    $(document).on('click','.remove-field',function(){
        $('#att').remove();
    });
  
    });
    
</script>
@endsection