<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  id="form-item" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" >
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>


                <div class="modal-body">
                    <input type="hidden" id="id" name="id">


                    <div class="box-body">
                        @if(\Auth::user()->role == 'admin' || \Auth::user()->role == 'staff')
                            <div class="form-group">
                                <label >Customer</label>
                                {!! Form::select('customer_id', $customers, null, ['class' => 'form-control select', 'placeholder' => '-- Choose Customer --', 'id' => 'customer_id', 'required']) !!}
                                <span class="help-block with-errors"></span>
                            </div>
                        @else
                            <div class="form-group">
                                <label >Customer</label>
                                <input hidden name="customer_id" value="{{ \App\Customer::where('user_id', \Auth::user()->id)->first()->id }}">
                                <input readonly name="customer_name" class="form-control" value="{{ \App\Customer::where('user_id', \Auth::user()->id)->first()->name }}">
                                <span class="help-block with-errors"></span>
                            </div>

                        @endif


                        <div class="form-group">
                            <label >Date</label>
                            <input data-date-format='yyyy-mm-dd' type="text" class="form-control" id="order_date" name="order_date"   required>
                            <span class="help-block with-errors"></span>
                        </div>

                        <h4>Product Details</h4>

                        <div class="form-group">
                            <label >Products</label>
                            {!! Form::select('product_id', $products, null, ['class' => 'form-control select', 'placeholder' => '-- Choose Product --', 'id' => 'product_id']) !!}
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label >Quantity</label>
                            <input type="number" class="form-control" id="qty" name="qty">
                            <span class="help-block with-errors"></span>
                        </div>

                        <a type="button" onclick="addProducts()" class="btn btn-primary">Add Product</a>

                    </div>
                    <!-- /.box-body -->
                    <hr>
                    <table class="table" id="productsTable">
                        <thead>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th></th>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
