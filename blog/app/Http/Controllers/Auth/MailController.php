<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MailController extends Controller{
    public function home(){
        return view("mail.home");
    }
}
?>