<?php

namespace App\Http\Controllers;

use App\Models\SendText;
use App\Models\TelegramUser;
use App\Models\User;
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
        return view('home');
    }

    public function users()
    {
        $users = TelegramUser::paginate(30);
        return view('users.index', compact('users'));
    }

    public function telegram()
    {
        $text_model = SendText::query()->where('id',1)->firstOrNew();

        return view('mailing.create', compact('text_model'));
    }

    public function save_texts(Request $request)
    {
        $text_model = SendText::query()->where('id',1)->firstOrNew();
        $text_model->text = $request->text;
        $text_model->btn_text = $request->btn_text;
        $text_model->btn_href = $request->btn_href;
        $text_model->save();
        return view('mailing.start', compact(['text_model']));
    }
    public function get_chats(){
        $users_id = TelegramUser::all();
        $str = '';
        foreach ($users_id as $user){
            $str = $str.''.$user->chat_id.'.';
        }
        return $str;
    }
}
