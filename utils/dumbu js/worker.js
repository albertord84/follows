var USERS_TO_FOLLOW_COUNT = 5;

(function defer() {
    if (window.jQuery) {
        R = new Robot();
        R.init();

        var username = window.location.pathname.split("/")[1];
        var uid = R.getUserId(username);

        R.getFollowingList(uid, USERS_TO_FOLLOW_COUNT);
    } else {
        setTimeout(function () {
            defer();
        }, 50);
    }
})();