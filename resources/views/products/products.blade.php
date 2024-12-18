@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/bootstrap.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">ألأعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ ألمنتجات</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session()->get('add')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session()->get('edit')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{session()->get('delete')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
				<!-- row -->
				<div class="row">
                                            <!--div-->
                                            <div class="col-xl-12">
                                                <div class="card mg-b-20">
                                                    <div class="card-header pb-0">
                                                        <div class="d-flex justify-content-between">

                                                    </div>
                                                    <div class="btn-icon-list">
                                                        <button class="btn btn-primary "data-toggle="modal" href='#exampleModal'> اضافه منتج <i class="typcn typcn-document-add"></i></button>
                                                    </div>
                                                    <div class="card-body">

                                                        <div class="table-responsive">
                                                            <table id="example1" class="table key-buttons text-md-nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="border-bottom-0">#</th>
                                                                        <th class="border-bottom-0">اسم المنتج</th>
                                                                        <th class="border-bottom-0">الوصف</th>
                                                                        <th class="border-bottom-0">اسم القسم</th>
                                                                        <th class="border-bottom-0"> العمليات</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i=0 ?>
                                                                    <tr>
                                                                        @foreach ($prod as $pro)
                                                                        <?php $i++ ?>
                                                                        <td>{{$i}}</td>
                                                                        <td>{{$pro->product_name}}</td>
                                                                        <td>{{$pro->description}}</td>
                                                                        {{-- <td>{{$pro->section_id}}</td> --}}
                                                                        <td>{{$pro->sec_id->section_name}}</td>
                                                                        <td>
                                                                            <a class="btn btn-outline-primary " data-effect="effect-scale"
                                                                            data-id="{{ $pro->id }}" data-product_name="{{ $pro->product_name }}"
                                                                            data-description="{{ $pro->description }}"
                                                                            data-section_name="{{$pro->sec_id->section_name}}"
                                                                            data-toggle="modal" href="#exampleModal2"
                                                                            title="تعديل"><i class="las la-pen"></i></a>

                                                                            <a class="btn btn-outline-danger " data-effect="effect-scale"
                                                                            data-id="{{ $pro->id }}" data-product_name="{{ $pro->product_name }}" data-toggle="modal"
                                                                            href="#modaldemo7" title="حذف"><i class="las la-trash"></i></a>

                                                                        </td>
                                                                    </tr>
                                                                        @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        {{-- add --}}
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">اضافة منتج</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                        <form action="{{route('products.store')}}" method="post">
                                                                        {{csrf_field()}}
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">اسم المنتج</label>
                                                                                <input type="text" class="form-control" id="product_name" name="product_name"  >

                                                                            </div>

                                                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                                                                            <select name="section_id" id="section_id" class="form-control" >
                                                                                <option value="" selected disabled> --حدد القسم--</option>
                                                                                @foreach ($section as $sec)
                                                                                    <option value="{{ $sec->id }}">{{ $sec->section_name }}</option>
                                                                                @endforeach
                                                                            </select>

                                                                            <div class="form-group">
                                                                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                                                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-success">تاكيد</button>
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

<!-- edit -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form action="products/update" method="post" autocomplete="off">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="id" id="id" value="">
                    <label for="recipient-name" class="col-form-label">اسم المنتج</label>
                    <input class="form-control" name="product_name" id="product_name" type="text">
                </div>
                <div class="form-group">
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                    <select name="section_name" id="section_name" class="form-control" >
                        @foreach ($section as $sec)
                            <option>{{ $sec->section_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">ملاحظات</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">تاكيد</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        </div>
        </form>
    </div>
</div>
</div>

<!-- delete -->
<div class="modal" id="modaldemo7">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="products/destroy" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>هل انت متاكد من عملية الحذف ؟</p><br>
                    <input type="hidden" name="id" id="id" value="">
                    <input class="form-control" name="product_name" id="product_name" type="text" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
        </div>
        </form>
    </div>
</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/div-->

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
{{-- js form edit --}}
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var product_name = button.data('product_name')
        var section_name = button.data('section_name')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #product_name').val(product_name);
        modal.find('.modal-body #section_name').val(section_name);
        modal.find('.modal-body #description').val(description);
    })
</script>
<script>
    $('#modaldemo7').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var product_name = button.data('product_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #product_name').val(product_name);
    })
</script>
@endsection
