<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>

                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{$item->title}}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Стаття</label>
                            <textarea class="form-control" name="description" id="content_raw" rows="20">{{ old('content_raw',$item->description) }}
                            </textarea>
                        </div>
                        <input name="user_id" type="text" value="{{\Illuminate\Support\Facades\Auth::id()}}" hidden>
                    </div>
                        <div class="form-group">
                            <label for="img">Картинка</label>
                            <textarea name="image" id="image" rows="3" class="form-control" placeholder="Вставте URL адрес картинки">

                            </textarea>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
