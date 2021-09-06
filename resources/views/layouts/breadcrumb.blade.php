<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">


        <ol class="breadcrumb float-sm-right">
            @if(Breadcrumbs::has())
            @foreach (Breadcrumbs::current() as $crumbs)
                @if ($crumbs->url() && !$loop->last)
                    <li class="breadcrumb-item">
                        <a href="{{ $crumbs->url() }}">
                            {{ $crumbs->title() }}
                        </a>
                    </li>
                @else
                    <li class="breadcrumb-item active">
                        {{ $crumbs->title() }}
                    </li>
                @endif
            @endforeach
        @endif
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div>
