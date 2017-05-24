/**
 * Created by hgz on 17-5-23.
 */
var option1={
    runtimes: 'html5,flash,html4',
    browse_button: 'pickfiles',
    container: 'container',           // 上传区域DOM ID，默认是browser_button的父元素
    max_file_size: '4mb',            // 最大文件体积限制
    flash_swf_url: 'bower_components/plupload/js/Moxie.swf', //引入flash，相对路径
    max_retries: 3,                     // 上传失败最大重试次数
    dragdrop: true,                     // 开启可拖曳上传
    drop_element: 'container',          // 拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
    chunk_size: '4mb',                  // 分块上传时，每块的体积
    multi_selection: true,
    uptoken_func: function(){
        var ajax = new XMLHttpRequest();
        ajax.open('GET',"/get-qiniu-token", false);
        ajax.setRequestHeader("If-Modified-Since", "0");
        ajax.send();
        if (ajax.status === 200) {
            var res = JSON.parse(ajax.responseText);
            console.log('custom uptoken_func:' + res.resData['uptoken']);
            return res.resData['uptoken'];
        } else {
            console.log('custom uptoken_func err');
            return '';
        }
    },
    domain: $('#domain').val(),   // bucket域名，下载资源时用到，必需
    get_new_uptoken: false,      // 设置上传文件的时候是否每次都重新获取新的uptoken
    // downtoken_url: '/downtoken',  // Ajax请求downToken的Url，私有空间时使用，JS-SDK将向该地址POST文件的key和domain，服务端返回的JSON必须包含url字段，url值为该文件的下载地址
    unique_names: false, // 默认false，key为文件名。若开启该选项，JS-SDK会为每个文件自动生成key（文件名）
    save_key: false,    // 默认false。若在服务端生成uptoken的上传策略中指定了sava_key，则开启，SDK在前端将不对key进行任何处理
    auto_start: true,    // 选择文件后自动上传，若关闭需要自己绑定事件触发上传
    log_level: 5,
    init: {
        'FilesAdded': function(up, files) {
            if(files.length > 3){
                alert('已超出图片最多上传张数！');
                uploader.splice(0, files.length);//从上传队列中移除一部分文件
                uploader.stop();
            }else{
                plupload.each(files, function(file) {
                    // 文件添加进队列后，处理相关的事情
                    var reader = new FileReader();
                    reader.readAsDataURL(file.getNative());
                    reader.onload = (function (e) {
                        var image = new Image();
                        image.src = e.target.result;
                        image.onload = function () {
                            if (this.width > 800 && this.height > 600) {
                                uploader.start();
                            } else {
                                alert('尺寸不符');
                                up.removeFile(file);
                                up.stop();
                            }
                        };
                    });
                });
            }
        },
        'BeforeUpload': function(up, file) {
            // 每个文件上传前，处理相关的事情
            // if (up.runtime === 'html5' && chunk_size) {
            //     progress.setChunkProgess(chunk_size);
            // }
        },
        'UploadProgress': function(up, file) {
            // 每个文件上传时，处理相关的事情
        },
        'UploadComplete': function() {

        },
        'FileUploaded': function(up, file, info) {
            //$('#headimage').val($('#domain').val()+file.name);
            var domain = up.getOption('domain');
            var res = JSON.parse(info);
            var sourceLink = domain +"/"+ res.key; //获取上传成功后的文件的Url
            $('#pickfiles').attr('src',sourceLink);
        },
        'Error': function(up, err, errTip) {
            //上传出错时，处理相关的事情
        },
        'Key': function(up, file) {
            // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
            // 该配置必须要在unique_names: false，save_key: false时才生效
            var timestamp = Date.parse(new Date());
            timestamp = timestamp / 1000;
            var round = parseInt(99999*Math.random()+10000)
            var key = round+timestamp+'.png';
            return key
        }
    }
};
var uploader = Qiniu.uploader(option1);