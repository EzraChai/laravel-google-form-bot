<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('home',compact('user'));
    }

    public function store(Request $request){

        $validated = $request -> validate([
            'subject' => ['required','string'],
        ]);

        $user = auth()-> user();
        $currentClass = $user -> school_class;
        $currentForm = 'TINGKATAN '. substr($user -> school_class,0,1);
        $pageHistoryCode = null;

            switch ($currentClass){
                case "4 BAIDURI":
                    $pageHistoryCode = 33;
                    break;
                case "4 BERLIAN":
                    $pageHistoryCode = 34;
                    break;
                case "4 DELIMA":
                    $pageHistoryCode = 35;
                    break;
            }
            if(!$pageHistoryCode) {
                return redirect('home')-> with('fail',"Can't find your class.");
            }


        $subject = $validated['subject'];

        switch ($subject){
            case "BC":
                $subject = "BAHASA CINA";
                break;
            case "BM":
                $subject = "BAHASA MELAYU";
                break;
            case "BI":
                $subject = "BAHASA INGGERIS";
                break;
            case "MA":
                $subject = "MATEMATIK";
                break;
            case "MT":
                $subject = "MATEMATIK TAMBAHAN";
                break;
            case "BIO":
                $subject = "BIOLOGI";
                break;
            case "FIZ":
                $subject = "FIZIK";
                break;
            case "KIM":
                $subject = "KIMIA";
                break;
            case "PK":
                $subject = "PENDIDIKAN JASMANI & KESIHATAN";
                break;
            case "BJ":
                $subject = "BAHASA JEPUN";
                break;
            case "BT":
                $subject = "BAHASA TAMIL";
                break;
            case "KBT":
                $subject = "KESUSASTERAAN BAHASA TAMIL";
                break;
            case "SJ":
                $subject = "SEJARAH";
                break;
            case "SK":
                $subject = "SAINS KOMPUTER";
                break;
            case "SN":
                $subject = "SAINS";
                break;
            case "PM":
                $subject = "PENDIDIKAN MORAL";
                break;
            case "PP":
                $subject = "PRINSIP PERAKAUNAN";
                break;
                default:
                    $subject = 'ERROR';
        }

        if($subject == 'ERROR'){
            return redirect('home')-> with('fail',"Can't find your subject.");
        }


        $date = new DateTime("now", new DateTimeZone('Asia/Kuala_Lumpur') );
        $year = $date-> format('Y');
        $month = $date-> format('m');
        $day = $date-> format('d');


        $client = new Client(['base_uri' => 'https://docs.google.com']);

        try {
            $response = $client->request('POST', '/forms/u/1/d/e/1FAIpQLSeRpuWL1hTLilGH2E5Bz39BuQcZ9qCTHBBauwfmVFkWsok0QA/formResponse',[
                'form_params' => [
                    'entry.1222343424_year' => $year,
                    'entry.1222343424_month' => $month,
                    'entry.1222343424_day' => $day,
                    'entry.838936141' => $subject,
                    'entry.905981787' => $currentForm,
                    'entry.2081836409' => $currentClass,
                    'entry.196736217' => $user -> name,
                    'pageHistory' => "0,1,6,". $pageHistoryCode
                ]
            ]);
        }catch (\Exception $e){
            return redirect('home')-> with('fail',"Can't find your name.");
        }

        if ($response -> getStatusCode() == 200){
            return redirect('home')-> with('success',"You've submitted the form.");
        }else{
            return redirect('home')-> with('fail',"You've failed to submit the form.");
        }
    }
}
