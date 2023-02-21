<?php

namespace Fuerteventura2000\Http\Controllers;

use Fuerteventura2000\Admin;
use Fuerteventura2000\Contact;
use Fuerteventura2000\Course;
use Fuerteventura2000\Course_Module;
use Fuerteventura2000\Image;
use Fuerteventura2000\Module;
use Fuerteventura2000\Module_Unit;
use Fuerteventura2000\News;
use Fuerteventura2000\Office;
use Fuerteventura2000\Page;
use Fuerteventura2000\Partner;
use Fuerteventura2000\Possible_Answer;
use Fuerteventura2000\Professional_Departure;
use Fuerteventura2000\Question;
use Fuerteventura2000\Questionnaire;
use Fuerteventura2000\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Statickidz\GoogleTranslate;
use SimpleXLSX;
use Cloudinary\Uploader;
use Cloudinary;
use GuzzleHttp;
use Exception;
use DOMDocument;
use DOMXPath;


class AdminController extends RootController
{
    //---------- A D M I N   V A L I D A T I O N ----------//

    function access(Request $request){
        $userCookie = htmlspecialchars($request->cookie('user'));
        $sessionCookie = htmlspecialchars($request->cookie('sessionToken'));

        if(!$userCookie || !$sessionCookie) $admin = false;
        else{
            $admin = Admin::where('email', $userCookie)->first();

            if($admin){
                if($admin->session_token != $sessionCookie) $admin = false;
            }
        }

        if(!$admin) return view('admin');
        else return redirect('controlPanel');
    }

    function login(Request $request){
        $email = htmlspecialchars($request['email']);
        $password = htmlspecialchars($request['password']);

        $admin = Admin::where('email', $email)->first();

        if($admin){
            if(Hash::check($password, $admin['password'])) {
                try{
                    $sessionToken = bin2hex(random_bytes(mt_rand(10, 25)));
                }catch(Exception $e){
                    $sessionToken = $this->generateRandomString(mt_rand(20, 50));
                }

                $admin->session_token = $sessionToken;
                $admin->save();

                $adminCookie = cookie()->forever('user', $admin->email);
                $sessionCookie = cookie()->forever('sessionToken', $sessionToken);

                return redirect('controlPanel')
                    ->withCookie($adminCookie)
                    ->withCookie($sessionCookie);
            }
        }
        return Redirect::back()->withErrors('Email o Contraseña incorrectos.');
    }

    function controlPanel(Request $request, $parameter = null){
        if($parameter){
            $parameter = htmlspecialchars($parameter);

            switch ($parameter){
                case 'administrateCourses':
                    if(isset($request['page'])) $page = $request['page'] - 1;
                    else $page = 0;
                    $amountOfCourses = 20;
                    $amountOfPages = ceil(Count(Course::all())/$amountOfCourses);

                    $courses = $this->buildCourses(Course::orderBy('created_at', 'DESC')->skip($page * $amountOfCourses)->take($amountOfCourses)->get());

                    return view('administrateCourses')
                        ->with('courses', $courses)
                        ->with('nextCourse', DB::select("SHOW TABLE STATUS LIKE 'courses'")[0]->Auto_increment)
                        ->with('nextModule', DB::select("SHOW TABLE STATUS LIKE 'modules'")[0]->Auto_increment)
                        ->with('nextUnit', DB::select("SHOW TABLE STATUS LIKE 'units'")[0]->Auto_increment)
                        ->with('genericTexts', $this->getGenericTexts())
                        ->with('pagination', $page)
                        ->with('amountOfPages', $amountOfPages)
                        ->with('files', $this->getFiles())
                        ->with('page', 'courses');

                case 'administrateNews':
                    $news = $this->buildNews(News::orderBy('created_at', 'DESC')->get());

                    return view('administrateNews')
                        ->with('news', $news)
                        ->with('nextNew', DB::select("SHOW TABLE STATUS LIKE 'news'")[0]->Auto_increment)
                        ->with('genericTexts', $this->getGenericTexts())
                        ->with('files', $this->getFiles())
                        ->with('page', 'news');

                case 'administrateContacts':
                    $contacts = Contact::orderBy('created_at', 'DESC')->get();

                    return view('administrateContacts')
                        ->with('contacts', $contacts)
                        ->with('genericTexts', $this->getGenericTexts())
                        ->with('files', $this->getFiles())
                        ->with('page', 'contacts');

                case 'administrateOffices':
                    $offices = $this->buildOffices(Office::orderBy('created_at', 'DESC')->get());

                    return view('administrateOffices')
                        ->with('offices', $offices)
                        ->with('nextOffice', DB::select("SHOW TABLE STATUS LIKE 'offices'")[0]->Auto_increment)
                        ->with('genericTexts', $this->getGenericTexts())
                        ->with('files', $this->getFiles())
                        ->with('page', 'offices');

                case 'administrateQuestionnaires':
                    $questionnaires = Questionnaire::orderBy('id', 'DESC')->get();
                    $questionnaireAnnouncements = [];

                    foreach ($questionnaires as $questionnaire) {
                        $questionnaireYear = substr($questionnaire['announcement'], -4);

                        if(!in_array($questionnaireYear, $questionnaireAnnouncements) && $questionnaireYear != date('Y')){
                            array_push($questionnaireAnnouncements, $questionnaireYear);
                        }
                    }

                    $questionnaires = $this->buildQuestionnaires($questionnaires);

                    return view('administrateQuestionnaires')
                        ->with('questionnaires', $questionnaires)
                        ->with('questionnaireAnnouncements', $questionnaireAnnouncements)
                        ->with('nextQuestion', DB::select("SHOW TABLE STATUS LIKE 'questions'")[0]->Auto_increment)
                        ->with('genericTexts', $this->getGenericTexts())
                        ->with('files', $this->getFiles())
                        ->with('page', 'questionnaires');

                default:
                    $client = new GuzzleHttp\Client();

                    try{
                        $connection = $client->get(url($parameter));
                        $status = $connection->getStatusCode();

                        if($status == 200){
                            return view('adminEditPage')
                                ->with('page', $parameter)
                                ->with('genericTexts', $this->getGenericTexts())
                                ->with('files', $this->getFiles());
                        }
                        else return abort(404);
                    }catch (Exception $e){
                        return abort(404);
                    }
            }
        }else{
            return view('adminEditPage')
                ->with('page', '')
                ->with('genericTexts', $this->getGenericTexts())
                ->with('files', $this->getFiles());
        }
    }

    function fileManager(Request $request){
        if(isset($request['delete'])){
            $deleteTarget = htmlspecialchars($request['delete']);
            if(File::exists('files/source/'.$deleteTarget)) File::delete('files/source/'.$deleteTarget);
            return Redirect::back()->with('successMessage', 'El archivo '.$deleteTarget.' ha sido borrado con éxito.');
        }else{
            $file = $request->file('file');

            if ($file != null) {
                $file->move(public_path('files/source'), $file->getClientOriginalName());
                return Redirect::back()->with('successMessage', 'El archivo '.$file->getClientOriginalName().' se ha subido con éxito. La url del archivo es: '.url('files/source').'/'.$file->getClientOriginalName());
            }else return Redirect::back()->withErrors('Necesita subir un archivo.');
        }
    }

    //---------- F I L T E R   C O U R S E S ----------//

    function filterCourses(Request $request){
        $amountOfCourses = 20;
        $page = intval($request['page']);

        switch ($request['receiver']){
            case 0:
                $receiver = 'Todos';

                break;
            case 1:
                $receiver = 'Desempleados/as';
                break;
            case 2:
                $receiver = 'Trabajadores/as';
                break;
            default:
                $receiver = 'Desempleados/as y Trabajadores/as';
        }

        $query = Course::orderBy('created_at', 'DESC');

        if($request['title']) $query->whereRaw('LOWER(title) LIKE "%' . $request['title'] . '%"');
        if($request['sector']) $query->whereRaw('LOWER(sector) LIKE "%' . $request['sector'] . '%"');
        if($request['location'] != 'Todos') $query->where('location', $request['location']);
        if($request['type'] != 'Todos') $query->where('type', $request['type']);
        if($request['onSite'] != 'Todos') $query->where('onSite', $request['onSite']);
        if($receiver != 'Todos') $query->where('receiver', $receiver);

        $amountOfPages = ceil(Count($query->get())/$amountOfCourses);
        if($amountOfPages > 0 && $page > $amountOfPages) return Redirect::to(str_replace('page='.$page, 'page=1', url()->full()));

        $courses = $this->buildCourses($query->skip($page-1 * $amountOfCourses)->take($amountOfCourses)->get());

        return view('administrateCourses')
            ->with('courses', $courses)
            ->with('nextCourse', DB::select("SHOW TABLE STATUS LIKE 'courses'")[0]->Auto_increment)
            ->with('nextModule', DB::select("SHOW TABLE STATUS LIKE 'modules'")[0]->Auto_increment)
            ->with('nextUnit', DB::select("SHOW TABLE STATUS LIKE 'units'")[0]->Auto_increment)
            ->with('genericTexts', $this->getGenericTexts())
            ->with('amountOfPages', $amountOfPages)
            ->with('files', $this->getFiles())
            ->with('page', 'courses');
    }

    //---------- A D D   C O U R S E ----------//

    function addCourse(Request $request){
        $title = htmlspecialchars($request['title']);
        $sector = htmlspecialchars($request['sector']);
        $location = htmlspecialchars($request['location']);
        $type = htmlspecialchars($request['type']);
        $receiver = htmlspecialchars($request['receiver']);
        $price = floatval(htmlspecialchars($request['price']));
        $onSite = htmlspecialchars($request['onSite']);
        $description = $this->stripTagsAndAttributes($request['description'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');
        $level = intval(htmlspecialchars($request['level']));
        $hours = intval(htmlspecialchars($request['hours']));
        $initDate = htmlspecialchars($request['initDate']);
        $endDate = htmlspecialchars($request['endDate']);
        $schedule = htmlspecialchars($request['schedule']);
        $teacher = htmlspecialchars($request['teacher']);
        $teacherDescription = $this->stripTagsAndAttributes($request['teacherDescription'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');
        $requirements = $this->stripTagsAndAttributes($request['requirements'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');

        if(isset($request['promote'])) $promote = 1;
        else $promote = 0;

        if(isset($request['hidden'])) $display = 0;
        else $display = 1;

        $course = Course::create([
            'title' => $title,
            'sector' => $sector,
            'location' => $location,
            'type' => $type,
            'receiver' => $receiver,
            'price' => $price,
            'onSite' => $onSite,
            'description' => $description,
            'level' => $level,
            'hours' => $hours,
            'init_date' => $initDate,
            'end_date' => $endDate,
            'schedule' => $schedule,
            'teacher' => $teacher,
            'teacherDescription' => $teacherDescription,
            'requirements' => $requirements,
            'promote' => $promote,
            'display' => $display
        ]);

        $this->generateCourseContents($request, $course['id']);

        return Redirect::back()->with('successMessage', 'El curso '.$course['title'].' ha sido creado con éxito.');
    }

    //---------- E D I T   C O U R S E ----------//

    function editCourse(Request $request){
        $course = Course::where('id', htmlspecialchars($request['course']))->first();

        if($course){
            $title = htmlspecialchars($request['title']);
            $sector = htmlspecialchars($request['sector']);
            $location = htmlspecialchars($request['location']);
            $type = htmlspecialchars($request['type']);
            $receiver = htmlspecialchars($request['receiver']);
            $price = floatval(htmlspecialchars($request['price']));
            $onSite = htmlspecialchars($request['onSite']);
            $description = $this->stripTagsAndAttributes($request['description'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');
            $level = intval(htmlspecialchars($request['level']));
            $hours = intval(htmlspecialchars($request['hours']));
            $initDate = htmlspecialchars($request['initDate']);
            $endDate = htmlspecialchars($request['endDate']);
            $schedule = htmlspecialchars($request['schedule']);
            $teacher = htmlspecialchars($request['teacher']);
            $teacherDescription = $this->stripTagsAndAttributes($request['teacherDescription'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');
            $requirements = $this->stripTagsAndAttributes($request['requirements'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');

            $course['title'] = $title;
            $course['sector'] = $sector;
            $course['location'] = $location;
            $course['type'] = $type;
            $course['receiver'] = $receiver;
            $course['price'] = $price;
            $course['onSite'] = $onSite;
            $course['description'] = $description;
            $course['level'] = $level;
            $course['hours'] = $hours;
            $course['init_date'] = $initDate;
            $course['end_date'] = $endDate;
            $course['schedule'] = $schedule;
            $course['teacher'] = $teacher;
            $course['teacherDescription'] = $teacherDescription;
            $course['requirements'] = $requirements;

            if(isset($request['promote'])) $course['promote'] = 1;
            else $course['promote'] = 0;

            if(isset($request['hidden'])) $course['display'] = 0;
            else $course['display'] = 1;

            $course->save();

            $this->generateCourseContents($request, $course['id']);

            return Redirect::back()->with('successMessage', 'El curso '.$course['title'].' ha sido modificado con éxito.');
        }

        return abort(404);
    }

    //---------- D E L E T E   C O U R S E ----------//

    function duplicateCourse($parameter){
        $courseId = htmlspecialchars($parameter);
        if($courseId && strlen($courseId) > 0){
            $course = Course::where('id', $courseId)->first();

            if($course){
                $duplicatedCourse = $course->replicate();

                $duplicatedCourse->display = 0;

                $duplicatedCourse->save();

                $courseModuleRelations = Course_Module::where('courseId', $course['id'])->get();

                foreach ($courseModuleRelations as $courseModuleRelation){
                    $module = Module::where('id', $courseModuleRelation['moduleId'])->first();

                    if($module){
                        $duplicatedModule = $module->replicate();

                        $duplicatedModule->save();

                        Course_Module::create([
                           'courseId' => $duplicatedCourse['id'],
                           'moduleId' => $duplicatedModule['id']
                        ]);
                    }
                }

                $courseDepartures = Professional_Departure::where('courseId', $course['id'])->get();

                foreach ($courseDepartures as $courseDeparture){
                    $duplicatedDeparture = $courseDeparture->replicate();

                    $duplicatedDeparture->courseId = $duplicatedCourse['id'];

                    $duplicatedDeparture->save();
                }

                $image = Image::where('relationId', $course['id'])
                    ->where('usedBy', 'course')
                    ->first();

                try{
                    $name = bin2hex(random_bytes(mt_rand(10, 45)));
                }catch(Exception $e){
                    $name = $this->generateRandomString(mt_rand(20, 90));
                }

                $extension = explode('.', $image['name'])[1];

                $fullName = $name.'.'.$extension;

                if(File::exists('images/uploads/'.$image['name'])) copy(public_path('images/uploads/'.$image['name']), public_path('images/uploads/'.$fullName));

                $duplicatedImage = $image->replicate();

                $duplicatedImage->relationId = $duplicatedCourse->id;
                $duplicatedImage->name = $fullName;

                $duplicatedImage->save();

                return Redirect::back()->with('successMessage', 'El curso '.$course['title'].' ha sido duplicado con éxito.');
            }
        }
        return Redirect::back()->withErrors('Ha sucedido un error, vuelva a intentarlo más tarde.');
    }

    //---------- D E L E T E   C O U R S E ----------//

    function deleteCourse(Request $request){
        $courseId = htmlspecialchars($request['course']);
        if($courseId && strlen($courseId) > 0){
            $course = Course::where('id', $courseId)->first();

            if($course){
                $image = Image::where('relationId', $course['id'])
                    ->where('usedBy', 'course')
                    ->first();

                if(File::exists('images/uploads/'.$image['name'])) File::delete('images/uploads/'.$image['name']);

                $image->delete();

                $course->delete();

                return Redirect::back()->with('successMessage', 'El curso '.$course['title'].' ha sido eliminado con éxito.');
            }
        }
        return Redirect::back()->withErrors('Ha sucedido un error, vuelva a intentarlo más tarde.');
    }

    //---------- A D D   N E W ----------//

    function addNew(Request $request){
        $title = htmlspecialchars($request['title']);
        $publishDate = htmlspecialchars($request['publishDate']);
        $content = $this->stripTagsAndAttributes($request['content'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');

        if(isset($request['promote'])) $promote = 1;
        else $promote = 0;

        if(isset($request['hidden'])) $display = 0;
        else $display = 1;

        $new = News::create([
            'title' => $title,
            'content' => $content,
            'publishDate' => $publishDate,
            'promote' => $promote,
            'display' => $display,
        ]);

        return Redirect::back()->with('successMessage', 'La noticia '.$new['title'].' ha sido creada con éxito.');
    }

    //---------- E D I T   N E W ----------//

    function editNew(Request $request){
        $new = News::where('id', htmlspecialchars($request['new']))->first();

        if($new){
            $title = htmlspecialchars($request['title']);
            $publishDate = htmlspecialchars($request['publishDate']);
            $content = $this->stripTagsAndAttributes($request['content'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');

            $new['title'] = $title;
            $new['publishDate'] = $publishDate;
            $new['content'] = $content;

            if(isset($request['promote'])) $new['promote'] = 1;
            else $new['promote'] = 0;

            if(isset($request['hidden'])) $new['display'] = 0;
            else $new['display'] = 1;

            $new->save();

            return Redirect::back()->with('successMessage', 'La noticia '.$new['title'].' ha sido modificada con éxito.');
        }

        return abort(404);
    }

    //---------- D E L E T E   N E W ----------//

    function deleteNew(Request $request){
        $newId = htmlspecialchars($request['new']);

        if($newId && strlen($newId) > 0){
            $new = News::where('id', $newId)->first();

            if($new){
                $image = Image::where('relationId', $new['id'])
                    ->where('usedBy', 'new')
                    ->first();

                if(File::exists('images/uploads/'.$image['name'])) File::delete('images/uploads/'.$image['name']);

                $image->delete();

                $new->delete();

                return Redirect::back()->with('successMessage', 'La noticia '.$new['title'].' ha sido eliminada con éxito.');
            }
        }
        return Redirect::back()->withErrors('Ha sucedido un error, vuelva a intentarlo más tarde.');
    }

    //---------- A D D   C O N T A C T ----------//

    function addContact(Request $request){
        $title = htmlspecialchars($request['title']);
        $location = htmlspecialchars($request['location']);
        $phone = intval(htmlspecialchars($request['phone']));
        $address = htmlspecialchars($request['address']);

        $contact = Contact::create([
            'name' => $title,
            'location' => $location,
            'phone' => $phone,
            'address' => $address
        ]);

        return Redirect::back()->with('successMessage', 'El contacto '.$contact['name'].' ha sido creado con éxito.');
    }

    //---------- E D I T   C O N T A C T ----------//

    function editContact(Request $request){
        $contact = Contact::where('id', htmlspecialchars($request['contact']))->first();

        if ($contact) {
            $title = htmlspecialchars($request['title']);
            $location = htmlspecialchars($request['location']);
            $phone = intval(htmlspecialchars($request['phone']));
            $address = htmlspecialchars($request['address']);

            $contact['name'] = $title;
            $contact['location'] = $location;
            $contact['phone'] = $phone;
            $contact['address'] = $address;

            $contact->save();

            return Redirect::back()->with('successMessage', 'El contacto '.$contact['name'].' ha sido modificado con éxito.');
        }
        return abort(404);
    }

    //---------- D E L E T E   C O N T A C T ----------//

    function deleteContact(Request $request){
        $contactId = htmlspecialchars($request['contact']);

        if($contactId && strlen($contactId) > 0){
            $contact = Contact::where('id', $contactId)->first();

            if($contact){
                $contact->delete();

                return Redirect::back()->with('successMessage', 'El contacto '.$contact['name'].' ha sido eliminado con éxito.');
            }
        }
        return Redirect::back()->withErrors('Ha sucedido un error, vuelva a intentarlo más tarde.');
    }

    //---------- A D D   Q U E S T I O N N A I R E ----------//

    function addQuestionnaire(Request $request){
        $title = htmlspecialchars($request['title']);
        $location = htmlspecialchars($request['location']);
        $type = htmlspecialchars($request['type']);
        $announcement = htmlspecialchars($request['announcement']);
        $content = $this->stripTagsAndAttributes($request['content'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');
        $user = 'Alumno'.$location.rand(1000, 9999);
        $password = encrypt($this->generateRandomString(10));

        $questionnaire = Questionnaire::create([
            'title' => $title,
            'type' => $type,
            'location' => $location,
            'announcement' => $announcement,
            'content' => $content,
            'user' => $user,
            'password' => $password
        ]);

        $this->generateQuestionnaireContents($request, $questionnaire);

        return Redirect::back()->with('successMessage', 'La encuesta '.$questionnaire['title'].' ha sido creada con éxito.');
    }

    //---------- E D I T   Q U E S T I O N N A I R E ----------//

    function editQuestionnaire(Request $request){
        $questionnaire = Questionnaire::where('id', intval($request['questionnaire']))->first();

        $questionnaire['title'] = htmlspecialchars($request['title']);
        $questionnaire['location'] = htmlspecialchars($request['location']);
        $questionnaire['type'] = htmlspecialchars($request['type']);
        $questionnaire['announcement'] = htmlspecialchars($request['announcement']);
        $questionnaire['content'] = $this->stripTagsAndAttributes($request['content'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');

        $questionnaire->save();

        $questions = Question::where('questionnaireId', $questionnaire['id'])->get();

        foreach ($questions as $question){
            $possibleAnswers = Possible_Answer::where('questionId', $question['id'])->get();

            foreach ($possibleAnswers as $possibleAnswer) $possibleAnswer->delete();

            $question->delete();
        }

        $this->generateQuestionnaireContents($request, $questionnaire);

        return Redirect::back()->with('successMessage', 'La encuesta '.$questionnaire['title'].' ha sido modificada con éxito.');
    }

    //---------- D E L E T E   Q U E S T I O N N A I R E ----------//

    function deleteQuestionnaire(Request $request){
        $questionnaireId = htmlspecialchars($request['questionnaire']);

        if($questionnaireId && strlen($questionnaireId) > 0){
            $questionnaire = Questionnaire::where('id', $questionnaireId)->first();

            if($questionnaire){
                $questions = Question::where('questionnaireId', $questionnaire['id'])->get();

                foreach ($questions as $question){
                    $possibleAnswers = Possible_Answer::where('questionId', $question['id'])->get();

                    foreach ($possibleAnswers as $possibleAnswer) $possibleAnswer->delete();

                    $question->delete();
                }
                $questionnaire->delete();

                return Redirect::back()->with('successMessage', 'La encuesta '.$questionnaire['title'].' ha sido eliminada con éxito.');
            }
        }
        return Redirect::back()->withErrors('Ha sucedido un error, vuelva a intentarlo más tarde.');
    }

    //---------- D U P L I C A T E   Q U E S T I O N N A I R E ----------//

    function duplicateQuestionnaire($parameter){
        $questionnaireId = htmlspecialchars($parameter);
        if($questionnaireId && strlen($questionnaireId) > 0){
            $questionnaire = Questionnaire::where('id', $questionnaireId)->first();

            if($questionnaire){
                $duplicatedQuestionnaire = $questionnaire->replicate();

                $duplicatedQuestionnaire->user = 'Alumno'.$duplicatedQuestionnaire['location'].rand(1000, 9999);

                $duplicatedQuestionnaire->password = encrypt($this->generateRandomString(10));

                $duplicatedQuestionnaire->save();

                $questions = Question::where('questionnaireId', $questionnaire['id'])->get();

                foreach ($questions as $question){
                    $duplicatedQuestion = $question->replicate();

                    $duplicatedQuestion->questionnaireId = $duplicatedQuestionnaire['id'];

                    $duplicatedQuestion->save();

                    $possibleAnswers = Possible_Answer::where('questionId', $question['id'])->get();

                    foreach($possibleAnswers as $possibleAnswer){
                        $duplicatedPossibleAnswer = $possibleAnswer->replicate();

                        $duplicatedPossibleAnswer->questionId = $duplicatedQuestion['id'];

                        $duplicatedPossibleAnswer->save();
                    }
                }
                return Redirect::back()->with('successMessage', 'El cuestionario '.$questionnaire['title'].' ha sido duplicado con éxito.');
            }
        }
        return Redirect::back()->withErrors('Ha sucedido un error, vuelva a intentarlo más tarde.');
    }

    //---------- D O W N L O A D   Q U E S T I O N N A I R E   C R E D E N T I A L S ----------//

    function downloadQuestionnaireCredentials(Request $request){
        $location = htmlspecialchars($request['location']);
        $announcement = htmlspecialchars($request['announcement']);

        if(!$location && !$announcement) $questionnaires = Questionnaire::all();
        else if(!$location) $questionnaires = Questionnaire::where('announcement', 'LIKE', '%'.$announcement.'%')->get();
        else if(!$announcement) $questionnaires = Questionnaire::where('location', $location)->get();
        else $questionnaires = Questionnaire::where('location', $location)->where('announcement', 'LIKE', '%'.$announcement.'%')->get();

        if(Count($questionnaires)){
            header("Content-type: application/vnd.ms-word");
            header("Content-Disposition: attachment;Filename=Credenciales de cuestionarios.doc");
            echo '<html>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <body>
            <table style="width:100%; border: 1px solid black; border-collapse: collapse;">
            <tr>
            <th style="padding: 15px; border: 1px solid black; border-collapse: collapse;">Título</th>
            <th style="padding: 15px; border: 1px solid black; border-collapse: collapse;">Localización</th>
            <th style="padding: 15px; border: 1px solid black; border-collapse: collapse;">Tipo</th>
            <th style="padding: 15px; border: 1px solid black; border-collapse: collapse;">Usuario</th>
            <th style="padding: 15px; border: 1px solid black; border-collapse: collapse;">Contraseña</th>
            </tr>';

            foreach ($questionnaires as $questionnaire){
             echo ' <tr>
                    <td style="padding: 15px; border: 1px solid black; border-collapse: collapse;">'.$questionnaire['title'].'</td>
                    <td style="padding: 15px; border: 1px solid black; border-collapse: collapse;">'.$questionnaire['location'].'</td>
                    <td style="padding: 15px; border: 1px solid black; border-collapse: collapse;">'.$questionnaire['type'].'</td>
                    <td style="padding: 15px; border: 1px solid black; border-collapse: collapse;">'.$questionnaire['user'].'</td>
                    <td style="padding: 15px; border: 1px solid black; border-collapse: collapse;">'.decrypt($questionnaire['password']).'</td>
                    </tr>';
            }

            echo "</body>
            </html>";
        }
        else return Redirect::back()->withErrors('No hay cuestionarios que coincídan con las especificaciones dadas.');
    }

    //---------- A D D   O F F I C E ----------//

    function addOffice(Request $request){
        $title = htmlspecialchars($request['title']);
        $location = htmlspecialchars($request['location']);
        $endDate = htmlspecialchars($request['endDate']);
        $description = $this->stripTagsAndAttributes($request['description'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');

        if(isset($request['promote'])) $promote = 1;
        else $promote = 0;

        if(isset($request['hidden'])) $display = 0;
        else $display = 1;

        $office = Office::create([
            'title' => $title,
            'location' => $location,
            'end_date' => $endDate,
            'description' => $description,
            'promote' => $promote,
            'display' => $display
        ]);

        return Redirect::back()->with('successMessage', 'La oferta de trabajo '.$office['title'].' ha sido creada con éxito.');
    }

    //---------- E D I T   O F F I C E ----------//

    function editOffice(Request $request){
        $office = Office::where('id', htmlspecialchars($request['office']))->first();

        if($office){
            $title = htmlspecialchars($request['title']);
            $location = htmlspecialchars($request['location']);
            $endDate = htmlspecialchars($request['endDate']);
            $description = $this->stripTagsAndAttributes($request['description'], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');

            $office['title'] = $title;
            $office['location'] = $location;
            $office['end_date'] = $endDate;
            $office['description'] = $description;

            if(isset($request['promote'])) $office['promote'] = 1;
            else $office['promote'] = 0;

            if(isset($request['hidden'])) $office['display'] = 0;
            else $office['display'] = 1;

            $office->save();

            return Redirect::back()->with('successMessage', 'La oferta de trabajo '.$office['title'].' ha sido modificada con éxito.');
        }

        return abort(404);
    }

    //---------- D E L E T E   O F F I C E ----------//

    function deleteOffice(Request $request){
        $officeId = htmlspecialchars($request['office']);

        if($officeId && strlen($officeId) > 0){
            $office = Office::where('id', $officeId)->first();

            if($office){
                $image = Image::where('relationId', $office['id'])
                    ->where('usedBy', 'office')
                    ->first();

                if(File::exists('images/uploads/'.$image['name'])) File::delete('images/uploads/'.$image['name']);

                $image->delete();

                $office->delete();

                return Redirect::back()->with('successMessage', 'La oferta de trabajo '.$office['title'].' ha sido eliminada con éxito.');
            }
        }
        return Redirect::back()->withErrors('Ha sucedido un error, vuelva a intentarlo más tarde.');
    }

    //---------- E D I T   P A G E ----------//

    function editPage(Request $request){
        $page = htmlspecialchars($request['page']);
        $values = json_decode($request['value']);

        if(!$page) $page = 'index';

        $pageFields = [];
        $genericFields = [];

        foreach ($values as $value){
            $key = htmlspecialchars($value[0]);
            $value = $this->stripTagsAndAttributes($value[1], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');

            if (strpos($key, 'generic') !== false) array_push($genericFields, [$key, $value]);
            else array_push($pageFields, [$key, $value]);
        }

        $oldPages = Page::where('page', $page)
            ->where('name', 'not like', '%img%')
            ->orWhere('page', 'generic')
            ->where('name', 'not like', '%img%')
            ->get();

        foreach ($oldPages as $oldPage) $oldPage->delete();

        foreach ($pageFields as $pageField){
            Page::create([
                'page' => $page,
                'name' => $pageField[0],
                'value' => $pageField[1]
            ]);
        }

        foreach ($genericFields as $genericField){
            Page::create([
                'page' => 'generic',
                'name' => $genericField[0],
                'value' => $genericField[1]
            ]);
        }

        foreach ($request->all() as $key => $value){
            if (strpos($key, 'img-') !== false && $value){
                try{
                    $file = $request->file($key);
                }catch (Exception $e){
                    return Redirect::back()->withErrors('Ha sucedido un error, reintentelo más tarde.');
                }

                if ($file != null) {
                    $time = strtotime(date('d/m/y h:i:s'));
                    $random = $this->generateRandomString(20);
                    $name = $random . $time . '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('/images/uploads');
                    if (filesize($file) > 500000) {
                        return Redirect::back()->withErrors('Las imágenes no pueden superar 500KB de tamaño.');
                    } else {
                        $file->move($destinationPath, $name);

                        $oldPage = Page::where('page', $page)->where('name', $key)->first();

                        if(!$oldPage) $oldPage = Page::where('page', 'generic')->where('name', $key)->first();

                        if($oldPage){
                            if(File::exists('images/uploads/'.$oldPage['value'])){
                                File::delete('images/uploads/'.$oldPage['value']);
                            }
                            $oldPage->value = $name;
                            $oldPage->save();
                        }
                    }
                }
            }else if(strpos($key, 'partnersAnchor-')!== false){
                $split = explode('-', $key);

                try{
                    $file = $request->file('partnersImg-'.$split[1]);
                }catch (Exception $e){
                    return Redirect::back()->withErrors('Ha sucedido un error, reintentelo más tarde.');
                }

                if ($file != null) {
                    $time = strtotime(date('d/m/y h:i:s'));
                    $random = $this->generateRandomString(20);
                    $name = $random . $time . '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('/images/uploads');
                    if (filesize($file) > 500000) {
                        return Redirect::back()->withErrors('Las imágenes no pueden superar 500KB de tamaño.');
                    } else {
                        $file->move($destinationPath, $name);

                        if(!$value) $value = '';

                        Partner::create([
                            'anchor' => htmlspecialchars($value),
                            'logo' => $name
                        ]);
                    }
                }
            }if(strpos($key, 'partnersDelete-')!== false && $value){
                $partner = Partner::where('id', htmlspecialchars($value))->first();

                if($partner){
                    if(File::exists('images/uploads/'.$partner['logo'])){
                        File::delete('images/uploads/'.$partner['logo']);
                    }
                    $partner->delete();
                }
            }
        }

        return Redirect::back()->with('successMessage', 'La página ha sido modificada con éxito.');
    }

    //---------- U P L O A D   I M A G E ----------//

    function uploadImage(Request $request, $id, $type){
        if($id && $type){
            $id = htmlspecialchars($id);
            $type = htmlspecialchars($type);

            $file = $request->file('image');

            if($file){
                $image = Image::where('usedBy', $type)
                    ->where('relationId', $id)
                    ->first();

                if($image){
                    if(File::exists('images/uploads/'.$image['name'])) File::delete('images/uploads/'.$image['name']);

                    $image->delete();
                }

                try{
                    $name = bin2hex(random_bytes(mt_rand(10, 45)));
                }catch(Exception $e){
                    $name = $this->generateRandomString(mt_rand(20, 90));
                }

                $fullName = $name.'.'.$file->extension();

                $file->move(public_path().'/images/uploads/', $fullName);

                $alt = $this->generateImgAlt($fullName);

                Image::create([
                    'name' => $fullName,
                    'usedBy' => $type,
                    'relationId' => $id,
                    'alt' => $alt
                ]);

                return http_response_code(200);

            }
            return abort(400, 'Bad Request');
        }
        return abort(404);
    }

    //---------- A D M I N   C L O S E   S E S S I O N ----------//

    function closeSession(Request $request){
        Cookie::queue(Cookie::forget('user'));
        Cookie::queue(Cookie::forget('sessionToken'));
        return redirect('/');
    }

    //---------- A D M I N   U T I L S ----------//

    function validateCourseField($field){
        if(substr($field, 0, 10 ) === "moduleCode") return [0, substr($field, 10)];
        else if(substr($field, 0, 11 ) === "moduleTitle") return [1, substr($field, 11)];
        else if(substr($field, 0, 11 ) === "moduleHours") return [2, substr($field, 11)];
        else if(substr($field, 0, 8 ) === "unitCode") return [3, substr($field, 8)];
        else if(substr($field, 0, 9 ) === "unitTitle") return [4, substr($field, 9)];
        else if(substr($field, 0, 9 ) === "unitHours") return [5, substr($field, 9)];
        else return false;
    }

    function stripTagsAndAttributes($html, $allowedTags){
        if(strlen($html) < 1) return ' ';

        libxml_use_internal_errors(true);

        $dom = new DOMDocument;
        $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD);
        $xpath = new DOMXPath($dom);

        foreach ($xpath->query('//div[contains(attribute::class, "ql-hidden")]') as $el) {
            $el->parentNode->removeChild($el);
        }

        return strip_tags($dom->saveHTML(), $allowedTags);
    }

    function generateImgAlt($img){
        try{
            Cloudinary::config(array(
                "cloud_name" => "gruponewport",
                "api_key" => "136414641259278",
                "api_secret" => "OsXbCAeTgYD8Ib2CGUGTMIC_om0",
                "secure" => true
            ));

            $public_id = bin2hex(random_bytes(mt_rand(3, 5)));

            $tags = Uploader::upload(public_path().'/images/uploads/'.$img, array("public_id"=>$public_id, "categorization" => "aws_rek_tagging", "auto_tagging" => 0.9));

            Uploader::destroy($public_id);

            $alt = '';

            $data = $tags['info']['categorization']['aws_rek_tagging']['data'];

            for ($i=0; $i < Count($data); $i++){
                $alt.=$data[$i]['tag'];

                if($i+1 == Count($data)) $alt.='.';
                else $alt.=', ';
            }

            $trans = new GoogleTranslate();
            $alt = $trans->translate('en', 'es', $alt);

            return 'La imagen puede contener: '.$alt;
        }catch (Exception $e){
            return 'No disponemos de información sobre esta imagen.';
        }
    }

    function generateCourseContents($request, $id){
        $lastModule = null;

        $courseModuleRelations = Course_Module::where('courseId', $id)->get();

        foreach ($courseModuleRelations as $courseModuleRelation) $courseModuleRelation->delete();

        foreach ($request->all() as $key => $value) {
            $validation = $this->validateCourseField($key);
            if ($validation) {
                switch ($validation[0]) {
                    case 0:
                        $module = Module::where('id', $validation[1])->first();

                        if ($module) {
                            $module['code'] = htmlspecialchars($value);
                            $module->save();
                        } else {
                            $module = Module::create([
                                'code' => htmlspecialchars($value),
                                'title' => ''
                            ]);
                        }

                        Course_Module::create([
                            'courseId' => $id,
                            'moduleId' => $module['id']
                        ]);

                        $moduleUnitRelations = Module_Unit::where('moduleId', $module['id'])->get();

                        foreach ($moduleUnitRelations as $moduleUnitRelation) $moduleUnitRelation->delete();

                        $lastModule = $module;

                        break;
                    case 1:
                        $module = Module::where('id', $validation[1])->first();

                        if ($module) {
                            $module['title'] = htmlspecialchars($value);
                            $module->save();
                        }

                        break;
                    case 2:
                        $module = Module::where('id', $validation[1])->first();

                        if ($module) {
                            $module['hours'] = intval($value);
                            $module->save();
                        }

                        break;
                    case 3:
                        $unit = Unit::where('id', $validation[1])->first();

                        if ($unit) {
                            $unit['code'] = htmlspecialchars($value);
                            $unit->save();
                        } else {
                            $unit = Unit::create([
                                'code' => htmlspecialchars($value),
                                'title' => ''
                            ]);
                        }

                        Module_Unit::create([
                            'moduleId' => $lastModule['id'],
                            'unitId' => $unit['id']
                        ]);

                        break;
                    case 4:
                        $unit = Unit::where('id', $validation[1])->first();

                        if ($unit) {
                            $unit['title'] = htmlspecialchars($value);
                            $unit->save();
                        }

                        break;
                    default:
                        $unit = Unit::where('id', $validation[1])->first();

                        if ($unit) {
                            $unit['hours'] = intval($value);
                            $unit->save();
                        }
                };
            }
        }

        $professionalDepartures = Professional_Departure::where('courseId', $id)->get();

        foreach ($professionalDepartures as $professionalDeparture) $professionalDeparture->delete();

        if ($request['professionalDepartures']) {
            foreach ($request['professionalDepartures'] as $professionalDeparture) {

                $professionalDeparture = htmlspecialchars($professionalDeparture);

                Professional_Departure::create([
                    'courseId' => $id,
                    'title' => $professionalDeparture
                ]);
            }
        }
    }

    function generateQuestionnaireContents($request, $questionnaire){
        foreach ($request->all() as $key => $value){
            $strippedKey = explode('-', $key);

            try{
                if($strippedKey[0] == 'questionContent'){
                    $question = Question::create([
                        'questionnaireId' => $questionnaire['id'],
                        'type' => intval($request['questionType-'.$strippedKey[1]]),
                        'question' => htmlspecialchars($request['questionContent-'.$strippedKey[1]])
                    ]);

                    if($question['type'] == 1){
                        foreach ($request['answers-'.$strippedKey[1]] as $answer){
                            Possible_Answer::create([
                                'questionId' => $question['id'],
                                'answer' => htmlspecialchars($answer)
                            ]);
                        }
                    }
                }
            }catch (Exception $exception){
                return Redirect::back()->withErrors('Ha sucedido un error, vuelva a intentarlo más tarde.');
            }
        }
    }

    //---------- E X C E L   T O   C O U R S E S ----------//

    function excelToCourses(Request $request){
        $excel = $request->file('excel');
        $titlesLine = intval($request['excelTitlesLine'])-1;

        if ($excel != null) {
            $dir = public_path('files/temp');

            try{
                $name = bin2hex(random_bytes(mt_rand(5, 10)));
            }catch(Exception $e){
                $name = $this->generateRandomString(mt_rand(10, 20));
            }

            $name = strtotime(date('d-m-Y h:i:s')).$name.".".$excel->getClientOriginalExtension();

            $excel->move($dir, $name);

            try{
                $xlsx = new SimpleXLSX($dir.'/'.$name);
                $response = [];
                $errors = [];

                $sheetNames = $xlsx->sheetNames();

                foreach ($sheetNames as $index=>$value){
                   $rows = $xlsx->rows($index);
                   $sheetBody = [];

                   try {
                       foreach ($rows[$titlesLine] as $columnIndex => $columnValue){
                           if(strlen($columnValue) > 0) array_push($sheetBody, [$columnIndex, $columnValue, []]);
                       }

                       for ($i = 0; $i < Count($sheetBody); $i++){
                           for ($j = $titlesLine+1; $j < Count($rows); $j++){
                               array_push($sheetBody[$i][2], $rows[$j][$sheetBody[$i][0]]);
                           }
                       }

                       array_push($response, [$value, $sheetBody]);
                    }catch (Exception $e){
                        array_push($errors, 'La hoja "'.$value.'" está vacía, corrupta o tiene un formato invalido.');
                    }
                }
                if(File::exists($dir.'/'.$name)) File::delete($dir.'/'.$name);
                return Redirect::back()->with('excelParseResponse', json_encode($response))->with('excelParseErrors', json_encode($errors));
            } catch (Exception $e) {
                if(File::exists($dir.'/'.$name)) File::delete($dir.'/'.$name);
                return Redirect::back()->withErrors('Ha sucedido un error al leer el excel, es posible que esté corrupto o dañado.');
            }
        }else return Redirect::back()->withErrors('Necesita subir un archivo.');
    }

    function massiveUploadFromExcel(Request $request){
        $excelParsedData = json_decode($request['parsedData']);
        $parsedSheet = [];
        $errors = [];

        foreach ($request->all() as $key => $value){
            $keySplit = explode('-', $key);

            if(Count($keySplit) > 1){
                array_push($parsedSheet, $value);
            }
        }

        foreach ($excelParsedData as $sheet){
            foreach ($sheet[1] as $line){
                foreach ($parsedSheet as $index => $value) {
                    if ($line[1] == $value) $parsedSheet[$index] = $line[2];
                }
            }
        }

        $amountOfCourses = Count($parsedSheet[0]);

        for($i = 0; $i < Count($parsedSheet[0]); $i++){
            $title = htmlspecialchars($parsedSheet[0][$i]);
            $sector = htmlspecialchars($parsedSheet[1][$i]);
            $location = trim(strtolower($parsedSheet[2][$i]));
            $type = trim(strtolower($parsedSheet[3][$i]));
            $receiver = trim(strtolower($parsedSheet[4][$i]));
            $onSite = trim(strtolower($parsedSheet[5][$i]));
            $price = floatval($parsedSheet[6][$i]);
            $description = $this->stripTagsAndAttributes($parsedSheet[7][$i], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');
            $level = intval($parsedSheet[8][$i]);
            $hours = intval($parsedSheet[9][$i]);
            $initDate = $parsedSheet[10][$i];
            $endDate = $parsedSheet[11][$i];
            $schedule = htmlspecialchars($parsedSheet[12][$i]);
            $teacher = htmlspecialchars($parsedSheet[13][$i]);
            $teacherDescription = $this->stripTagsAndAttributes($parsedSheet[14][$i], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');
            $requirements = $this->stripTagsAndAttributes($parsedSheet[15][$i], '<h1><h2><h3><h4><h5><h6><strong><b><a><u><em><li><ul><ol><p><br><iframe><img>');

            switch ($location){
                case 'fuerteventura':
                    $location = "Fuerteventura";
                    break;
                case 'gran canaria':
                    $location = "Gran Canaria";
                    break;
                case 'tenerife':
                    $location = "Tenerife";
                    break;
                case 'lanzarote':
                    $location = "Lanzarote";
                    break;
                case 'la palma':
                    $location = "La Palma";
                    break;
                case 'la gomera':
                    $location = "La Gomera";
                    break;
                case 'el hierro':
                    $location = "El Hierro";
                    break;
                default:
                    array_push($errors, 'La localización del curso "'.$title.'" no es válida, las localizaciones válidas son "Fuerteventura",
                    "Gran Canaria", "Tenerife", "Lanzarote", "La Palma", "La Gomera" o "El Hierro".');
            }

            switch ($type){
                case 'gratuito':
                    $type = "Gratuito";
                    break;
                case 'privado':
                    $type = "Privado";
                    break;
                default:
                    array_push($errors, 'El tipo del curso "'.$title.'" no es válido, los tipos válidos son "Gratuito" o "Privado".');
            }

            switch ($receiver){
                case 'desempleados/as':
                    $receiver = "Desempleados/as";
                    break;
                case 'trabajadores/as':
                    $receiver = "Trabajadores/as";
                    break;
                case 'desempleados/as y trabajadores/as':
                    $receiver = "Desempleados/as y Trabajadores/as";
                    break;
                default:
                    array_push($errors, 'El destinatario del curso "'.$title.'" no es válido, los destinatarios válidos son "Desempleados/as",
                     "Trabajadores/as" o "Desempleados/as y Trabajadores/as"');
            }

            switch ($onSite){
                case 'presencial':
                    $onSite = "Presencial";
                    break;
                case 'semipresencial':
                    $onSite = "Semipresencial";
                    break;
                case 'teleformación':
                    $onSite = "Teleformación";
                    break;
                default:
                    array_push($errors, 'La asistencia del curso "'.$title.'" no es válida, las asistencias válidas son "Presencial",
                     "Semipresencial" o "Teleformación".');
            }

            if(strlen($initDate) > 0){
                try{
                    $initDate = date('d-m-Y', strtotime($initDate));
                }catch (Exception $e){
                    array_push($errors, 'La fecha de inicio del curso "'.$title.'" tiene un formato inválido.');
                }
            }

            if(strlen($endDate) > 0){
                try{
                    $endDate = date('d-m-Y', strtotime($endDate));
                }catch (Exception $e){
                    array_push($errors, 'La fecha de fin del curso "'.$title.'" tiene un formato inválido.');
                }
            }

            if(Count($errors) > 0) return Redirect::back()->with('excelParseResponse', json_encode($excelParsedData))->with('excelParseErrors', json_encode($errors));

            try{
                $course = Course::create([
                    'title' => $title,
                    'sector' => $sector,
                    'location' => $location,
                    'type' => $type,
                    'receiver' => $receiver,
                    'onSite' => $onSite,
                    'price' => $price,
                    'description' => $description,
                    'level' => $level,
                    'hours' => $hours,
                    'initDate' => $initDate,
                    'endDate' => $endDate,
                    'schedule' => $schedule,
                    'teacher' => $teacher,
                    'teacherDescription' => $teacherDescription,
                    'requirements' => $requirements
                ]);

                try{
                    $name = bin2hex(random_bytes(mt_rand(10, 45)));
                }catch(Exception $e){
                    $name = $this->generateRandomString(mt_rand(20, 90));
                }

                $name = $name.'.jpg';

                File::copy(public_path('images/excelToCoursesImg.jpg'), public_path('images/uploads/'.$name));

                Image::create([
                    'name' => $name,
                    'usedBy' => 'course',
                    'relationId' => $course['id'],
                    'alt' => 'La imagen contiene a una persona realizando un examen tipo test.'
                ]);
            }catch (Exception $e){
                return Redirect::back()->withErrors('Ha sucedido un error al intentar subir el curso "'.$title.'", compruebe que el excel no contiene ningún valor inválido.');
            }
        }
        return Redirect::back()->with('successMessage', 'Los cursos han sido creados correctamente.');
    }

    function getFiles(){
        $files = [];

        if ($handle = opendir(public_path('files/source'))) {
            while (false !== ($entry = readdir($handle))) {

                if ($entry != "." && $entry != "..") {

                    array_push($files, $entry);
                }
            }
            closedir($handle);
        }

        return $files;
    }

    function getGenericTexts(){
        $genericTexts = [];
        $pageGenericTexts = Page::where('page', 'generic')->get();

        foreach ($pageGenericTexts as $pageGenericText) $genericTexts[$pageGenericText['name']] = $pageGenericText['value'];

        return $genericTexts;
    }
}
