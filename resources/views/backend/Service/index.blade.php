@extends('backend.layouts.site')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
    @include('backend.layouts.message')

    <div class="col-12 text-center">
        <h1 class="text-primary">Service hizmatlar</h1>
    </div>

    <div class="col-12 text-right">
        <a href="{{ route('services.create') }}" class="btn btn-success btn-sm mb-1">Qo'shish</a>
    </div>

    <div class="col-12">
        <table id="myTable" class="display table-bordered table-hover table-sm text-center">
            <thead>
                <th>№</th>
                <th>Table nomi</th>
                <th>Icon nomi</th>
                <th>Amallar</th>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->icon_name }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button"
                                class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light"
                                data-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-more-vertical">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{route('services.show', $service->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye  mr-50">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <span>Batafsil</span>
                                </a>
                                <a class="dropdown-item" href="{{route('services.edit', $service->id)}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                    <span>O'zgartirish</span>
                                </a>
                                <a class="dropdown-item" href="{{route('services.destroy', $service->id)}}"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{$service->id}}').submit();">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-50">
                                         <polyline points="3 6 5 6 21 6"></polyline>
                                         <path d="M19 6l-2 14H7L5 6"></path>
                                         <path d="M10 11v6"></path>
                                         <path d="M14 11v6"></path>
                                     </svg>
                                     <span>O'chirish</span>
                                 </a>

                                 <form id="delete-form-{{$service->id}}" action="{{route('services.destroy', $service->id)}}" method="POST" style="display: none;">
                                     @csrf
                                     @method('DELETE')
                                 </form>

                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
    </div>
@endsection

@section('js')
<script src="{{asset('backend/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

</script>
@endsection
