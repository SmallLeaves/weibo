<form action="{{route('statuses.store')}}" method="POST">
  @include('shared._errors')
  {{csrf_field()}}
  <textarea name="content" rows="3" class="form-control" placeholder="聊聊新鲜事...">{{old('content')}}</textarea>
  <div class="text-right">
    <button class="btn btn-primary mt-3" type="submit">发布</button>
  </div>
</form>
