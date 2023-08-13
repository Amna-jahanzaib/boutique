@extends('layouts.admin')
@section('content')
<section class="content-header">
      <div class="row mb-2">
        <div class="col-sm-6">
        <h3>All Categories</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('vendor.categories.index')}}">Categories</a></li>
            <li class="breadcrumb-item active">Categories</li>
          </ol>
        </div>
      </div>
  </section>
  <!-- Main content -->

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("vendor.categories.create") }}">
                {{ trans('global.add') }} Categories
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive" style="width: 100%!important;">
            <table style="width: 100%!important;" class=" table-responsive table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead style="width: 100%!important;">
                    <tr>
                        <th >

                        </th>
                        <th>Category id
                        </th>
                        <th>
                            Category Title
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($categories as $key => $category)
                        <tr data-entry-id="{{ $category->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $category->id ?? '' }}
                            </td>
                            <td>
                                {{ $category->name ?? '' }}
                            </td>
                            <td>
                                @can('category_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('vendor.category.show', $category->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('category_show')
                                    <a class="btn btn-xs btn-info" href="{{ route('vendor.categories.edit', $category->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('category_show')
                                    <form action="{{ route('vendor.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('permission_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.permissions.massDestroy') }}",
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
  $('.datatable-Permission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable({responsive: true})
            .columns.adjust();
    });
})

</script>
@endsection