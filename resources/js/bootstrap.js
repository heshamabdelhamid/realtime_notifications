
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

/**************************** @LARAVEL_ECHO ****************************/

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? "mt1",
//     wsHost: import.meta.env.VITE_PUSHER_HOST,
//     wsPort: import.meta.env.VITE_PUSHER_PORT,
//     wssPort: import.meta.env.VITE_PUSHER_PORT,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

/**************************** @WebSocket ****************************/
window.Echo = new Echo({
    broadcaster: "pusher",
    key: "MyWebSocketsKey",
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
    cluster: "mt1",
});

/**************************** @PUBLIC_CHANNEL ****************************/

window.Echo.channel(`new-user-channel`)
    .listen(".new_user_register", (data) => {
        // data it's the data form constrctur in event NewUserRegisteredEvent $user + $message
        console.log(data);
        $(".notificationsIcon").load(" .notificationsIcon > *");
        $("#notificationsModal").load(" #notificationsModal > *");
    });

// this if we have another event in the same channel
// .listen("NewUserRegisteredEvent", (data) => {
// });

/****************************  @PRIVATE_CHANNEL ****************************/

// window.Echo.private(`new-user-channel`)

//     .listen("NewUserRegisteredEvent", (data) => {
//         console.log(data);
//         $(".notificationsIcon").load(" .notificationsIcon > *");
//         $("#notificationsModal").load(" #notificationsModal > *");
//     });

/****************************  @PRESENCE_CHANNEL ****************************/

// window.Echo.join(`admin_room_channel`)

//     .here((users) => {
//         $.each(users, function (index, user) {
//             console.log("here: " + user.name);
//             $(".onlineAdmins").append($("<li>").text(user.name));
//         });
//     })

//     .joining((user) => {
//         console.log("here: " + user.name);
//         $(".onlineAdmins").append($("<li>").text(user.name));
//     })

//     .leaving((user) => {
//         console.log("leaving: " + user.name);
//         $(".onlineAdmins li:contains('" + user.name + "')").remove();
//     })

//     .error((error) => {
//         console.error("error: " + error);
//     });
