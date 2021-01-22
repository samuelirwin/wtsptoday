@extends('layouts.admin')
@section('content')
@can('mobile_number_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.mobile_numbers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.mobile_number.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.mobile_number.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mobile_number.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.mobile_number.fields.mobile_no_without_plus') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mobile_numbers as $mobile_number)
                        <tr data-entry-id="{{ $mobile_number->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $mobile_number->id ?? '' }}
                            </td>
                            <td>
                                {{ $mobile_number->mobile_no_without_plus ?? '' }}
                            </td>
                            <td>
                                @can('mobile_number_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.mobile_numbers.show', $mobile_number->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('mobile_number_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.mobile_numbers.edit', $mobile_number->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('mobile_number_delete')
                                    <form action="{{ route('admin.mobile_numbers.destroy', $mobile_number->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('link_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.links.massDestroy') }}",
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
  $('.datatable-Product:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endsection