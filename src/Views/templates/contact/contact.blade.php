@extends('layout')
@section('content')
<section>
    <div class="wrap-content py-3">
        <div class="title-detail">
            <h1>{{$titleMain}}</h1>
        </div>
        <div class="content-main">
            <div class="contact-article row">
                <div class="title-detail">
                    <h1>{{$contact['name' . $lang] }}</h1>
                </div> 
                <div class="contact-text col-lg-6">{!! Func::decodeHtmlChars($contact['content' . $lang] ?? '') !!}</div>
                <form id="form-contact" class="contact-form validation-contact col-lg-6" novalidate method="post"
                    action="{{ url('lien-he-post') }}" enctype="multipart/form-data">
                    <div class="row-20 row">
                        <div class="contact-input col-sm-6 col-20 mb-3">
                            <div class="form-floating form-floating-cus">
                                <input type="text" name="dataContact[fullname]" class="form-control text-sm"
                                    id="fullname-contact" placeholder="Họ và tên" value="" required>
                                <label for="fullname-contact">Họ và tên</label>
                            </div>
                            <div class="invalid-feedback">Vui lòng nhập họ tên</div>
                        </div>
                        <div class="contact-input col-sm-6 col-20 mb-3">
                            <div class="form-floating form-floating-cus">
                                <input type="number" name="dataContact[phone]" class="form-control text-sm"
                                    id="phone-contact" placeholder="Điện thoại" value="" required>
                                <label for="phone-contact">Điện thoại</label>
                            </div>
                            <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                        </div>
                        <div class="contact-input col-sm-6 col-20 mb-3">
                            <div class="form-floating form-floating-cus">
                                <input type="text" class="form-control text-sm" id="address-contact"
                                    name="dataContact[address]" placeholder="Địa chỉ" value="" required>
                                <label for="address-contact">Địa chỉ</label>
                            </div>
                            <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
                        </div>
                        <div class="contact-input col-sm-6 col-20 mb-3">
                            <div class="form-floating form-floating-cus">
                                <input type="email" class="form-control text-sm" id="email-contact"
                                    name="dataContact[email]" placeholder="Email" value="" required>
                                <label for="email-contact">Email</label>
                            </div>
                            <div class="invalid-feedback">Vui lòng nhập email</div>
                        </div>
                    </div>
                    <div class="contact-input mb-3">
                        <div class="form-floating form-floating-cus">
                            <input type="text" class="form-control text-sm" id="subject-contact"
                                name="dataContact[subject]" placeholder="Tiêu đề" value="" required>
                            <label for="subject-contact">Tiêu đề</label>
                        </div>
                        <div class="invalid-feedback">Vui lòng nhập tiêu đề</div>
                    </div>
                    <div class="contact-input mb-3">
                        <div class="form-floating form-floating-cus">
                            <textarea class="form-control text-sm" id="content-contact" name="dataContact[content]"
                                placeholder="Nội dung" required></textarea>
                            <label for="content-contact">Nội dung</label>
                        </div>
                        <div class="invalid-feedback">Vui lòng nhập nội dung</div>
                    </div>
                    <input type="hidden" name="dataContact[type]" value="lien-he" />
                    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary mr-2" name="submit-contact" value="Gửi" />
                    <input type="reset" class="btn btn-secondary" value="Nhập lại" />
                    <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
                </form>
            </div>
            <div class="contact-map py-3">{!! Func::decodeHtmlChars($optSetting['coords_iframe'] ?? '') !!}</div>
        </div>
    </div>
</section>
@endsection