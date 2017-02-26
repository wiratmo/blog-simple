<center>
    <button type="button" class="btn {{$buttonType}}" data-toggle="modal" data-target="#{{$modalTarget}}">
        <i class="fa {{$iconType}}"></i> {{$buttonName}}
    </button>
  </center>
  <div class="modal fade" id="{{$modalTarget}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{$modalTitle}}</h4>
        </div>
        <form class="form" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
          <div class="modal-body">
          <!-- start content -->
            <ul class="nav nav-tabs centered">
              <li class="active"><a data-toggle="tab" href="#article">Content</a></li>
              <li><a data-toggle="tab" href="#meta">Meta</a></li>
            </ul>
            <div class="tab-content">
              <div id="article" class="tab-pane fade in active">
                @include('layouts.form.text', ['type' => 'create','nameInput' => 'title','inputDescription' => 'title of article','required' =>1])
                @include('layouts.form.text', ['type' => 'create','nameInput' => 'keyword','inputDescription' => 'keywoard of article','required' =>1])
                @include('layouts.form.textarea', ['type' => 'create','nameInput' => 'description','inputDescription' => 'discription of article','required' =>0])
              </div>
              <div id="meta" class="tab-pane fade">
                @include('layouts.form.summernote', ['type' => 'create','nameInput' => 'content','inputDescription' => 'content of article','required' =>1])
              </div>
            </div>
            <!-- end content -->
            
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>  
    </div>
  </div>