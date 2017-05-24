<?php
/**
 * Created by PhpStorm.
 * User: cxs
 * Date: 17-4-28
 * Time: 上午11:50
 */

namespace App\Library\Upload;

use Qiniu\Auth;

class MakeQiNiuToken
{
    /**
     * 生成七牛云上传凭证（Token）的方法
     *
     * @param   $path
     * @return  string
     * @author  cxs
     * @date    20170428
     */
    public function makeUploadToken()
    {
        // 获取Access_Key和Secret_Key
        $accessKey = env('QINIU_ACCESSKEY');
        $secretKey = env('QINIU_SECRETKEY');

        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);

        // 要上传的空间
//        $bucket = 'developer'.$path;
        $bucket = env('QINIU_BUCKET');

        // 生成上传 Token
        $token = $auth->uploadToken($bucket);

        return $token;
    }
}
