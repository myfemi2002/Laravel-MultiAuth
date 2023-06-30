@extends('admin.admin_master')
@section('title', 'Category')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    @include('admin.body.breadcrumb')
    <!--end breadcrumb-->
    <div class="card">
        <div class="border-bottom px-4 py-2">
            <a href="{{ route('category.add') }}" class="btn btn-rounded btn-primary" style="float: right;"><i class="fa fa-plus-circle"></i> Add Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Image</th>
                            <th scope="col">Date of Creation</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $key => $item)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $item->category_name }}</td>
                            <td>
                                @if($item->category_image == NULL)<span class="text-danger">No Image</span>
                                @else
                                <img src=" {{ asset($item->category_image) }}" alt="Blank Image" style="height:40px; width:70px">
                                @endif
                            </td>
                            <td>
                                @if($item->created_at == NULL)<span class="text-danger">No Date Set</span>
                                @else
                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-primary btn-rounded btn-sm text-white mb-1" title="Edit Data" > <i class="fa fa-edit"></i></a>
                                <a href="{{ route('category.delete', $item->id) }}"  class="btn btn-danger btn-rounded btn-sm mb-1"  id="delete" title="Delete Data" > <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination mt-3"  style="float: right;">
                    <ul class="pagination-list">
                        {{ $allData->Links('pagination::bootstrap-4') }}
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection
