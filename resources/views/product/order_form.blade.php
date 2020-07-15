@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-md-1"></div>
                <div class="col col-md-10">
                    <form action="{{ route('product.order.form.process') }}" method="post" enctype="multipart/form-data" files="true">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <strong>ทดสอบการใช้งาน Job Queue บน Laravel</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">

                                    <div class="col col-md-3">
                                        <label for="order-input" class=" form-control-label">เลข Order</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="order-input" name="order" class="form-control-file" value="001" />
                                    </div>

                                    <div class="col col-md-3">
                                        <label for="buyer-input" class=" form-control-label">ผู้ซื้อ</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="buyer-input" name="buyer" class="form-control-file" value="buyer" />
                                    </div>

                                    <div class="col col-md-3">
                                        <label for="seller-input" class=" form-control-label">ผู้ขาย</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="seller-input" name="seller" class="form-control-file" value="seller" />
                                    </div>

                                    <div class="col col-md-3">
                                        <label for="product-input" class=" form-control-label">ชื่อสินค้า</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="product-input" name="product" class="form-control-file" value="product" />
                                    </div>

                                    <div class="col col-md-3">
                                        <label for="amount-input" class=" form-control-label">จำนวน</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="amount-input" name="amount" class="form-control-file" value=1 />
                                    </div>

                                    <div class="col col-md-3">
                                        <label for="total-price-input" class=" form-control-label" >ราคา</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="total-price-input" name="total_price" class="form-control-file" value=1 />
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row form-group">
                                    <div class="col col-md-3"></div>
                                    <div class="col-12 col-md-9">
                                        <button id="excel" type="submit" onclick="disableButton(this)" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <a href="{{ route("home") }}">
                                            <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i>ยกเลิก</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-1"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        <script>
            function disableButton(btn){
                document.getElementById(btn.id).style.display = "none";
                document.getElementById("a"+btn.id).style.display = "inline-block";
                document.getElementById(btn.id).submit();
            }
        </script>
        @endsection
