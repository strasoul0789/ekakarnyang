@extends("/backend/layouts/template/template-admin")

@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">แก้ไขบทความสินค้า</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body"> 
                    <form action="{{url('/admin/edit-article-product')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            @php
                                $products = DB::table('product_categories')->get();
                            @endphp
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>หัวข้อบริการ</label>
                                        <select name="product" class="form-control form-control-alternative mitr">
                                                <option value="{{$article->product}}">{{$article->product}}</option>
                                            @foreach ($products as $product => $value)
                                                <option value="{{$value->name}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>หัวข้อเรื่อง</label>
                                        @if ($errors->has('title'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('title') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="title" value="{{$article->title}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>รูปภาพหลัก</label>
                                        @if ($errors->has('image'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('image') }}</span>
                                        @endif
                                        <input type="file" class="form-control form-control-alternative mitr" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>เนื้อหาบทความ</label>
                                        @if ($errors->has('article'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('article') }}</span>
                                        @endif
                                        <textarea class="ckeditor form-control" name="article">{{$article->article}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>สถานะ</label>
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="เปิด">เปิด</option>
                                            <option value="ปิด">ปิด</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{$article->id}}">
                                        <button type="submit" class="btn btn-primary my-4 mitr">อัพเดตบทความสินค้า</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@endsection