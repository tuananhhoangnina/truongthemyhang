<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\Controllers\Web;
use NINACORE\Controllers\Controller;
use Illuminate\Http\Request;
use NINACORE\Core\Support\Facades\BreadCrumbs;
use NINACORE\Core\Support\Facades\View;
use NINACORE\Core\Support\Facades\Func;
use NINACORE\Core\Support\Facades\Email;
use NINACORE\Core\Support\Facades\Seo;
use NINACORE\Models\NewslettersModel;
use NINACORE\Models\StaticModel;
use NINACORE\Traits\TraitSave;
use Validator;

class ContactController extends  Controller
{
    use TraitSave;
    public function index(Request $request)
    {
        $contact = StaticModel::where('type', 'lien-he')
            ->first();
        $seoPage = $contact?->getSeo('static', 'save')->first();
        $seoPage['type'] = 'article';
        $titleMain =  $this->infoSeo('static', $this->type, 'title');
        BreadCrumbs::setBreadcrumb(type: $this->type, title: $titleMain);
        Seo::setSeoData($seoPage, 'news');
        return View::share(['com' => $this->type])->view('contact.contact', ['contact' => $contact, 'titleMain' => $titleMain]);
    }
    public function submit(Request $request)
    {
        $responseCaptcha = $request->recaptcha_response_contact;
        $resultCaptcha = Func::checkRecaptcha($responseCaptcha);
        $scoreCaptcha = (!empty($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
        $actionCaptcha = (!empty($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
        $testCaptcha = (!empty($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;

        $dataContact = (!empty($request->dataContact)) ? $request->dataContact : null;

        if (($scoreCaptcha >= 0.5 && $actionCaptcha == 'contact') || $testCaptcha == true) {
            foreach ($dataContact as $column => $value) {
                $data[$column] = htmlspecialchars(Func::sanitize($value));
            }

            $data['confirm_status'] = 1;
            $data['status'] = '1';
            $data['date_created'] = time();
            $itemSave = NewslettersModel::create($data);
            if (!empty($itemSave)) {
                $id_insert = $itemSave->id;
                $file = $request->file('file');
                $this->insertImge(NewslettersModel::class, $request, $file, $id_insert, 'file', 'file_attach');

                $arrayEmail = null;
                $subject = (!empty($dataContact['subject'])) ? $dataContact['subject'] : 'Thư liên hệ khách hàng';
                $message = Email::markdown('contact.send', $dataContact);
                $optCompany = json_decode(Func::setting('options'), true);
                $company = Func::setting();
                $file = 'file';

                if (Email::send("admin", $arrayEmail, $subject, $message, $file, $optCompany, $company)) {
                    $arrayEmail = array(
                        "dataEmail" => array(
                            "name" => $dataContact['fullname'],
                            "email" => $dataContact['email']
                        )
                    );

                    Email::send("customer", $arrayEmail, $subject, $message, $file, $optCompany, $company);
                    return transfer('Thông tin liên hệ được gửi thành công.', true, linkReferer());
                } else {
                    return transfer('Thông tin liên hệ được gửi thất bại.', false, linkReferer());
                }
            } else {
                return transfer('Thông tin liên hệ được gửi thất bại.', false, linkReferer());
            }
        } else {
            return transfer('Thông tin liên hệ được gửi thất bại.', false, linkReferer());
        }
    }
}
