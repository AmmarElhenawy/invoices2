@extends('layouts.master')
@section('css')
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

@if (session()->has('add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session()->get('add')}}</strong>
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
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i=0 ?>
                                                                    <?php $i++ ?>
                                                                    <tr>
                                                                        {{-- <td>{{$i}}</td> --}}<td>111</td>
                                                                        {{-- <td>{{hello}}</td> --}}<td>111</td>
                                                                        <td>2020-06-13</td>
                                                                        <td>111</td>
                                                                        {{-- @foreach ($section as $sec)
                                                                        <td>{{$sec->id}} </td>
                                                                        @endforeach --}}
                                                                    </tr>
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
                                                                                <input type="text" class="form-control" id="product_name" name="product_name" required >

                                                                            </div>

                                                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                                                                            <select name="section_id" id="section_id" class="form-control" required>
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
@endsection
