(function (global, factory) {
    if (typeof module === 'object' && typeof module.exports === 'object') {
        // For CommonJS and CommonJS-like environments where a proper window is present,
        // execute the factory and get jQuery
        // For environments that do not inherently posses a window with a document
        // (such as Node.js), expose a jQuery-making factory as module.exports
        // This accentuates the need for the creation of a real window
        // e.g. var jQuery = require("jquery")(window);
        // See ticket #14549 for more info
        module.exports = global.document ?
                factory(global, true) :
                function (w) {
                    if (!w.document) {
                        throw new Error('Robot requires a window with a document');
                    }
                    return factory(w);
                };
    } else {
        factory(global);
    }
    // Pass this if window is not defined yet

}(typeof window !== 'undefined' ? window : this, function (window, noGlobal) {
    window.myPostURL = 'http://localhost/testdriver/postHere.php';
    var Robot = function () {
    };
    Robot.prototype = {
        constructor: function () {
            this.ajaxSetup();
        },
        init: function () {
            this.work = {
                count: 0,
                data: [
                ]
            };
            this.ajaxSetup();
        },
        /**
         * Get user id from username (reload page if not exist up to [3] times)
         * @param {type} username
         * @returns {uid}
         */
        getUserId: function (username) {
            if (window.location.pathname.split("/").length != 3)
                return null; // [www.insta.com/username/] just!
            var data = window._sharedData.entry_data;
            var reload = parseInt(this.getQueryVariable('reload')) + 1;
            if (this.hasOwnProperty('user') && this.user.username === username) {
                return this.user.id;
            } else if (data.hasOwnProperty('ProfilePage') && data.ProfilePage[0].user.username === username) {
                this.user = {
                };
                this.user.id = data.ProfilePage[0].user.id;
                this.user.name = data.ProfilePage[0].user.username;
                return this.user.id;
            } else if (reload < 3) {
                window.location = window.location.pathname + '?reload=' + reload;
            }
            return null;
        },
        /**
         * Return value of url param
         * @param {type} variable
         * @returns {Number} 0 if not found
         */
        getQueryVariable: function (variable) {
            var query = window.location.search.substring(1);
            var vars = query.split('&');
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split('=');
                if (decodeURIComponent(pair[0]) === variable) {
                    return decodeURIComponent(pair[1]);
                }
            }
            return 0;
        },
        /**
         * Manipulate Ajax petitions before send to server
         * @returns {undefined}
         */
        ajaxSetup: function () {
            $.ajaxSetup({
                beforeSend: function (xhr, settings) {
                    if (settings.type == 'POST' || settings.type == 'GET' || settings.type == 'PUT' || settings.type == 'DELETE') {
                        console.log('ajaxSetup doing...!');
                        xhr.setRequestHeader('X-CSRFToken', new Robot().getCookie('csrftoken'));
                        xhr.setRequestHeader('X-Instagram-AJAX', 1);
                        console.log('ajaxSetup done...!');
                    }
                }
            });
        },
        /**
         * Search by Cookie name and return their value
         * @param {type} name
         * @returns {getCookie.cookieValue}
         */
        getCookie: function (name) {
            var cookieValue = null;
            if (document.cookie && document.cookie != '') {
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = jQuery.trim(cookies[i]);
                    // Does this cookie string begin with the name we want?
                    if (cookie.substring(0, name.length + 1) == (name + '=')) {
                        cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                        break;
                    }
                }
            }
            return cookieValue;
        },
        /**
         * [NOT WORKING!!!!] Set Cookie value 
         * @param {type} name
         * @param {type} value
         * @returns {Robot.prototype.setCookie.cookieValue}
         */
        setCookie: function (name, value) {
            document.cookie += '; ' + name + '=' + value;
        },
        /**
         * Return Following list for an user id using Ajax
         * @param {type} uid
         * @param {type} N number of contacts to load
         * @returns {undefined}
         */
        getFollowingList: function (uid, N, workerWaitFollowingList) {
            $.ajax({
                type: 'POST',
                url: '../query/',
                data: {
                    q: 'ig_user(' + uid + ') {followed_by.first(' + N + '){count, nodes {id, username, followed_by_viewer, requested_by_viewer}}}'
                },
                success: function (data) {
                    R.followList = data;
                    var users = R.followList.followed_by.nodes;
                    for (id in users) {
                        R.followUser(users[id].id);
                    }
                    workerWaitFollowingList();
                },
                dataType: 'json'
            });
        },
        /**
         * Follow user by id using Ajax
         * @param {type} uid
         * @returns {undefined}
         */
        followUser: function (uid) {
            $.ajax({
                type: 'POST',
                url: '../web/friendships/' + uid + '/follow/',
                data: null,
                success: function (data) {
                    data.id = uid;
                    R.work.data[R.work.count++] = data;
                    console.log(data);
                },
                dataType: 'json'
            });
        },
        /**
         * Unfollow user by id using Ajax
         * @param {type} uid
         * @returns {undefined}
         */
        unfollowUser: function (uid) {
            $.ajax({
                type: 'POST',
                url: '../web/friendships/' + uid + '/unfollow/',
                data: null,
                success: function (data) {
                    data.id = uid;
                    data.result = 'unfollowing';
                    R.work.data[R.work.count++] = data;
                    console.log(data);
                },
                dataType: 'json'
            });
        },
        /**
         * [NOT WORKING!!!!] Post work data to server, i.e work and followList variables
         * @returns {undefined}
         */
        postWorkDataAjax: function () {
            $.ajax({
                type: 'POST',
                url: window.myPostURL,
                crossDomain: true,
                data: {
                    followList: R.followList,
                    work: R.work
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (responseData, textStatus, errorThrown) {
                    console.log(responseData);
                    console.log(textStatus);
                    console.log(errorThrown);
                },
                dataType: 'json'
            });
        },
        /**
         * Post work data to server, i.e work and followList variables 
         * @returns {undefined}
         */
        postWorkData: function () {
            var ifr = document.createElement('iframe');
            var frm = document.createElement('form');
            frm.setAttribute('action', window.myPostURL);
            frm.setAttribute('method', 'POST');
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'work';
            input.value = $.param(R.work);
            frm.appendChild(input);
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'followList';
            input.value = $.param(R.followList);
            frm.appendChild(input);
            ifr.appendChild(frm);
            document.body.appendChild(ifr);
            frm.submit();
        }
    };

    if (typeof noGlobal === typeof undefined) {
        window.Robot = window.R = Robot;
        //console.log("window noGlobal!");
    }

    return Robot;
}));