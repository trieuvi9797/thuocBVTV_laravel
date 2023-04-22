@extends('admin.layouts.app')

    
@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">

        @if (session('message'))
            <h4 class="text-primary">{{ session('message') }}</h4>
        @endif

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Danh sách</h1>
            </div>
            <div class="col-auto">
                 <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">						    
                            <a class="btn app-btn-primary" href="/admin/posts/create">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                  </svg>
                                Thêm mới
                            </a>
                        </div>
                    </div><!--//row-->
                </div><!--//table-utilities-->
            </div><!--//col-auto-->
        </div><!--//row-->
       
        <!--Tag all-->
        <div class="tab-content" id="orders-table-tab-content">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Hình ảnh</th>
                                    <th>Tác giả</th>
                                    <th>Ngày đăng</th>
                                    <th style="width: 22%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php  $stt = 1;  @endphp
                                @foreach ($posts as $item)
                                    <tr>
                                        <td>{{ $stt++; }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td><img src="{{ $item->image }}" width="80px" height="80px" alt=""></td>
                                        <td>{{ $item->author }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a class="btn btn-outline-info" href="/admin/posts/show/{{ $item->id }}">Chi tiết</a>
                                            <a class="btn btn-outline-warning" href="/admin/posts/edit/{{ $item->id }}">Sửa</a>
                                            <a class="btn btn-outline-danger" href="" onclick="removeRow({{ $item->id }},'/admin/posts/destroy')">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->                  
                </div><!--//app-card-body-->
            </div><!--//app-card-->
            <nav aria-label="Page navigation">
                {!!  $posts->links()  !!}
            </nav>           
        </div><!--//tab-content-->
    </div><!--//container-fluid-->
 
@endsection
@section('script')


@endsection
