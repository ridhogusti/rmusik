<ul class="pagination">
  <!-- Previous Page Link -->
  @if ($paginator->onFirstPage())
      {{-- <li class="disabled"><span>eou</span></li> --}}
      <li class="disabled">
        {{-- <a href="javascript:void(0);">
          <i class="material-icons">chevron_left</i>
        </a> --}}
      </li>
  @else
      {{-- <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">eou</a></li> --}}
      <li>
          {{-- <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="waves-effect">
              <i class="material-icons">chevron_left</i>
          </a> --}}
      </li>
  @endif

  <!-- Pagination Elements -->
  @foreach ($elements as $element)
      <!-- "Three Dots" Separator -->
      @if (is_string($element))
          <li class="disabled"><span>{{ $element }}</span></li>
      @endif

      <!-- Array Of Links -->
      @if (is_array($element))
          @foreach ($element as $page => $url)
              @if ($page == $paginator->currentPage())
                  {{-- <li class="active"><span>{{ $page }}</span></li> --}}
                  {{-- <li class="active"><a href="javascript:void(0);">{{ $page }}</a></li> --}}
              @else
                  {{-- <li class="active"><a href="javascript:void(0);">{{ $page }}{{ $paginator->currentPage() }}</a></li> --}}
                  {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                  {{-- <li><a href="{{ $url }}" class="waves-effect">{{ $page }}oue</a></li> --}}
              @endif
          @endforeach
      @endif
  @endforeach

  <!-- Next Page Link -->
  @if ($paginator->hasMorePages())
      {{-- <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li> --}}
      <li>
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="waves-effect">
          {{-- <i class="material-icons">chevron_right</i> --}}
          Lanjut
        </a>
                            {{-- {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Lanjut', ['class' => 'btn btn-primary pull-right']) !!} --}}

      </li>
  @else
    <li class="disabled">
      {{-- <a href="javascript:void(0);" class="waves-effect">
        <i class="material-icons">chevron_right</i>
        Lanjut
      </a>
                          {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Tambah', ['class' => 'btn bg-red btn-block btn-lg waves-effect']) !!} --}}

                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Lanjut', ['class' => 'btn btn-primary pull-right']) !!}
    </li>
      {{-- <li class="disabled"><span>&raquo;</span></li> --}}
  @endif
</ul>
