@push('style')
    <link rel="stylesheet" href="/assets/css/form.css">
@endpush
    <div class="form-group">
        <label for="" class="form-label"> Judul</label>
        <input type="text" name="title"  class="form-control" value="{{$id ? $id->title : ''}}">
    </div>
    <div class="form-group">
        <label for="" class="form-label">Post</label>
        <textarea name="question" cols="30" rows="10" class="form-control">{{$id ? $id->question : ''}}</textarea>
    </div>
    <button type="submit" class="btn-login">Continue</button>
