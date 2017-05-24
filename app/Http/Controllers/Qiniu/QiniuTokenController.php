<?php

namespace App\Http\Controllers\Qiniu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\Upload\MakeQiNiuToken;

class QiniuTokenController extends Controller
{
    public $qiniu;

    public function __construct(MakeQiNiuToken $makeQiNiuToken)
    {
        $this->qiniu = $makeQiNiuToken;
    }

    /**
     * 获取七牛上传凭证的方法
     *
     * @author  cxs
     * @date    20170428
     */
    public function getQiniuToken()
    {

        // 获取上传凭证Token
        $token = $this->qiniu->makeUploadToken();

        if ($token) {
            return response()->json(['message' => '获取成功', 'resData' => ['uptoken' => $token]]);
        } else {
            return response()->json(['message' => '获取失败', 'resData' => ['uptoken' => '']]);
        }

    }
}
