@extends("/backend/layouts/template/template-admin")
<style>
.ellipsis-verti{
    display:block;
    width:30%;
    text-overflow:ellipsis;
    overflow:hidden;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
}
</style>
@section("content")
<div class="container-fluid mt-7">
    <div class="row justify-content-center">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">เพิ่มบทความทั่วไป</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/create-article')}}" enctype="multipart/form-data" method="post">@csrf
                        <div class="pl-lg-4">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alertdesign alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                            @php
                                $services = DB::table('service_categories')->get();
                            @endphp
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>หัวข้อเรื่อง</label>
                                        @if ($errors->has('title'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('title') }}</span>
                                        @endif
                                        <input type="text" class="form-control form-control-alternative mitr" name="title">
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
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>สถานะ</label>
                                        <select name="status" class="form-control form-control-alternative mitr">
                                            <option value="เปิด">เปิด</option>
                                            <option value="ปิด">ปิด</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>เนื้อหาบทความ</label>
                                        @if ($errors->has('article'))
                                            <span class="text-danger" style="font-size: 16px;">{{ $errors->first('article') }}</span>
                                        @endif
                                        <textarea class="ckeditor form-control" name="article"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary my-4 mitr">เพิ่มบทความ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">บทความทั่วไป</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{$articles->links()}}
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>หัวข้อเรื่อง</th>
                                    <th>บทความ</th>
                                    <th>สถานะ</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach($articles as $article => $value)
                            <tbody>
                                <tr>
                                    <td>{{$NUM_PAGE*($page-1) + $article+1}}</td>
                                    <td>{{$value->title}}</td>
                                    <td>
                                        <a href="" type="button" data-toggle="modal" data-target="#modal-article{{$value->id}}" data-id="{{$value->id}}">
                                            <i class="fas fa-folder" style="color:blue;"></i>
                                        </a>
                                    </td>
                                    <td>{{$value->status}}</td>
                                    <td>
                                        <a href="{{url('/admin/edit-article/')}}/{{$value->id}}">
                                            <i class="fas fa-edit" style="color:blue;"></i>
                                        </a>                  
                                        <a href="{{url('/admin/delete-article/')}}/{{$value->id}}" onclick="return confirm('Are you sure to delete ?')">
                                            <i class="fa fa-trash" style="color:red;"></i>
                                        </a>
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                    </td>
                                </tr>
                            </tbody>
                            <!-- Modal -->
                            <div class="modal fade" id="modal-article{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            {!! $value->article !!}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary prompt" data-dismiss="modal">ปิด</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </table>
                      </div>
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