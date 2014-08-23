<?php

class UserInfo extends \Eloquent
{

    protected $table = 'user_info';

    protected $guarded = array('id');

    protected $fillable = array('user_id', 'birthday', 'gender', 'username', 'bio', 'cellphone', 'address');

    // Define gender
    const GENDER_OTHER = 0;     // undefine
    const GENDER_MALE = 1;      // male
    const GENDER_FEMALE = 2;    // female

    /**
     * Get the relation owner
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public static function getGenderConvert($gender)
    {
        switch (strtolower($gender)) {

            case 'male':
                return self::GENDER_MALE;
                break;
            case 'female':
                return self::GENDER_FEMALE;
                break;
            case self::GENDER_MALE:
                return 'male';
                break;
            case self::GENDER_FEMALE:
                return 'female';
                break;
            default:
                return 0;
                break;
        }
    }
}
