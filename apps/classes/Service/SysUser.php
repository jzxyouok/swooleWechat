<?php
namespace App\Service;

/**
 * 系统用户服务类
 * @package App\Service
 */
class SysUser
{
    /**
     * 系统用户模型
     * @var \App\Model\SysUser
     */
    private $sysUserModel;
    public function __construct()
    {
        $this->sysUserModel = model('SysUser');
    }

    /**
     * 保存用户信息
     * @param array $data
     */
    public function saveData($data = [])
    {
        $id = (int) $data['id'];
        $saveData = [
            'userName' => $data['userName'],
            'groupId' =>$data['groupId'],
            'account' => $data['account'],
            'email' => $data['email'],
        ];
        if (empty($saveData['account'])){
            throw new \Exception('请填写用户帐号 ');
        }
        if (!$id && !$data['password']){
            throw new \Exception('请填写新用户密码');
        }
        if ($data['password']){
            if (\Swoole\Validate::check('password', $saveData['password'])){
                throw new \Exception('密码格式不合法');
            }
            $saveData['password'] = \Swoole\Auth::makePasswordHash($saveData['account'], $data['password']);
        }
        if (empty($saveData['userName'])){
            throw new \Exception('请填写用户名称');
        }
        if (\Swoole\Validate::check('nickname', $saveData['userName'])){
            throw new \Exception('用户名称不合法');
        }
        if (empty($saveData['groupId'])){
            throw new \Exception('请选择用户所属用户组');
        }
        if ($saveData['email'] && \Swoole\Validate::check('email', $saveData['email'])){
            throw new \Exception('请填写正确的邮箱格式');
        }
        if ($id){//编辑

        }else{

        }
    }
}