@extends('system.layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Pages </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            @foreach($languages as $language)
                                <th>Title ( {{$language->language}} )</th>
                            @endforeach
                            <th>URL</th>
                            <th>Active</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                            <tr>
                                @foreach($languages as $language)
                                        <td>
                                            @foreach($page->content->get('single') as $content)
                                                @if($content->lang_id == $language->id)
                                                    {{$content->title}}
                                                @endif
                                            @endforeach
                                        </td>
                                @endforeach
                                <td>{{$page->url}}</td>
                                <td>{{$page->active == 1 ? "Active":"Not Active"}}</td>
                                <td>
                                    <a href="{{route($routePrefix.'.edit',$page->id)}}" class="btn btn-info"> Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="deleteModalLabel"></h4>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
          {{Form::open(array('method'=>'DELETE', "id"=>"deleteForm"))}}
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-danger" id="delete-confirm-button" data-dismiss="modal">Delete</button>
          </div>
    
        </div>
      </div>
    </div>
    <!-- End of Delete Modal -->
@stop