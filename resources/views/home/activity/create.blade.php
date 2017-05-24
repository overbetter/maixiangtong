<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form class="form-horizontal" role="form" id="container" action="{{url('/activity')}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="domain" id="domain" value="{{env('QINIU_DOMAIN')}}">
            <div class="form-group">
                <label class="col-sm-2 control-label">活动标题</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="活动标题">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">活动要求</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="demand" value="{{ old('demand') }}" placeholder="活动要求">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">活动海报</label>
                <div class="col-sm-10">
                    <img src="http://fpoimg.com/400x300?text=maixiangtong.com" alt="活动海报" id="pickfiles">
                    <input type="hidden" name="poster" id="poster" value="{{ old('poster') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">活动类别</label>
                <div class="col-sm-10">
                    <select class="form-control" name="type" {{ old('type') }}>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">是否为定期活动</label>
                <div class="col-sm-10">
                    <label class="checkbox-inline">
                        <input type="radio" name="is_regular" value="1" checked>定期活动
                    </label>
                    <label class="checkbox-inline">
                        <input type="radio" name="is_regular" value="0">动态活动
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">活动介绍</label>
                <div class="col-sm-10">
                    <textarea rows="6" class="form-control" name="introduction">{{ old('introduction') }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">提交</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/plupload/2.1.1/moxie.js"></script>
    <script src="https://cdn.bootcss.com/plupload/2.3.1/plupload.full.min.js"></script>
    <script src="https://cdn.bootcss.com/plupload/2.1.1/i18n/zh_CN.js"></script>
    <script type="text/javascript" src="http://jssdk.demo.qiniu.io/src/qiniu.js"></script>
    <script type="text/javascript" src="/js/activity-upload-img.js"></script>
    <script>

    </script>
</body>
</html>