@extends('layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y container-fluid">

        <div class="app-ecommerce">

            <form class="validation-form" novalidate method="post"
                action="{{ url('admin', ['com' => $com, 'act' => 'save', 'type' => $type], ['id' => $item['id'] ?? 0,'page'=>$page]) }}"
                enctype="multipart/form-data">

                @component('component.buttonAdd')
                @endcomponent

                {!! Flash::getMessages('admin') !!}

                <div class="row">

                    <div class="col-12 col-lg-8">
                        @if (!empty($configMan->categories->item->slug_categories))
                            @php
                                $slugchange = $act == 'edit' ? 1 : 0;
                                $item = !empty($item) ? $item : [];
                            @endphp
                            @component('component.slug', ['slugchange' => $slugchange, 'item' => $item])
                            @endcomponent
                        @endif

                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin {{ $configMan->categories->item->title_main_categories }}
                                </h3>
                            </div>
                            <div class="card-body card-article">
                                @component('component.content', [
                                    'name' => $configMan->categories->item->name_categories ?? false,
                                    'desc' => $configMan->categories->item->desc_categories ?? false,
                                    'desc_cke' => $configMan->categories->item->desc_cke_categories ?? false,
                                    'content' => $configMan->categories->item->content_categories ?? false,
                                    'content_cke' => $configMan->categories->item->content_cke_categories ?? false,
                                    'item' => $item,
                                ])
                                @endcomponent
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Danh mục</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="d-block" for="id_city">Tỉnh/Thành Phố:</label>
                                    {!! Func::getAjaxCategory('city', 'district', 'city', $type, 'Tỉnh/Thành Phố') !!}
                                </div>
                                <div class="form-group">
                                    <label class="d-block" for="id_district">Quận/Huyện:</label>
                                    {!! Func::getAjaxCategory('district', 'ward', 'district', $type, 'Quận/Huyện') !!}
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            @component('component.tinhtrang', [
                                'item' => $item ?? [],
                                'status' => $configMan->categories->item->status_categories ?? [],
                                'stt' => true,
                            ])
                            @endcomponent
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id"
                    value="<?= !empty($item['id']) && $item['id'] > 0 ? $item['id'] : '' ?>">
                <input name="csrf_token" type="hidden" value="{{ csrf_token() }}">

                @component('component.buttonAdd')
                @endcomponent

            </form>
        </div>
    </div>
@endsection
