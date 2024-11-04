/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * @LARAVEL_ECHO
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from "laravel-echo";

import Pusher from "pusher-js";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? "mt1",
    wsHost: import.meta.env.VITE_PUSHER_HOST
        ? import.meta.env.VITE_PUSHER_HOST
        : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? "https") === "https",
    enabledTransports: ["ws", "wss"],
});

/****************************  @PUBLIC_CHANNEL  ****************************/

window.Echo.channel(`new-user-channel`)
    .listen(
        ".new_user_register",
        (data) => {
            // data it's the data form constrctur in event NewUserRegisteredEvent $user + $message
            console.log(data['message']);
            $(".notificationsIcon").load(" .notificationsIcon > *");
            $("#notificationsModal").load(" #notificationsModal > *");
        }
    );

// this if we have another event in the same channel
// .listen("NewUserRegisteredEvent", (data) => {
// });

/****************************  @PRIVATE_CHANNEL ****************************/

// window.Echo.private(`new-user-channel`).listen(
//     "NewUserRegisteredEvent",
//     (data) => {
//         console.log(data);
//         $(".notificationsIcon").load(" .notificationsIcon > *");
//         $("#notificationsModal").load(" #notificationsModal > *");
//     }
// );

/****************************  @PRESENCE_CHANNEL ****************************/

window.Echo.join(`admin_room_channel`)
    .here((users) => {
        console.log('here :');
        console.log(users);
        $.each(users, function (index, user) {
            $(".onlineAdmins").append($("<li>").text(user.name));
        });
    })

    .joining((user) => {
        console.log('here :');
        console.log(user.name);
        $(".onlineAdmins").append($("<li>").text(user.name));
    })

    .leaving((user) => {
        console.log('leaving :');
        console.log(user.name);
        $(".onlineAdmins li:contains('" + user.name + "')").remove();
    })

    .error((error) => {
        console.log("error :");
        console.error(error);
    });

/**************************** @WebSocket ****************************/
// window.Echo = new Echo({
//     broadcaster: "pusher",
//     key: "WebSocketKEY",
//     wsHost: window.location.hostname,
//     wsPort: 6001,
//     forceTLS: false,
//     disableStats: true,
//     cluster: "mt1",
// });
