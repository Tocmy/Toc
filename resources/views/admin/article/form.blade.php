<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                <a class="nav-link" id="option-tab" data-toggle="tab" href="#option" role="tab" aria-controls="option" aria-selected="option">
                    {{__('Option')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="related-tab" data-toggle="tab" href="#related" role="tab" aria-controls="related" aria-selected="related">
                    {{__('Related')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="seo">
                    {{__('Seo')}}
                </a>
            </li>


        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                @include('admin.article.tabs.general')
            </div>
            <div class="tab-pane fade" id="data" role="tabpanel" aria-labelledby="data-tab">
                @include('admin.article.tabs.data')
             </div>
             <div class="tab-pane fade" id="option" role="tabpanel" aria-labelledby="option-tab">
                @include('admin.article.tabs.option')
             </div>
             <div class="tab-pane fade" id="related" role="tabpanel" aria-labelledby="related-tab">
                @include('admin.article.tabs.related')
             </div>

            <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                @include('admin.article.tabs.meta')
            </div>


        </div>
    </div>
</div>
