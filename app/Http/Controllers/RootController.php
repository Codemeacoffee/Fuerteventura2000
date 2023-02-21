<?php

namespace Fuerteventura2000\Http\Controllers;

use Fuerteventura2000\Possible_Answer;
use Fuerteventura2000\Question;
use Fuerteventura2000\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Fuerteventura2000\Contact;
use Fuerteventura2000\News;
use Fuerteventura2000\Newsletter;
use Fuerteventura2000\Office;
use Fuerteventura2000\Page;
use Fuerteventura2000\Partner;
use Fuerteventura2000\Professional_Departure;
use Fuerteventura2000\Subscriber;
use Fuerteventura2000\Course;
use Fuerteventura2000\Course_Module;
use Fuerteventura2000\Image;
use Fuerteventura2000\Module;
use Fuerteventura2000\Module_Unit;
use Fuerteventura2000\Unit;
use DateTime;
use Exception;

class RootController extends Controller
{

    function index(){
        return view('index')
            ->with('courses', $this->getOrderedCourses(4))
            ->with('news', $this->getOrderedNews(3))
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('indexTexts', $this->getTexts('index'))
            ->with('partners', Partner::all())
            ->with('page', 'index');
    }

    function getCourses($location = null, $type = null, $name = null){
        if(!$location) return redirect('courses/Fuerteventura');

        $location = htmlspecialchars($location);

        if (!$type && !$name){
            $courses = Course::where('display', 1)->where('location', $location)->get();

            $amountOfPages = Ceil(Count($courses) / 6);

            if(isset($_GET['page']) && ($_GET['page']) > 1 && ($_GET['page']) <= $amountOfPages){
                $initial = (($_GET['page'] - 1) * 6);
                $courses = $this->getOrderedCourses(6, $location, null, null, null, $initial);
            }
            else if(isset($_GET['page'])) return redirect('courses');
            else $courses = $this->getOrderedCourses(6, $location);

            $coursesList = $this->getOrderedCourses(null, $location);

            return view('courses')
                ->with('location', $location)
                ->with('courses', $courses)
                ->with('coursesList', $coursesList)
                ->with('filter', 0)
                ->with('amountOfPages', $amountOfPages)
                ->with('news', $this->getOrderedNews(3))
                ->with('genericTexts', $this->getTexts('generic'))
                ->with('coursesTexts', $this->getTexts('courses'))
                ->with('partners', Partner::all())
                ->with('page', 'courses');

        } else if (!$name){

            $type = htmlspecialchars($type);

            switch ($type){
                case 'Desempleados':
                    $courses =
                        Course::where('display', 1)
                        ->where('location', $location)
                            ->where('type', 'Gratuito')
                            ->where(function ($query) {
                                $query->where('receiver', 'Desempleados/as')
                                    ->orWhere('receiver', 'Desempleados/as y Trabajadores/as');
                            })
                            ->get();

                    $amountOfPages = Ceil(Count($courses) / 6);

                    $filter = 1;

                    if(isset($_GET['page']) && ($_GET['page']) > 1 && ($_GET['page']) <= $amountOfPages){
                        $initial = (($_GET['page'] - 1) * 6) - 1;
                        $courses = $this->getOrderedCourses(6, $location, 'Gratuito', 'Desempleados/as', null, $initial);
                    }
                    else if(isset($_GET['page'])) return redirect('courses');
                    else $courses = $this->getOrderedCourses(6, $location, 'Gratuito', 'Desempleados/as');

                    $coursesList = $this->getOrderedCourses(null, $location, 'Gratuito', 'Desempleados/as');

                    break;
                case 'Trabajadores':
                    $courses =
                        Course::where('display', 1)
                            ->where('location', $location)
                            ->where('type', 'Gratuito')
                            ->where(function ($query) {
                                $query->where('receiver', 'Trabajadores/as')
                                    ->orWhere('receiver', 'Desempleados/as y Trabajadores/as');
                            })
                            ->get();

                    $amountOfPages = Ceil(Count($courses) / 6);

                    $filter = 2;

                    if(isset($_GET['page']) && ($_GET['page']) > 1 && ($_GET['page']) <= $amountOfPages){
                        $initial = (($_GET['page'] - 1) * 6) - 1;
                        $courses = $this->getOrderedCourses(6, $location, 'Gratuito', 'Trabajadores/as', null, $initial);
                    }
                    else if(isset($_GET['page'])) return redirect('courses/'.$location.'/'.$type);
                    else $courses = $this->getOrderedCourses(6, $location, 'Gratuito', 'Trabajadores/as');

                    $coursesList = $this->getOrderedCourses(null, $location, 'Gratuito', 'Trabajadores/as');

                    break;
                case 'Privado':
                    $courses = Course::where('display', 1)->where('location', $location)->where('type', $type)->get();

                    $amountOfPages = Ceil(Count($courses) / 6);

                    $filter = 3;

                    if(isset($_GET['page']) && ($_GET['page']) > 1 && ($_GET['page']) <= $amountOfPages){
                        $initial = (($_GET['page'] - 1) * 6) - 1;
                        $courses = $this->getOrderedCourses(6, $location, $type, null, null, $initial);
                    }
                    else if(isset($_GET['page'])) return redirect('courses/'.$location.'/'.$type);
                    else $courses = $this->getOrderedCourses(6, $location, $type);

                    $coursesList = $this->getOrderedCourses(null, $location, $type);

                    break;
                case 'Teleformación':
                    $courses = Course::where('display', 1)->where('location', $location)->where('onSite', $type)->get();

                    $amountOfPages = Ceil(Count($courses) / 6);

                    $filter = 4;

                    if(isset($_GET['page']) && ($_GET['page']) > 1 && ($_GET['page']) <= $amountOfPages){
                        $initial = (($_GET['page'] - 1) * 6) - 1;
                        $courses = $this->getOrderedCourses(6, $location, null, null, $type, $initial);
                    }
                    else if(isset($_GET['page'])) return redirect('courses/'.$location.'/'.$type);
                    else $courses = $this->getOrderedCourses(6, $location, null, null, $type);

                    $coursesList = $this->getOrderedCourses(null, $location, null, null, $type);

                    break;
                default:
                    return redirect('courses/'.$location);
            }

            return view('courses')
                ->with('location', $location)
                ->with('coursesList', $coursesList)
                ->with('courses', $courses)
                ->with('filter', $filter)
                ->with('amountOfPages', $amountOfPages)
                ->with('news', $this->getOrderedNews(3))
                ->with('genericTexts', $this->getTexts('generic'))
                ->with('coursesTexts', $this->getTexts('courses'))
                ->with('partners', Partner::all())
                ->with('page', 'courses');

        } else {

            $type = htmlspecialchars($type);
            $name = htmlspecialchars($name);

            if(isset($_GET['key'])) $key = htmlspecialchars($_GET['key']);
            else return abort(404);

            $courses = Course::where('display', 1)
                ->where('id', $key)
                ->where('location', $location)
                ->where('type', $type)
                ->where('title', 'like', $name)
                ->get();

            $courses = $this->parseDayAndMonth($this->buildCourses($courses));

            if(isset($courses[0]))
                return view('course')
                    ->with('course', $courses[0])
                    ->with('news', $this->getOrderedNews(3))
                    ->with('genericTexts', $this->getTexts('generic'))
                    ->with('partners', Partner::all())
                    ->with('page', 'courses');
            else return abort(404);
        }
    }

    function getOffices($location = 'Fuerteventura', $name = null){
        $location = htmlspecialchars($location);

        if(isset($name) && isset($_GET['key'])){
            $offices = Office::where('title', 'like', htmlspecialchars($name))
                ->where('location', $location)
                ->where('id', htmlspecialchars($_GET['key']))
                ->get();

            $offices = $this->buildOffices($offices);

            return view('office')
                ->with('office', $offices[0])
                ->with('news', $this->getOrderedNews(3))
                ->with('genericTexts', $this->getTexts('generic'))
                ->with('partners', Partner::all())
                ->with('page', 'offices');
        }

        $offices = $this->getOrderedOffices($location);

        $amountOfPages = Ceil(Count($offices) / 6);

        $officesTexts = [];
        $pageOfficesTexts = Page::where('page', 'offices')->get();

        foreach ($pageOfficesTexts as $pageOfficesText){
            $officesTexts[$pageOfficesText['name']] = $pageOfficesText['value'];
        }

        if(isset($_GET['page']) && ($_GET['page']) > 1 && ($_GET['page']) <= $amountOfPages){
            $initial = (($_GET['page'] - 1) * 6);
            $offices = $this->getOrderedOffices($location,6, $initial);
        }

        return view('offices')
            ->with('location', $location)
            ->with('offices', $offices)
            ->with('amountOfPages', $amountOfPages)
            ->with('news', $this->getOrderedNews(3))
            ->with('officesTexts', $officesTexts)
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('partners', Partner::all())
            ->with('page', 'offices');
    }

    function getNew($title){
        $title = htmlspecialchars($title);

        if(isset($_GET['key'])) $key = htmlspecialchars($_GET['key']);
        else return abort(404);

        $new = News::where('id', $key)->where('title', 'like', $title)->where('display', 1)->get();

        if(isset($new[0])){
            $new = $this->buildNews($new)[0];
            $news = $this->getOrderedNews();

            foreach ($news as $index => $value){
                if($value['id'] == $new['id']) unset($news[$index]);
            }

            $news = array_slice($news, 0, 3);

            return view('new')
                ->with('new', $new)
                ->with('news', $news)
                ->with('genericTexts', $this->getTexts('generic'))
                ->with('partners', Partner::all())
                ->with('page', 'news');
        } else return abort(404);
    }

    function inscription(Request $request){
        $name = htmlspecialchars($request['name']);
        $email = htmlspecialchars($request['email']);
        $phone = intval(htmlspecialchars($request['phone']));
        $course = Course::where('id', htmlspecialchars($request['course']))->first();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return Redirect::back()->withErrors('Email invalido.');
        if(strlen(trim($name)) < 1) return Redirect::back()->withErrors('El nombre está vacío.');
        if(strlen(trim($phone)) < 1) return Redirect::back()->withErrors('El teléfono está vacío.');
        if(!$course) return abort(404);

        if(isset($request['publicity'])) $this->subscribe($email);

        try{
            $emails = ['omayra@fuerteventura2000.com', 'central@fuerteventura2000.com', 'rrss@fuerteventura2000.com', 'tania@fuerteventura2000.com', 'puri@fuerteventura2000.com'];

            if($course['location'] == "Gran Canaria") array_push($emails, 'comercialgc@fuerteventura2000.com');
            else if($course['location'] == "Tenerife") array_push($emails, 'tenerife@fuerteventura2000.com');

            if($course['onSite'] == "Teleformación") $emails = ['teleformacion@fuerteventura2000.com'];

            $data = [
                "email" => $email,
                "name" => $name,
                "phone" => $phone,
                "course" => $course['title'],
                "location" => $course['location'],
                "emails" =>$emails
            ];

            Mail::send('emails.preinscription', $data, function($message) use ($data) {
                $message->to($data["emails"])->subject('Preinscripción');
                $message->from('noreply@fuerteventura2000.com', 'Fuerteventura2000');
            });
        }catch (Exception $e){
            return Redirect::back()->withErrors('Ha sucedido un error durante su preinscripción, vuelva a intentarlo más tarde.
             Si el error persiste, pongase en contacto con nuestro sistema de atención al cliente.');
        }

        Subscriber::create([
            'name' => $name,
            'type' => 'Alumno',
            'email' => $email,
            'phone' => $phone,
            'location' => $course['location'],
            'entity' => 'Fuerteventura2000',
            'content' => $course['title'],
        ]);

        return Redirect::back()->with('successMessage', 'Se ha preinscrito exitosamente en el curso "'.$course['title'].'".');
    }

    function officeInscription(Request $request){
        $name = htmlspecialchars($request['name']);
        $email = htmlspecialchars($request['email']);
        $phone = intval(htmlspecialchars($request['phone']));
        $office = Office::where('id', htmlspecialchars($request['office']))->first();
        $file = $request->file('CV');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return Redirect::back()->withErrors('Email invalido.');
        if(strlen(trim($name)) < 1) return Redirect::back()->withErrors('El nombre está vacío.');
        if(strlen(trim($phone)) < 1) return Redirect::back()->withErrors('El teléfono está vacío.');
        if(!$office) return abort(404);

        if(isset($request['publicity'])) $this->subscribe($email);

        if ($file != null) {
            $extension = $file->getClientOriginalExtension();
            if($extension != 'doc' && $extension != 'docx' && $extension != 'ppt'
                && $extension != 'pptx' && $extension != 'pdf') return Redirect::back()->withErrors('No se acepta este formato de archivo.');
            $fileName = "CurriculumDe".$name.'.'.$extension;
            if (filesize($file) > 20000000) return Redirect::back()->withErrors('Los archivos no pueden superar 20MB de tamaño.');
        }else return Redirect::back()->withErrors('Necesita subir un archivo.');

        try{
            $data = [
                "email" => $email,
                "name" => $name,
                "phone" => $phone,
                "office" => $office['title'],
                "location" => $office['location'],
                "fileName" => $fileName,
                "file" => $file
            ];

            Mail::send('emails.officeSolicitude', $data, function($message) use ($data) {
                $message->to('tania@fuerteventura2000.com', 'Envía tu CV Canarias')->subject('Solicitud para "'.$data['office'].'"');
                $message->from('noreply@fuerteventura2000.com', 'Fuerteventura2000');
                $message->attach($data['file'],
                    [
                        'as' => $data['fileName']
                    ]);
            });
        }catch (Exception $e){
            return Redirect::back()->withErrors('Ha sucedido un error durante su inscripción, vuelva a intentarlo más tarde.
             Si el error persiste, pongase en contacto con nuestro sistema de atención al cliente.');
        }

         Subscriber::create([
             'name' => $name,
             'type' => 'Docente',
             'email' => $email,
             'phone' => $phone,
             'location' => $office['location'],
             'entity' => 'Fuerteventura2000',
             'content' => $office['title'],
         ]);

        return Redirect::back()->with('successMessage', 'Se ha inscrito exitosamente en la oferta "'.$office['title'].'".');
    }

    function contactUs(Request $request, $parameter){
        $name = htmlspecialchars($request['name']);
        $email = htmlspecialchars($request['email']);
        $phone = intval(htmlspecialchars($request['phone']));
        $message = htmlspecialchars($request['message']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return Redirect::back()->withErrors('Email invalido.');
        if(strlen(trim($name)) < 1) return Redirect::back()->withErrors('El nombre está vacío.');
        if(strlen(trim($phone)) < 1) return Redirect::back()->withErrors('El teléfono está vacío.');
        if(strlen(trim($message)) < 1) return Redirect::back()->withErrors('El mensaje está vacío.');

        try{
            $data = [
                "email" => $email,
                "name" => $name,
                "phone" => $phone,
                "content" => $message,
                "location" => $parameter,
            ];

             Mail::send('emails.contactUs', $data, function($message) use ($data) {
                 $message->to('tania@fuerteventura2000.com', 'Tania')->subject('Solicitud de información');
                 $message->from('noreply@fuerteventura2000.com', 'Fuerteventura2000');
             });
        }catch (Exception $e){
            return Redirect::back()->withErrors('Ha sucedido un error durante su solicitud de información, vuelva
             a intentarlo más tarde.Si el error persiste, pongase en contacto con nuestro sistema de atención al cliente.');
        }

        return Redirect::back()->with('successMessage', 'Se ha enviado su solicitud, le responderemos tan pronto como nos sea posible.');
    }

    function userCV(Request $request){
        $name = htmlspecialchars($request['name']);
        $phone = intval(htmlspecialchars($request['phone']));
        $email = htmlspecialchars($request['email']);
        $jobInfo = htmlspecialchars($request['jobInfo']);
        $file = $request->file('CV');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return Redirect::back()->withErrors('Email invalido.');
        if(strlen(trim($name)) < 1) return Redirect::back()->withErrors('El nombre está vacío.');
        if(strlen(trim($phone)) < 1) return Redirect::back()->withErrors('El teléfono está vacío.');
        if(strlen(trim($jobInfo)) < 1) return Redirect::back()->withErrors('El campo "Puesto al que aspiras" está vacío.');

        if ($file != null) {
            $extension = $file->getClientOriginalExtension();
            if($extension != 'doc' && $extension != 'docx' && $extension != 'ppt'
                && $extension != 'pptx' && $extension != 'pdf') return Redirect::back()->withErrors('No se acepta este formato de archivo.');
            $fileName = "CurriculumDe".$name.'.'.$extension;
            if (filesize($file) > 20000000) return Redirect::back()->withErrors('Los archivos no pueden superar 20MB de tamaño.');
        }else return Redirect::back()->withErrors('Necesita subir un archivo.');

        try{
            $data = [
                "email" => $email,
                "name" => $name,
                "phone" => $phone,
                "jobInfo" => $jobInfo,
                "fileName" => $fileName,
                "file" => $file
            ];

            Mail::send('emails.workWithUs', $data, function($message) use ($data) {
                $message->to('tania@fuerteventura2000.com', 'Envía tu CV Canarias')->subject('Solicitud de empleo');
                $message->from('noreply@fuerteventura2000.com', 'Fuerteventura2000');
                $message->attach($data['file'],
                    [
                        'as' => $data['fileName']
                    ]);
            });

        }catch (Exception $e){
            return Redirect::back()->withErrors('Ha sucedido un error durante su solicitud, vuelva a intentarlo más tarde.
             Si el error persiste, pongase en contacto con nuestro sistema de atención al cliente.');
        }

        return Redirect::back()->with('successMessage', 'Se ha enviado su solicitud exitosamente, le contactaremos en caso de que sea seleccionado.');
    }

    function subscribeToNewsletter(Request $request){
        if(isset($request['acceptPolicy'])){
           $response = $this->subscribe($request['email']);

           if($response == 200) return Redirect::back()->with('successMessage', 'Se ha suscrito exitosamente, a partir de ahora le llegarán noticias sobre nuestras novedades.');
           else return Redirect::back()->withErrors($response);

        } return Redirect::back()->withErrors('Debe aceptar nuestra política de protección de datos para suscribirse.');
    }

    function cancelSubscription($parameter){
        $subscriber = Newsletter::where('email', htmlspecialchars($parameter))->first();

        if($subscriber){
            $subscriber->delete();
            return Redirect::to('/')->with('successMessage', 'Se ha cancelado su subscripción a nuestro newsletter.');
        }

        return Redirect::to('/')->withErrors('Ha sucedido un error al intentar cancelar su subscripción,
         inténtelo de nuevo más tarde. Si el error persiste, pongase en contacto con nosotros a través de nuestra página de contacto.');
    }

    function search(Request $request){
        $location = htmlspecialchars($request['location']);
        $receiver = htmlspecialchars($request['receiver']);

        return redirect('courses/'.$location.'/'.$receiver);
    }

    function getLocations($location = 'Fuerteventura'){
        $location = htmlspecialchars($location);
        $contacts = Contact::where('location', $location)->get();

       return view('contact')
           ->with('location', $location)
           ->with('genericTexts', $this->getTexts('generic'))
           ->with('contactTexts', $this->getTexts('contact'))
           ->with('contacts', $contacts)
           ->with('partners', Partner::all())
           ->with('page', 'contact');
    }

    function aboutUs(){
        return view('aboutUs')
            ->with('news', $this->getOrderedNews(3))
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('aboutUsTexts', $this->getTexts('aboutUs'))
            ->with('partners', Partner::all())
            ->with('page', 'aboutUs');
    }

    function oxfordTestOfEnglish(){
        return view('oxfordTestOfEnglish')
            ->with('news', $this->getOrderedNews(3))
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('oxfordTestOfEnglishTexts', $this->getTexts('oxfordTestOfEnglish'))
            ->with('partners', Partner::all())
            ->with('page', 'oxfordTestOfEnglish');
    }

    function oxfordInscription(Request $request, $parameter){
        $name = htmlspecialchars($request['name']);
        $email = htmlspecialchars($request['email']);
        $phone = intval(htmlspecialchars($request['phone']));
        $isle = htmlspecialchars($request['isle']);
        $parameter = htmlspecialchars($parameter);
        
        if($isle == 'grancanaria'){
            $isle = 'Gran Canaria';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return Redirect::back()->withErrors('Email invalido.');
        if(strlen(trim($name)) < 1) return Redirect::back()->withErrors('El nombre está vacío.');
        if(strlen(trim($phone)) < 1) return Redirect::back()->withErrors('El teléfono está vacío.');
        if(!$parameter) return abort(404);

        if(isset($request['publicity'])) $this->subscribe($email);

        try{
            $emails = ['omayra@fuerteventura2000.com', 'central@fuerteventura2000.com', 'rrss@fuerteventura2000.com', 'tania@fuerteventura2000.com'];
            
            if($parameter == 'full') $title ="Oxford Test of English (Completo, 4 competencias)";
            else $title ="Oxford Test of English (Parcial, 1 competencia)";

            $data = [
                "email" => $email,
                "name" => $name,
                "phone" => $phone,
                "course" => $title,
                "isle" => $isle,
                "emails" =>$emails
            ];

            Mail::send('emails.oxfordInscription', $data, function($message) use ($data) {
                $message->to($data["emails"])->subject('Inscripción Oxford Test of English');
                $message->from('noreply@fuerteventura2000.com', 'Fuerteventura2000');
            });
        }catch (Exception $e){
            return Redirect::back()->withErrors('Ha sucedido un error durante su preinscripción, vuelva a intentarlo más tarde.
             Si el error persiste, pongase en contacto con nuestro sistema de atención al cliente.');
        }

        Subscriber::create([
            'name' => $name,
            'type' => 'Alumno',
            'email' => $email,
            'phone' => $phone,
            'location' => "Fuerteventura",
            'entity' => 'Fuerteventura2000',
            'content' => $title,
        ]);

        return Redirect::back()->with('successMessage', 'Se ha inscrito exitosamente en "'.$title.'".');
    }

    function certificates(){
        return view('certificates')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('certificateTexts', $this->getTexts('certificates'))
            ->with('partners', Partner::all())
            ->with('page', 'certificates');
    }

    function joinUs(){
        return view('joinUs')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('joinUsTexts', $this->getTexts('joinUs'))
            ->with('partners', Partner::all())
            ->with('page', 'joinUs');
    }

    function news(){
        $news = $this->getOrderedNews();
        $amountOfPages = Ceil(Count($news) / 7);

        if(isset($_GET['page']) && ($_GET['page']) > 1 && ($_GET['page']) <= $amountOfPages){
            $initial = (($_GET['page'] - 1) * 7);
            $news = $news = $this->getOrderedNews(7, $initial);
        }
        else if(isset($_GET['page'])) return redirect('news');
        else $news = $this->getOrderedNews(7, 0);

        return view('news')
            ->with('news', $news)
            ->with('courses', $this->getOrderedCourses(4))
            ->with('amountOfPages', $amountOfPages)
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('newsTexts', $this->getTexts('news'))
            ->with('partners', Partner::all())
            ->with('page', 'news');
    }

    //---------- L E G A L   P A G E S ----------//

    function configCookies(){
        return view('configCookies')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('configCookiesTexts', $this->getTexts('configCookies'))
            ->with('partners', Partner::all())
            ->with('page', 'configCookies');
    }

    function privacy(){
        return view('privacyPolicy')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('privacyPolicyTexts', $this->getTexts('privacyPolicy'))
            ->with('partners', Partner::all())
            ->with('page', 'privacyPolicy');
    }

    function cookies(){
        return view('cookiesPolicy')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('cookiesPolicyTexts', $this->getTexts('cookiesPolicy'))
            ->with('partners', Partner::all())
            ->with('page', 'cookiesPolicy');
    }

    function security(){
        return view('securityPolicy')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('securityPolicyTexts', $this->getTexts('securityPolicy'))
            ->with('partners', Partner::all())
            ->with('page', 'securityPolicy');
    }

    //---------- T R A N S P A R E N C Y   P O R T A L   P A G E S ----------//

    function transparencyPortal(){
        return view('transparencyPortal')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('transparencyPortalTexts', $this->getTexts('transparencyPortal'))
            ->with('partners', Partner::all())
            ->with('page', 'transparencyPortal');
    }

    function tpNormative(){
        return view('normative')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('normativeTexts', $this->getTexts('normative'))
            ->with('partners', Partner::all())
            ->with('page', 'transparencyPortal');
    }

    function tpFinancialEconomics(){
        return view('financialEconomics')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('financialEconomicsTexts', $this->getTexts('financialEconomics'))
            ->with('partners', Partner::all())
            ->with('page', 'transparencyPortal');
    }

    function tpGrantsAndSubsidies(){
        return view('grantsAndSubsidies')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('grantsAndSubsidiesTexts', $this->getTexts('grantsAndSubsidies'))
            ->with('partners', Partner::all())
            ->with('page', 'transparencyPortal');
    }

    function tpInstitutions(){
        return view('institutions')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('institutionsTexts', $this->getTexts('institutions'))
            ->with('partners', Partner::all())
            ->with('page', 'transparencyPortal');
    }

    function tpContracts(){
        return view('contracts')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('contractsTexts', $this->getTexts('contracts'))
            ->with('partners', Partner::all())
            ->with('page', 'transparencyPortal');
    }

    function tpTransparencyCommissioner(){
        return view('transparencyCommissioner')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('transparencyCommissionerTexts', $this->getTexts('transparencyCommissioner'))
            ->with('partners', Partner::all())
            ->with('page', 'transparencyPortal');
    }

    function tpOrganization(){
        return view('organization')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('organizationTexts', $this->getTexts('organization'))
            ->with('partners', Partner::all())
            ->with('page', 'transparencyPortal');
    }

    function tpCovenants(){
        return view('covenants')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('covenantsTexts', $this->getTexts('covenants'))
            ->with('partners', Partner::all())
            ->with('page', 'transparencyPortal');
    }

    function tpAccessToInformation(){
        return view('accessToInformation')
            ->with('genericTexts', $this->getTexts('generic'))
            ->with('accessToInformationTexts', $this->getTexts('accessToInformation'))
            ->with('partners', Partner::all())
            ->with('page', 'transparencyPortal');
    }

    //---------- R O O T   U T I L S ----------//

    function buildCourses($courses){
        foreach ($courses as $course){
            $course_modules = Course_Module::where('courseId', $course['id'])->get();

            $modules = [];

            foreach ($course_modules as $course_module){
                $module = Module::where('id', $course_module['moduleId'])->first();

                $module_units = Module_Unit::where('moduleId', $module['id'])->get();

                $units = [];

                foreach ($module_units as $module_unit){
                    $unit = Unit::where('id', $module_unit['unitId'])->first();


                    array_push($units, $unit);
                }

                array_push($modules, [$module, $units]);
            }

            $image = Image::where('relationId', $course['id'])
                ->where('usedBy', 'course')
                ->first();

            $course['professionalDepartures'] = Professional_Departure::where('courseId', $course['id'])->get();
            $course['image'] = $image['name'];
            $course['imageAlt'] = $image['alt'];
            $course['modules'] = $modules;
        }
        return $courses;
    }

    function buildNews($news){
        foreach ($news as $new){
            $image = Image::where('relationId', $new['id'])
                ->where('usedBy', 'new')
                ->first();

            $new['image'] = $image['name'];
            $new['imageAlt'] = $image['alt'];
        }
        return $news;
    }

    function buildOffices($offices){
        foreach ($offices as $office){
            $image = Image::where('relationId', $office['id'])
                ->where('usedBy', 'office')
                ->first();

            $office['image'] = $image['name'];
            $office['imageAlt'] = $image['alt'];
        }
        return $offices;
    }

    function buildQuestionnaires($questionnaires){
        $questionnaires = $questionnaires->toArray();
        $questions = Question::all()->toArray();
        $possibleAnswers = Possible_Answer::all()->toArray();

        for($i = 0; $i < Count($questionnaires); $i++){
            $questionnaires[$i]['questions'] = [];

            for($j = 0; $j < Count($questions); $j++){
                if($questions[$j]['questionnaireId'] == $questionnaires[$i]['id']){
                    $questions[$j]['possibleAnswers'] = [];

                    for ($x = 0; $x < Count($possibleAnswers); $x++){
                        if($possibleAnswers[$x]['questionId'] == $questions[$j]['id']) array_push($questions[$j]['possibleAnswers'], $possibleAnswers[$x]);
                    }

                    array_push($questionnaires[$i]['questions'], $questions[$j]);
                }
            }
        }

        return $questionnaires;
    }

    function getOrderedCourses($amount = null, $location = null, $type = null, $receiver = null, $onSite = null, $initial = 0){

        $coursesOrdered = Course::where('promote', 1)->where('display', 1)->where('init_date', '!=', '');

        if($location) $coursesOrdered = $coursesOrdered->where('location', $location);
        if($type) $coursesOrdered = $coursesOrdered->where('type', $type);
        if($receiver) $coursesOrdered = $coursesOrdered->where(function ($query) use ($receiver) {
            $query->where('receiver', $receiver)
                ->orWhere('receiver', 'Desempleados/as y Trabajadores/as');
        });
        if($onSite) $coursesOrdered = $coursesOrdered->where('onSite', $onSite);

        $coursesOrdered =  $this->buildCourses($coursesOrdered->get());

        foreach ($coursesOrdered as $course) $course['init_date'] = strtotime(DateTime::createFromFormat('d/m/Y', $course['init_date'])->format('Y-m-d'));

        $coursesOrdered = $coursesOrdered->sortBy('init_date');

        $promotedCoursesWithoutDate = Course::where('promote', 1)->where('display', 1)->where('init_date', '');

        if($location) $promotedCoursesWithoutDate = $promotedCoursesWithoutDate->where('location', $location);
        if($type) $promotedCoursesWithoutDate = $promotedCoursesWithoutDate->where('type', $type);
        if($receiver) $promotedCoursesWithoutDate = $promotedCoursesWithoutDate->where(function ($query) use ($receiver) {
                $query->where('receiver', $receiver)
                    ->orWhere('receiver', 'Desempleados/as y Trabajadores/as');
            });
        if($onSite) $promotedCoursesWithoutDate = $promotedCoursesWithoutDate->where('onSite', $onSite);

        $promotedCoursesWithoutDate =  $this->buildCourses($promotedCoursesWithoutDate->get());

        $coursesOrdered = array_merge($coursesOrdered->toArray(), $promotedCoursesWithoutDate->toArray());

        $nonPromotedCourses = Course::where('promote', 0)->where('display', 1)->where('init_date', '!=', '');

        if($location) $nonPromotedCourses = $nonPromotedCourses->where('location', $location);
        if($type) $nonPromotedCourses = $nonPromotedCourses->where('type', $type);
        if($receiver) $nonPromotedCourses = $nonPromotedCourses->where(function ($query) use ($receiver) {
            $query->where('receiver', $receiver)
                ->orWhere('receiver', 'Desempleados/as y Trabajadores/as');
        });
        if($onSite) $nonPromotedCourses = $nonPromotedCourses->where('onSite', $onSite);

        $nonPromotedCourses =  $this->buildCourses($nonPromotedCourses->get());

        foreach ($nonPromotedCourses as $course) $course['init_date'] = strtotime(DateTime::createFromFormat('d/m/Y', $course['init_date'])->format('Y-m-d'));

        $nonPromotedCourses = $nonPromotedCourses->sortBy('init_date');

        $coursesOrdered = array_merge($coursesOrdered, $nonPromotedCourses->toArray());

        $nonPromotedCoursesWithoutDate = Course::where('promote', 0)->where('display', 1)->where('init_date', '');

        if($location) $nonPromotedCoursesWithoutDate = $nonPromotedCoursesWithoutDate->where('location', $location);
        if($type) $nonPromotedCoursesWithoutDate = $nonPromotedCoursesWithoutDate->where('type', $type);
        if($receiver) $nonPromotedCoursesWithoutDate = $nonPromotedCoursesWithoutDate->where(function ($query) use ($receiver) {
                $query->where('receiver', $receiver)
                    ->orWhere('receiver', 'Desempleados/as y Trabajadores/as');
            });
        if($onSite) $nonPromotedCoursesWithoutDate = $nonPromotedCoursesWithoutDate->where('onSite', $onSite);

        $nonPromotedCoursesWithoutDate =  $this->buildCourses($nonPromotedCoursesWithoutDate->get());

        $coursesOrdered = array_merge($coursesOrdered, $nonPromotedCoursesWithoutDate->toArray());

        foreach ($coursesOrdered as $index => $value){
            if($value['init_date']){
                if($coursesOrdered[$index]['init_date'] < strtotime(date("Y-m-d"))) unset($coursesOrdered[$index]);
                else $coursesOrdered[$index]['init_date'] = date("d/m/Y", $value['init_date']);
            } 
        }

        if($amount) $coursesOrdered = array_slice($coursesOrdered, $initial, $amount);

        $coursesOrdered = $this->parseDayAndMonth($coursesOrdered);

        return $coursesOrdered;
    }

    function getOrderedNews($amount = null, $initial=0){

        $newsOrdered = News::where('promote', 1)->where('display', 1)->orderBy('created_at', 'DESC')->get();

        $newsOrdered =  $this->buildNews($newsOrdered);

        $nonPromotedNews = News::where('promote', 0)->where('display', 1)->orderBy('created_at', 'DESC')->get();

        $nonPromotedNews =  $this->buildNews($nonPromotedNews);

        $newsOrdered = array_merge($newsOrdered->toArray(), $nonPromotedNews->toArray());

        foreach ($newsOrdered as $index => $new){
            if(strlen($new['publishDate']) > 0){
                $new['publishDate'] = strtotime(DateTime::createFromFormat('d/m/Y', $new['publishDate'])->format('Y-m-d'));
                if(strtotime(date('Y-m-d')) < $new['publishDate']) unset($newsOrdered[$index]);
            }
        };

        if($amount) $newsOrdered = array_slice($newsOrdered, $initial, $amount);

        return $newsOrdered;
    }

    function getOrderedOffices($location, $amount = null, $initial = 0){

        $promotedOffices = Office::where('display', 1)->where('location', $location)->where('promote', 1)->get();

        $promotedOffices = $this->buildOffices($promotedOffices);

        $nonPromotedOffices = Office::where('display', 1)->where('location', $location)->where('promote', 0)->get();

        $nonPromotedOffices = $this->buildOffices($nonPromotedOffices);

        $officesOrdered = array_merge($promotedOffices->toArray(), $nonPromotedOffices->toArray());

        foreach ($officesOrdered as $index => $office){
            if(strlen($office['end_date']) > 0){
                $office['end_date'] = strtotime(DateTime::createFromFormat('d/m/Y', $office['end_date'])->format('Y-m-d'));
                if(strtotime(date('Y-m-d')) < $office['end_date']) unset($officesOrdered[$index]);
            }
        };

        if($amount) $officesOrdered = array_slice($officesOrdered, $initial, $amount);

        return $officesOrdered;
    }

    function getTexts($page){
        $texts = [];
        $pageTexts = Page::where('page', $page)->get();

        foreach ($pageTexts as $pageText){
            $texts[$pageText['name']] = $pageText['value'];
        }

        return $texts;
    }

    function parseDayAndMonth($courses){
        if(!is_array($courses)) $courses = $courses->toArray();

        $courses = array_values($courses);

        for ($i = 0; $i < Count($courses); $i++){
            $initDateParsed = $this->dayAndMonthParser($courses[$i]['init_date']);
            $endDateParsed = $this->dayAndMonthParser($courses[$i]['end_date']);

            $courses[$i]['initDayParsed'] = $initDateParsed[0];
            $courses[$i]['initMonthParsed'] = $initDateParsed[1];
            $courses[$i]['endDayParsed'] = $endDateParsed[0];
            $courses[$i]['endMonthParsed'] = $endDateParsed[1];
        }
        return $courses;
    }

    function subscribe($email){
        $email = htmlspecialchars($email);
        $exist = Newsletter::where('email', $email)->first();

        if($exist) return 'Ya está suscrito.';

        Newsletter::create([
            'email' => $email,
        ]);

        return 200;
    }
}
