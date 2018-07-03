webpackJsonp([8],{

/***/ 136:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(137);


/***/ }),

/***/ 137:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);

/**
 * 
 * 分页功能
 */
var page = {
    "pageId": "",
    "data": null,
    "maxshowpageitem": 5, //最多显示的页码个数
    "pagelistcount": 10, //每一页显示的内容条数
    "init": function init(listCount, currentPage, options) {
        this.data = options.data, this.pageId = options.id, this.maxshowpageitem = options.maxshowpageitem, //最多显示的页码个数
        this.pagelistcount = options.pagelistcount; //每一页显示的内容条数
        page.initPage(listCount, currentPage);
    },
    /**
       * 初始化数据处理
       * @param listCount 列表总量
       * @param currentPage 当前页
       */
    "initPage": function initPage(listCount, currentPage) {
        var maxshowpageitem = page.maxshowpageitem;
        if (maxshowpageitem != null && maxshowpageitem > 0 && maxshowpageitem != "") {
            page.maxshowpageitem = maxshowpageitem;
        }
        var pagelistcount = page.pagelistcount;
        if (pagelistcount != null && pagelistcount > 0 && pagelistcount != "") {
            page.pagelistcount = pagelistcount;
        }
        page.pagelistcount = pagelistcount;
        if (listCount < 0) {
            listCount = 0;
        }
        if (currentPage <= 0) {
            currentPage = 1;
        }

        page.setPageListCount(listCount, currentPage);
    },
    /**
     * 初始化分页界面
     * @param listCount 列表总量
     */
    "initWithUl": function initWithUl(listCount, currentPage) {
        var pageCount = 1;
        if (listCount >= 0) {
            var pageCount = listCount % page.pagelistcount > 0 ? parseInt(listCount / page.pagelistcount) + 1 : parseInt(listCount / page.pagelistcount);
        }
        var appendStr = page.getPageListModel(pageCount, currentPage);
        $("#" + page.pageId).html(appendStr);
    },
    /**
     * 设置列表总量和当前页码
     * @param listCount 列表总量
     * @param currentPage 当前页码
     */
    "setPageListCount": function setPageListCount(listCount, currentPage) {
        listCount = parseInt(listCount);
        currentPage = parseInt(currentPage);
        page.initWithUl(listCount, currentPage);
        page.initPageEvent(listCount);
        page.viewPage(currentPage, listCount, page.pagelistcount, page.data);
        //      fun(currentPage);
    },
    //页面显示功能
    "viewPage": function viewPage(currentPage, listCount, pagelistcount, data) {
        var NUM = listCount % pagelistcount == 0 ? listCount / pagelistcount : parseInt(listCount / pagelistcount) + 1;
        if (currentPage == NUM) {
            var result = data.slice((currentPage - 1) * pagelistcount, data.length);
        } else {
            var result = data.slice((currentPage - 1) * pagelistcount, (currentPage - 1) * pagelistcount + pagelistcount);
        }
        options.callBack(result);
    },
    "initPageEvent": function initPageEvent(listCount) {
        $("#" + page.pageId + ">li[class='pageItem']").on("click", function () {
            page.setPageListCount(listCount, $(this).attr("page-data"), page.fun);
        });
    },
    "getPageListModel": function getPageListModel(pageCount, currentPage) {
        var prePage = currentPage - 1;
        var nextPage = currentPage + 1;
        var prePageClass = "pageItem";
        var nextPageClass = "pageItem";
        if (prePage <= 0) {
            prePageClass = "pageItemDisable";
        }
        if (nextPage > pageCount) {
            nextPageClass = "pageItemDisable";
        }
        var appendStr = "";
        // appendStr+="<li class='"+prePageClass+"' page-data='1' page-rel='firstpage'>首页</li>";
        appendStr += "<li class='" + prePageClass + "' page-data='" + prePage + "' page-rel='prepage'>&lt;上一页</li>";
        var miniPageNumber = 1;
        if (currentPage - parseInt(page.maxshowpageitem / 2) > 0 && currentPage + parseInt(page.maxshowpageitem / 2) <= pageCount) {
            miniPageNumber = currentPage - parseInt(page.maxshowpageitem / 2);
        } else if (currentPage - parseInt(page.maxshowpageitem / 2) > 0 && currentPage + parseInt(page.maxshowpageitem / 2) > pageCount) {
            miniPageNumber = pageCount - page.maxshowpageitem + 1;
            if (miniPageNumber <= 0) {
                miniPageNumber = 1;
            }
        }
        var showPageNum = parseInt(page.maxshowpageitem);
        if (pageCount < showPageNum) {
            showPageNum = pageCount;
        }
        for (var i = 0; i < showPageNum; i++) {
            var pageNumber = miniPageNumber++;
            var itemPageClass = "pageItem";
            if (pageNumber == currentPage) {
                itemPageClass = "pageItemActive";
            }

            appendStr += "<li class='" + itemPageClass + "' page-data='" + pageNumber + "' page-rel='itempage'>" + pageNumber + "</li>";
        }
        appendStr += "<li class='" + nextPageClass + "' page-data='" + nextPage + "' page-rel='nextpage'>下一页&gt;</li>";
        // appendStr+="<li class='"+nextPageClass+"' page-data='"+pageCount+"' page-rel='lastpage'>尾页</li>";
        return appendStr;
    }
};
var datas = [{ 'id': 1, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 2, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 22, 'price': 15.1, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 3, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 14, 'price': 25.7, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 4, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 46, 'price': 41.2, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 5, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 23, 'price': 19.6, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 6, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 34, 'price': 28.6, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 7, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 12, 'price': 38.1, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 8, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 55.1, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 9, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 53.5, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 面积: 57-700m²' }, { 'id': 10, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 11, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 12, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 13, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 14, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 15, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 16, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 17, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 18, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 19, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 20, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 21, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 22, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 23, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 24, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 25, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 26, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 27, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 28, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 29, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }, { 'id': 30, 'imgSrc': '/we_img/house_show_img.png', 'name': '泛海民生金融中心', 'tao': 17, 'price': 37.3, 'location': '地址: [江汉]淮海路与云霞路交汇处向...', 'acverge': '面积: 57-700m²' }];
var options = {
    'id': 'page',
    'data': datas,
    'maxshowpageitem': 5,
    'pagelistcount': 6,
    callBack: function callBack(result) {
        var content = '';
        for (var i = 0; i < result.length; i++) {
            content += "\n            <div class=\"detail\">\n                <div class=\"img_box\">\n                <img src=\"" + result[i].imgSrc + "\" alt=\"\">\n                </div>\n                <div class=\"detail_title\">\n                <div class=\"house_name clearfix\">\n                    <div class=\"name f_l\">" + result[i].name + "</div>\n                    <span class='js_tao'>(" + result[i].tao + "\u5957)</span>\n                    <div class=\"price f_r\"><span class=\"js_acvergePrice\">" + result[i].price + "</span>\u5143/m\xB2\u6708</div>\n                </div>\n                <div class=\"house_location\">" + result[i].location + "</div>\n                <div class=\"house_acverge\">" + result[i].acverge + "</div>\n                <div class=\"acverge_select\">\n                    <ul>\n                    <li><a href=\"javascript:void(0);\">210m\xB2</a></li>\n                    <li><a href=\"javascript:void(0);\">210m\xB2</a></li>\n                    <li><a href=\"javascript:void(0);\">210m\xB2</a></li>\n                    <li><a href=\"javascript:void(0);\">210m\xB2</a></li>\n                    <li><a href=\"javascript:void(0);\">210m\xB2</a></li>\n                    <li><a href=\"javascript:void(0);\">\u66F4\u591A...</a></li>\n                    </ul>\n                </div>\n                <div class=\"house_special\">\n                    <ul>\n                    <li style=\"color:#849aae;background-image: linear-gradient(#f4f7f9,#f4f7f9);\"><span class=\"icon\"></span>\u4EA4\u901A\u4FBF\u5229</li>\n                    <li style=\"color:#59c6d3;background-image: linear-gradient(#e1f5f8,#e1f5f8);border-radius:2px;\"><span class=\"icon\"></span>\u7E41\u534E\u5730\u6BB5</li>\n                    <li style=\"color:#45c28d;background-image: linear-gradient(#e1f5ed,#e1f5ed);border-radius:2px;\"><span class=\"icon\"></span>\u5730\u94C1\u5341\u5206\u949F</li>\n                    </ul>\n                </div>\n            </div>\n        </div>\n        ";
        }
        $(".house_show > .js_content").html(content);
    }
};
page.init(datas.length, 1, options);
var houseModel = $(".js_content > div").eq(0).prop("outerHTML");
var houseData = getData();
nowHouseData = houseData;
// console.log(houseModel);
$(function () {
    //添加current
    $(".item > .js_addCurrent").on("click", function () {
        $(this).addClass("current");
        $(this).parent().siblings().children().removeClass("current");
    });
    $(".js_area .js_addCurrent").click(function () {
        $(".area_detail").show();
    });
    $(".js_area .all").click(function () {
        $(".area_detail").hide();
    });
    $(".js_subway .js_addCurrent").click(function () {
        $(".subway_detail").show();
    });
    $(".js_subway .all").click(function () {
        $(".subway_detail").hide();
    });
    $(".item > .js_addCurrent").on("click", function () {
        if ($(".all.current").length === $(".all").length) {
            $(".js_result").hide();
        } else {
            $(".js_result").show();
            // console.log($(this).parents(".list").parent("div").attr("class"));
            if (!$(this).hasClass("all")) {
                $(".selected_box > .js_" + $(this).parents(".list").parent().attr("class")).remove();
                $(".selected_box").append("<div class='selected js_" + $(this).parents(".list").parent().attr("class") + "'>" + $(this).html() + "<span class='close'> &nbspx</span></div>");
                console.log($(".selected_box > .js_" + $(this).parents(".list").parent().attr("class")));
            } else {
                $(".selected_box > .js_" + $(this).parents(".list").parent().attr("class")).remove();
            }
        }
        $(".close").on("click", function () {
            $(this).parents(".selected").remove();
            if ($(".selected").length === 0) {
                $(".js_result").hide();
            }
        });
        $(".js_cleaning").on("click", function () {
            $(".js_result > .selected_box > .selected").remove();
            if ($(".selected").length === 0) {
                $(".js_result").hide();
            }
        });
    });
    $(".js_order_selected").on("click", function () {
        alert('成功订阅');
        $(".js_result").hide();
    });
    $(".title_right > div > a").on("click", function () {
        $(this).addClass("current");
        $(this).parent("div").siblings().children("a").removeClass("current");
    });
    $(".js_order_price").on("click", function () {
        $(this).toggleClass("js_set");
        var status = $(this).hasClass("js_set");
        console.log(status);
        var data = getData();
        console.log(data);
        var orderData = setOrder(status, data);
        // console.log(orderData);

        createDom(orderData, status);
    });
    $(".sort_default").on("click", function () {
        createDom(houseData);
    });
});
function getData() {
    var data = [];
    var obj = $(".js_content > div");
    for (var i = 0; i < obj.length; i++) {
        var temp = {};
        temp.imgSrc = obj.eq(i).find("img").attr("src");
        temp.name = obj.eq(i).find(".house_name > .name").text();
        temp.tao = obj.eq(i).find(".house_name > .js_tao").text();
        temp.price = obj.eq(i).find("span.js_acvergePrice").html();
        temp.location = obj.eq(i).find(".house_acverge").html();
        temp.special = obj.eq(i).find(".house_special").html();
        data.push(temp);
    }
    return data;
}

function setOrder(Boolean, data) {
    if (Boolean) {
        for (var i = 0; i < data.length; i++) {
            for (var j = 0; j < data.length; j++) {
                if (data[i].price < data[j].price) {
                    var temp = data[i];
                    data[i] = data[j];
                    data[j] = temp;
                }
            }
        }
    } else {
        for (var i = 0; i < data.length; i++) {
            for (var j = 0; j < data.length; j++) {
                if (data[i].price > data[j].price) {
                    var temp = data[i];
                    data[i] = data[j];
                    data[j] = temp;
                }
            }
        }
    }
    return data;
}
function createDom(data) {
    $(".js_content > div").remove();
    for (var item in data) {
        var obj = $(houseModel).appendTo(".js_content");
        obj.find("img").attr("src", data[item].imgSrc);
        obj.find(".house_name > .name").html(data[item].name);
        obj.find(".house_name > .js_tao").html(data[item].tao);
        obj.find("span.js_acvergePrice").html(data[item].price);
        obj.find(".special").html(data[item].special);
    }
    nowHouseData = data;
}

/***/ })

},[136]);