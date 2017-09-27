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
            $emails[] = ['email' => $email->email, 'email_id' => $email->id];
        }

        return response()->json($emails, 200);
    }

    public function add_user_additional_email(Request $request)
    {
        $additional_email = new AdditionalEmails();
        $additional_email->email = $request->email;
        $additional_email->user_id = (int)$request->user_id;

        $errors = self::check_errors($additional_email);
        $was_saved = false;

        if(empty($errors))
        {
            $was_saved = $additional_email->save();
        }

        $return_data = array(
            'was_saved' => $was_saved,
            'data' =>array(
                'user_email' => $additional_email->email,
                'email_id'=> $additional_email->id,
                'user_id' =>$additional_email->user_id),
            'errors' => $errors
        );

        return response()->json($return_data, 200);
    }

    public function delete_email($id)
    {
        $additional_email = AdditionalEmails::find($id);
        $was_deleted =  $additional_email->delete();

        return response()->json(array('was_deleted' => $was_deleted), 200);

    }

    private static function check_errors(AdditionalEmails $additional_email) :array
    {
        $errors = array();

        if(!filter_var($additional_email->email, FILTER_VALIDATE_EMAIL))
        {
            $errors[] = "Email is in wrong format";
        }

        if(!$additional_email->user_exist())
        {
            $errors[] = "User do not exist";
        }

        if($additional_email->email_exist())
        {
            $errors[] = "Email exist";
        }

        return $errors;
    }
}