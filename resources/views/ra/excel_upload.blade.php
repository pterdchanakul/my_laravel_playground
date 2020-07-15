@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-md-1"></div>
                <div class="col col-md-10">
                    <form action="{{ route('ra.excel.upload.process') }}" method="post" enctype="multipart/form-data" files="true">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <strong>ทดลอง Upload ด้วยไฟล์ Excel ผ่าน Excel</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">เลือกไฟล์</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="excelFile" class="form-control-file"/>
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
