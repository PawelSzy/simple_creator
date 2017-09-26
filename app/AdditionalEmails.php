<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as User;

class AdditionalEmails extends Model
{
    public function save(array $options = [])
    {
        if($this->user_exist() and !$this->email_exist())
        {
            return parent::save($options);
        }
        else
        {
            return false;
        }
    }

    public function user_exist()
    {
        return self::check_if_user_exist((int)$this->user_id);
    }

    public function email_exist()
    {
        return self::check_if_email_exist($this->email);
    }

    private static function check_if_user_exist($user_id)
    {
        return User::findOrFail($user_id)->exists();
    }

    private static  function check_if_email_exist($email)
    {
        $user_email =  User::where('email', $email)->exists();
        $additional_emails = AdditionalEmails::where('email', $email)->exists();

        return $user_email or $additional_emails;
    }
}
