@extends('layouts.admin')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Products</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
      </div>
  </section>
  <!-- Main content -->
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("vendor.products.create") }}">
                Add New Product
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive" >
            <table style="width: 100%;" class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                            Product Name
                        </th>
                        <th>
                        Product Category
                        </th>
                        <th>
                            Selling Price
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.photo') }}
                        </th>

                        <th>
                            Quantity
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr data-entry-id="{{ $product->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $product->id ?? '' }}
                            </td>
                            <td>
                                {{ $product->name ?? '' }}
                            </td>
                            
                            <td>
                            <span class="badge badge-info">{{ $product->category->name  ?? ''  }}</span>
                                
                            </td>
                            <td>
                                ${{ $product->selling_price ?? '' }}
                            </td>
                            <td>
                            @if($product->photo)
                                    <a href="{{ $product->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $product->photo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{$product->quantity}}
                            </td>
                            <td>
                                @can('product_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('vendor.products.show', $product->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('product_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('vendor.products.edit', $product->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('product_delete')
                                    <form action="{{ route('vendor.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
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
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection