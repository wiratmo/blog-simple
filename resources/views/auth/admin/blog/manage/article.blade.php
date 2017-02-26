@extends('layouts.admin.index')
@push('style')
<link rel="stylesheet" type="text/css" href="{{url('assets/select2/dist/css/select2.min.css')}}">
@endpush
@section('main')
<div class="x_panel">
  @if($type == 'create')
   <form method="POST" action="{{route('manage.blog.store')}}" enctype="multipart/form-data">
  @elseif($type == 'edit')
	 <form method="POST" action="{{route('manage.blog.update', ['id' => $id])}}" enctype="multipart/form-data">
  @endif
  {{ csrf_field() }}
		<ul class="nav nav-tabs centered">
              <li class="active"><a data-toggle="tab" href="#article">Content</a></li>
              <li><a data-toggle="tab" href="#meta">Meta</a></li>
            </ul>
            @if($type == 'create')
            <div class="tab-content">
              <div id="article" class="tab-pane fade in active">
              <!-- title -->
                @include('layouts.form.text', ['nameInput' => 'title','inputDescription' => 'title of article','required' =>1])
                <!-- tag -->
                @include('layouts.form.select2', ['nameInput' => 'tag[]','inputDescription' => 'tags of article','values' => $tags ])
                <!-- category -->
                @include('layouts.form.select2', ['nameInput' => 'category[]','inputDescription' => 'categories of article','values' => $categories ])
                <!-- header image -->
                @include('layouts.form.file', ['nameInput' => 'header','inputDescription' => 'header image of article'])
                <!-- keyword -->
                @include('layouts.form.text', ['nameInput' => 'keyword','inputDescription' => 'keywoard of article','required' =>1])
                <!-- description -->
                @include('layouts.form.textarea', ['nameInput' => 'description','inputDescription' => 'discription of article','required' =>0])
              </div>
              <div id="meta" class="tab-pane fade">
                @include('layouts.form.summernote', ['nameInput' => 'content','inputDescription' => 'content of article','required' =>1])
              </div>
            </div>
            @elseif($type == 'edit')
            <input type="hidden" name="id" value="{{$values->id}}">
            <div class="tab-content">
              <div id="article" class="tab-pane fade in active">
              <!-- title -->
                @include('layouts.form.text', ['nameInput' => 'title','inputDescription' => 'title of article','required' =>1, 'value'=> $values->title])
                <!-- tag -->
                @include('layouts.form.select2', ['type' => $type,'nameInput' => 'tag[]','inputDescription' => 'tags of article','values' => $tags, 'selects' =>$values->tags ])
                <!-- category -->
                @include('layouts.form.select2', ['type' => $type, 'nameInput' => 'category[]','inputDescription' => 'categories of article','values' => $categories, 'selects' => $values->categories ])
                <!-- header image -->
                @include('layouts.form.file', ['nameInput' => 'header','inputDescription' => 'header image of article', 'value' =>$values->header])
                <!-- keyword -->
                @include('layouts.form.text', ['nameInput' => 'keyword','inputDescription' => 'keywoard of article','required' =>1, 'value' =>$values->keyword])
                <!-- description -->
                @include('layouts.form.textarea', ['nameInput' => 'description','inputDescription' => 'discription of article','required' =>0, 'value' =>$values->description])
              </div>
              <div id="meta" class="tab-pane fade">
                @include('layouts.form.summernote', ['nameInput' => 'content','inputDescription' => 'content of article','required' =>1, 'value' =>$values->content])
              </div>
            </div>
            @endif
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
	</form>
</div>
@endsection
@push('script')
<script type="text/javascript" src="{{url('assets/select2/dist/js/select2.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".tokenizationSelect2").select2({
      placeholder: "Your favourite car", //placeholder
      tags: true,
      tokenSeparators: ['/',',',';'," "] 
    });
  })
</script>
@endpush