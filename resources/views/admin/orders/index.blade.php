@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Orders List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Payment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.id') }}
                        </th>
                        <th>
                            Order No
                        </th>
                        <th>
                            Order Total Amount
                        </th>
                        <th>
                            Payment Mode
                        </th>
                        
                        <th>
                       Order Status Message
                        </th>
                        <th>
                            Order Placed Date
                        </th>
                        <th>
                            Action Available
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $order)
                        <tr data-entry-id="{{ $order->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $order->id ?? '' }}
                            </td>
                            <td>
                                {{ $order->tracking_no ?? '' }}
                            </td>
                            <td>
                                ${{ $order->total_amount }} 
                            </td>
                            <td>
                            {{ $order->payment_mode ?? '' }} 

                            </td>
                            <td>
                            {{ $order->status_message ?? '' }}
                            </td>
                           
                            <td>
                            {{ $order->created_at->format('d M Y') ?? '' }}
                            </td>
                            <td>
                                @can('order_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.orders.show', $order->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                             
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  $('.datatable-Payment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
