<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $verifyCode;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
            ['verifyCode', 'captcha'],
            ['username', 'checkLoginLimit'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'rememberMe' => '自动登录',
            'verifyCode' => '验证码',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '无效的用户名或密码。');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    /**
     * 检查登录频率限制
     *
     * @param $username
     * @return void
     * @throws BusinessException
     */
    protected function checkLoginLimit($attribute)
    {
        $username = $this->username;
        $limitLoginPath = runtime_path() . '/login';
        if (!is_dir($limitLoginPath)) {
            mkdir($limitLoginPath, 0777, true);
        }
        $limitFile = $limitLoginPath . '/' . md5($username) . '.limit';
        $time = date('YmdH') . ceil(date('i') / 5);
        $limitInfo = [];
        if (is_file($limitFile)) {
            $jsonStr = file_get_contents($limitFile);
            $limitInfo = json_decode($jsonStr, true);
        }

        if (!$limitInfo || $limitInfo['time'] != $time) {
            $limitInfo = [
                'username' => $username,
                'count' => 0,
                'time' => $time
            ];
        }
        $limitInfo['count']++;
        file_put_contents($limitFile, json_encode($limitInfo));
        if ($limitInfo['count'] >= 5) {
            $this->addError($attribute, '登录失败次数过多，请5分钟后再试');
        }
    }

    /**
     * 解除登录频率限制
     * @param $username
     * @return void
     */
    protected function removeLoginLimit()
    {
        $limitLoginPath = runtime_path() . '/login';
        $limitFile = $limitLoginPath . '/' . md5($this->username) . '.limit';
        if (is_file($limitFile)) {
            unlink($limitFile);
        }
    }
}
