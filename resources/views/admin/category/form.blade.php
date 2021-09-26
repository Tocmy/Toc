<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul class="nav nav-tabs" id="categoryTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">
                    {{__('General')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="data">
                    {{__('Data')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="meta-tab" data-toggle="tab" href="#meta" role="tab" aria-controls="meta" aria-selected="meta">
                    {{__('Meta Tag')}}
                </a>
            </li>


        </ul>
        <div class="tab-content" id="categoryContent">
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                @include('admin.category.tabs.general')
            </div>
            <div class="tab-pane fade" id="data" role="tabpanel" aria-labelledby="data-tab">
               @include('admin.category.tabs.data')
            </div>
            <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
                @include('admin.category.tabs.metatag')
            </div>

        </div>
    </div>
</div>
