@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-md-1"></div>
                <div class="col col-md-10">
                    <form action="{{ route('ra.excel.download.process') }}" method="post" enctype="multipart/form-data" files="true">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <strong>ทดสอบการใช้งาน Export บน Laravel Excel</strong>
                            </div>
                            <div class="card-footer">
                                <div class="row form-group">
                                    <div class="col-3 col-md-2">
                                        <label for="order-input" class=" form-control-label">เลข Order ที่ต้องการหา</label>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <input type="text" id="order-input" name="order_number" class="form-control-file" value="001" />
                                    </div>

                                    <div class="col col-md-3"></div>
                                    <div class="col-12 col-md-9">
                                        <button id="excel" type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Export
                                        </button>
                                        <a href="{{ route("home") }}">
                                            <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i>Cancel</button>
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
        @endsection
