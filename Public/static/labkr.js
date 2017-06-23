/**
 * Created by zhangmingwen on 2017/4/27.
 */
/**
 * 获取指定的URL参数值
 * URL:http://www.quwan.com/index?name=tyler
 * 参数：paramName URL参数
 * 调用方法:getParam("name")
 * 返回值:tyler
 */
function getParam(paramName) {
    paramValue = "", isFound = !1;
    if (this.location.search.indexOf("?") == 0 && this.location.search.indexOf("=") > 1) {
        arrSource = unescape(this.location.search).substring(1, this.location.search.length).split("&"), i = 0;
        while (i < arrSource.length && !isFound) arrSource[i].indexOf("=") > 0 && arrSource[i].split("=")[0].toLowerCase() == paramName.toLowerCase() && (paramValue = arrSource[i].split("=")[1], isFound = !0), i++
    }
    return paramValue == "" && (paramValue = null), paramValue
}


/**
 * 首先获取 Url，然后把 Url 通过 // 截成两部分，再从后一部分中截取相对路径。如果截取到的相对路径中有参数，则把参数去掉。
 * 调用方法：GetUrlRelativePath();
 * 举例：假如当前 Url 是 http// www. xxx. com/pub/item.aspx?t=osw7，则截取到的相对路径为：/pub/item.aspx。
 * @returns {string}
 * @constructor
 */

function GetUrlRelativePath()
{
    var url = document.location.toString();
    var arrUrl = url.split("//");

    var start = arrUrl[1].indexOf("/");
    var relUrl = arrUrl[1].substring(start);//stop省略，截取从start开始到结尾的所有字符

    if(relUrl.indexOf("?") != -1){
        relUrl = relUrl.split("?")[0];
    }
    return relUrl;
}


/**
 * 后台选中高亮
 * @param url
 */
function highlight_subnav(url){
    $('.side-sub-menu').find('a[href="'+url+'"]').closest('li').addClass('active');
}
/**
 * 前台选中高亮
 * @param url
 */
function highlight_nav(url){
    $('#head_nav').find('a[href="'+url+'.html"]').addClass('xuanzong');
}

/**
 * 删除操作跳转
 * @param url
 * @param data
 */
function todelete(url, data) {
    $.post(
        url,
        data,
        function(s){
            if(s.status == 1) {
                return dialog.success(s.msg,'');
                // 跳转到相关页面
            }else {
                return dialog.error(s.msg);
            }
        }
        ,"JSON");
}
/**
 * 加载中组合
 * <button class="btn btn-danger loading-btn"><span  class="glyphicon glyphicon-floppy-disk"></span>发布</button>
 * @param btn
 */
function lab_loading(btn) {
    $(btn).addClass('disabled');
    $(btn).children('span').addClass('loading');

}
/**
 * 加载中组合
 * @param btn
 */
function lab_endLoading(btn) {
    $(btn).removeClass('disabled');
    $(btn).children('span').removeClass('loading');
}


