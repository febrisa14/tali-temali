@extends('components/backend/app')

@section('content')

<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Data Hasil Quiz
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="link-fx" href="{{ route('admin.quiz.index') }}">Quiz</a></li>
                        <li class="breadcrumb-item" aria-current="page">Hasil Quiz</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">

        <!-- Dynamic Table Full Pagination -->
        <div class="block block-rounded">
            <div class="block-header border-bottom">
                <h3 class="block-title"><small>List Data</small> Hasil Quiz <small>dari</small> Quiz {{$quiz->quiz_name}}</h3>
                    <a data-id="{{route('admin.quiz.hasil',['id' => $quiz->quiz_id])}}"></a>
            </div>

            <!-- All Orders -->
            <div class="block-content block-content-full">
                    <!-- All Orders Table -->
                    <div class="table-responsive">
                        <table width="100%" id="table-quiz" class="table js-dataTable-full-pagination table-hover table-borderless table-vcenter">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Anggota</th>
                                    <th>Hasil Quiz</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach($quizes as $key=>$quiz)
                                <tr>
                                    <td class="text-center font-size-sm">
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center font-size-sm">27/01/2020</td>
                                    <td>
                                        <span class="badge badge-warning">Processing</span>
                                    </td>
                                    <td class="d-none d-xl-table-cell font-size-sm">
                                        <a class="font-w600" href="be_pages_ecom_customer.html">Wayne Garcia</a>
                                    </td>
                                    <td class="d-none d-xl-table-cell text-center font-size-sm">
                                        <a class="font-w600" href="be_pages_ecom_order.html">1</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-right font-size-sm">
                                        <strong>$354,31</strong>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-fw fa-times text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center font-size-sm">
                                        <a class="font-w600" href="be_pages_ecom_order.html">
                                            <strong>ORD.00947</strong>
                                        </a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center font-size-sm">23/08/2020</td>
                                    <td>
                                        <span class="badge badge-info">For delivery</span>
                                    </td>
                                    <td class="d-none d-xl-table-cell font-size-sm">
                                        <a class="font-w600" href="be_pages_ecom_customer.html">Jack Greene</a>
                                    </td>
                                    <td class="d-none d-xl-table-cell text-center font-size-sm">
                                        <a class="font-w600" href="be_pages_ecom_order.html">8</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-right font-size-sm">
                                        <strong>$412,76</strong>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-alt-secondary" href="be_pages_ecom_order.html" data-toggle="tooltip" title="View">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-fw fa-times text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody> --}}
                        </table>
                    </div>
                    <!-- END All Orders Table -->
                </div>
            </div>
            <!-- END All Orders -->
        </div>
        <!-- END Dynamic Table Full Pagination -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@stop

@push('scripts')

<!-- Script Success SweetAlert2 -->
@if (Session::has('success'))
<script>
    Swal.fire('Success', '{{Session::get('success')}}' ,'success');
</script>
@endif

<script>

$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        var url= $('a').attr('data-id');
        $('#table-quiz').DataTable({
            processing: true,
            serverSide: true,
            autowidth: true,
            columnDefs: [
                {targets: 0, className: "text-center"},
                {targets: 1, className: "text-center"},
                {targets: 2, className: "text-center"},
                // {targets: 3, className: "text-center"},
            ],
            ajax: {
                url: url,
            },
            columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'total_mark', name: 'total_mark'},
                //   {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

    // $(document).on('click', '.delete', function (){
    //     var id = $(this).data("id");
    //     Swal.fire({
    //         title: 'Hapus Data Pertanyaan?',
    //         text: 'Klik "Iya" untuk menghapus data',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#d33',
    //         cancelButtonColor: '#3085d6',
    //         confirmButtonText: 'Iya',
    //         cancelButtonText: 'Tidak'
    //     }).then((result) => {
    //         if(result.isConfirmed){
    //             $.ajax({
    //                 type: "delete",
    //                 dataType: 'json',
    //                 url: "{{ route('admin.question.destroy','') }}/"+id,
    //                 success: function (data) {
    //                     if (data.success == true)
    //                     {
    //                         Swal.fire('Deleted', data.message ,'success');
    //                     }
    //                     else if (data.success == false)
    //                     {
    //                         Swal.fire('Gagal', data.message ,'error');
    //                     }
    //                     var table = $('#table-question').DataTable();
    //                     table.draw();
    //                     location.reload();
    //                     }
    //             });
    //         }
    //         // else {
    //         //     Swal.fire('Batal','Batal Menghapus Data Pengurus','error')
    //         // }
    //     });
    // });

});

</script>
@endpush
