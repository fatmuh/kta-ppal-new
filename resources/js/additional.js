import Toastify from "toastify-js";
(function () {
    "use strict";

    window.showAlert = function (type) {
        if (type === 'success') {
            Toastify({
                node: $("#success-notification-content")
                    .clone()
                    .removeClass("hidden")[0],
                duration: 4500,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
            }).showToast();
        }
        else if (type === 'error') {
            Toastify({
                node: $("#failed-notification-content")
                    .clone()
                    .removeClass("hidden")[0],
                duration: 4500,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
            }).showToast();
        }
    }

    if ($("#failed-notification-content").length) {
        window.showAlert('error');
    }

    if ($("#success-notification-content").length) {
        window.showAlert('success');
    }

})()

