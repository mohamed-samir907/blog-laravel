function Loader(args) {
    params = [];
    if (window.jQuery) {
        if (!args.selector) {
            console.error("slecter not found !");
        } else if (!args.routs) {
            console.error("route not found !");
        } else if (this.checkRouts(args) !== null) {
            console.error(this.checkRouts(args));
        } else {
            this.args = args
            this.loadPage(location.pathname);
            this.watchLink();
            this.onUrlChange();
        }
    }
    else {
        console.error("jQuery not found");
    }
}

Loader.prototype.onUrlChange=function(){
    var that =this;
    window.addEventListener('popstate', function (e) {
        that.loadPage(location.pathname);
    });
}
Loader.prototype.checkRouts = function (args) {
    var errors = null;
    for (let i = 0; i < args.routs.length; i++) {
        if (!args.routs[i].path) {
            errors = "path is not fount";
        } else if (!args.routs[i].view) {
            errors = "view not fount";
        } else if (args.routs[i].path.indexOf("/") == (-1)) {
            errors = "error in path";
        }
    }
    return errors
}

//watch click link
Loader.prototype.watchLink = function () {
    var that = this;
    $(document).on('click', 'a[load-href]', function () {
        var link = $(this).attr('load-href');
        that.loadPage(link);
        history.pushState("", document.title, link);

    });
}

//load views and comopnents
Loader.prototype.loadPage = function (url) {

    var url = url.substr(1);
    for (i = 0; i < this.args.routs.length; i++) {
        if (this.args.routs[i].path && this.args.routs[i].view) {
            
            var path = this.args.routs[i].path;
            if (this.checkParms(path) == true) {
                if (url.split("/").length == path.split("/").length - 1) {
                    var cutPath = path.substring(path.indexOf("{") - 1, path.length);
                    var cutUrl = "/" + url.split("/").splice(-cutPath.split("/").length + 1).join("/");
                    this.parseParams(cutPath, cutUrl);
                    path = path.replace(cutPath, "");
                    url = url.replace(cutUrl, "");
                    (url == path.substr(1)) ? this.loadView(this.args.selector, this.args.routs[i].view) : null
                }
            } else {
                if (url == path.substr(1)) {
                    params = [];
                    this.loadView(this.args.selector, this.args.routs[i].view)
                }

            }

        }
    }

}


Loader.prototype.loadView = function (selector, view) {
    $.ajax({
        url: "/" + view,
         beforeSend: function(){
            $('.progress').removeClass('hide');
            $('.progress').css({
                width:   100 + '%'
            });
        },
        success: function (view) {
              $('.progress').css({
                width:   0 + '%'
            });
            $('.progress').addClass('hide');
            $(selector).html(view);
        }
      
    })
}

//check path is consests params
Loader.prototype.checkParms = function (path) {
    if (path.indexOf("{") !== (-1) && path.indexOf("}") !== (-1)) {
        var st_param = path.substring(path.indexOf("{") - 1, path.length);
        var arr_param = st_param.split('/')
        arr_param.shift()
        if (path.match(/{/gi).length === arr_param.length && path.match(/}/gi).length === arr_param.length) {
            return true
        } else {
            console.error('path is uncorrected } !');
            return false
        }
    }
}

// paresing parameters
Loader.prototype.parseParams = function (cutPath, cutUrl) {
    var cutPath = cutPath.split("/");
    cutPath.shift();
    var cutUrl = cutUrl.split("/");
    cutUrl.shift();
    params = this.parseArray(cutPath, cutUrl)
}

//convert two array to one object
Loader.prototype.parseArray = function (keys, vals) {
    return keys.reduce(
        function (prev, val, i) {
            prev[val.replace(/[^a-z\.]+/g, "")] = vals[i];
            return prev;
        }, {}
    );
}

