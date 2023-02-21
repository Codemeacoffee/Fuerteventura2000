<?php

namespace Fuerteventura2000\Console;

use Fuerteventura2000\Course;
use Fuerteventura2000\Http\Controllers\RootController;
use Fuerteventura2000\Newsletter;
use Fuerteventura2000\Subscriber;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
           $subscribers = Newsletter::all();
           $coursesText = "";
           $newsText = "";

           $courses = app(RootController::class)->getOrderedCourses(4);
           $news = app(RootController::class)->getOrderedNews(2);

           foreach ($courses as $course){
               $coursesText.="<p><a target='_blank' href='https://www.fuerteventura2000.com/courses/".$course['location']."/".$course['type']."/".$course['title']."?key=".$course['id']."'>".$course['title']."</a></p>";
           }

           foreach ($news as $new){
               $newsText.="<p><a target='_blank' href='https://www.fuerteventura2000.com/new/".$new['title']."?key=".$new['id']."'>".$new['title']."</a></p>";
           }

           foreach ($subscribers as $subscriber){
               try{
                   $data = [
                       "email" => $subscriber['email'],
                       "courses" => $coursesText,
                       "news" => $newsText
                   ];

                   Mail::send('emails.subscriberMailing', $data, function($message) use ($data) {
                       $message->to($data["email"])->subject('Descubre nuestros cursos y noticias');
                       $message->from('noreply@fuerteventura2000.com', 'Fuerteventura2000');
                   });
               }catch (Exception $e){
                   continue;
               }
           }
        })->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
