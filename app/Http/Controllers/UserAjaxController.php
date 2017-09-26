<?php
namespace App\Http\Controllers;
use App\AdditionalEmails;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserAjaxController extends Controller {
    public function index($user_id){
        $additional_emails = AdditionalEmails::where('user_id', $user_id)->get();

        $emails = [];
        foreach ($additional_emails as $email) {
            $emails[] = $email->email;
        }

        return response()->json($emails, 200);
    }
}