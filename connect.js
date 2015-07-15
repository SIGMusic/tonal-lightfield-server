var ws;
var lights;

$(document).ready(function() {
    ws = new WebSocket("ws://aurora.local:7446", "nlcp");

    ws.onopen = function() {
        ws.send("list");
        ws.onmessage = function(evt) {
            if (evt.data.indexOf("Error") == -1) {
                lights = evt.data.split(",");
                $("#connected-lights").text(evt.data);
            } else {
                $("#error").text(evt.data).show();
            }
            ws.onmessage = null;
        };
    };

    ws.onclose = function() {
        console.log("Connection closed");
    };
});

$("#test-lights").on("click", function() {
    for (var i = 0; i < lights.length; i++) {
        if (!isNaN(parseInt(lights[i]))) {
            ws.send("setrgb " + lights[i] + " 255 0 0");
        }
    }
})


