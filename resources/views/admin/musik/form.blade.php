      <div class="rows">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 no-padding">
            <blockquote class="f-15 bor-color-magenta ">ID Amazon</blockquote>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            {!! Form::text('amazon_id', null, ['class' => 'form-control', 'placeholder'=>"Masukan Judul Lagu"]) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
          </div>
        </div>
      </div><div class="rows">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 no-padding">
            <blockquote class="f-15 bor-color-magenta ">Judul Lagu</blockquote>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>"Masukan Judul Lagu"]) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
          </div>
        </div>
      </div>
      <div class="rows">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 no-padding">
            <blockquote class="f-15 bor-color-magenta ">Nama Artis</blockquote>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            {!! Form::text('artist', null, ['class' => 'form-control', 'placeholder'=>"Masukan Judul Lagu"]) !!}
          </div>
        </div>
      </div>
      <div class="rows">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 no-padding">
            <blockquote class="f-15 bor-color-magenta ">Genre</blockquote>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            {!! Form::text('root_genre', null, ['class' => 'form-control', 'placeholder'=>"Masukan Judul Lagu"]) !!}
          </div>
        </div>
      </div>
      <div class="rows">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 no-padding">
            <blockquote class="f-15 bor-color-magenta ">Tahun</blockquote>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            {!! Form::text('first_release_year', null, ['class' => 'form-control', 'placeholder'=>"Masukan Judul Lagu"]) !!}
          </div>
        </div>
      </div>
      <div class="rows">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 no-padding">
            <blockquote class="f-15 bor-color-magenta ">Label</blockquote>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            {!! Form::text('label', null, ['class' => 'form-control', 'placeholder'=>"Masukan Judul Lagu"]) !!}
          </div>
        </div>
      </div>
      <div class="rows">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 no-padding">
            <blockquote class="f-15 bor-color-magenta ">Cover</blockquote>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
            {!! Form::text('imUrl', null, ['class' => 'form-control', 'placeholder'=>"Masukan Judul Lagu"]) !!}
          </div>
        </div>
      </div>
      <div class="rows">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
          {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Tambah', ['class' => 'btn btn-primary col-lg-3 col-md-3 col-sm-12 col-xs-12 mar-2']) !!}
          <a href="{{ url('/adminn/beritas') }}" title="Back" class="btn bg-red btn-lg waves-effect"> Kembali</a>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12  padding">
      <div class="img-cover-add ">
        <img id="preview-image" src="#" alt="" class="img-cover-prev">
      </div>
    </div>
  </div>
</div>


  
  
  
