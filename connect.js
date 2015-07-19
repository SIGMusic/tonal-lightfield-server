var ws;
var lights;

function connectSocket() {
    ws = new WebSocket("ws://aurora.local:7446", "nlcp");

    ws.onopen = function() {
        $("#connection-status").text("connected");
        $("#connect-socket").text("Disconnect");
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
        $("#connection-status").text("not connected");
    };
}

$(document).ready(function() {
    connectSocket();
});

$("#test-lights").on("click", function() {
    for (var i = 0; i < lights.length; i++) {
        if (!isNaN(parseInt(lights[i]))) {
            ws.send("setrgb " + lights[i] + " 255 0 0");
        }
    }
});

$("#connect-socket").on("click", function() {
    if (ws.readyState == WebSocket.OPEN) {
        ws.close();
        $("#connect-socket").text("Connect");
    } else {
        connectSocket();
    }
})

$("#ping-test").on("click", function() {
    $("#ping-result, #packet-loss-result").text("testing...");
    testPing(50, 100, function(results) {
        $("#ping-result").text(results.avg.toFixed(3) + " ms");
        $("#packet-loss-result").text((results.loss*100).toFixed(1) + "%");
    });
});


var transmitted = 0;
var received = [];
var timeoutHandle;
function testPing(numTests, timeout, callback) {
    received = [];
    transmitted = 0;

    ws.onmessage = function(evt) {
        var start = parseFloat(evt.data.replace("ping ", ""));
        var latency = window.performance.now() - start;
        received.push(latency);
        console.log("Received response in %s ms", latency.toFixed(3));

        window.clearTimeout(timeoutHandle)
        numTests--;
        if (numTests) {
            // Start the next ping
            ping();
        } else {
            printStats();
        }
    }

    function ping() {
        var time = window.performance.now();
        ws.send("ping " + time);
        transmitted++;
        timeoutHandle = setTimeout(function() {
            console.log("Request timeout");
            numTests--;
            if (numTests) {
                ping();
            } else {
                printStats();
            }
        }, timeout);
    }

    function printStats() {
        // Calculate stats
        function average(data) {
            var sum = data.reduce(function(sum, value) {
                return sum + value;
            }, 0);

            var avg = sum / data.length;
            return avg;
        }

        var min = Math.min.apply(Math, received);
        var avg = average(received);
        var max = Math.max.apply(Math, received);
        var squareDiffs = received.map(function(value){
            var diff = value - avg;
            var sqr = diff * diff;
            return sqr;
        });
        var stddev = average(squareDiffs);
        var loss = (transmitted - received.length)/transmitted;

        if (received.length == 0) {
            min = Infinity;
            max = Infinity;
            avg = Infinity;
            stddev = Infinity;
        }

        // Print stats
        console.log("--- Ping statistics ---");
        console.log("%d messages transmitted, %d messages received, %s% packet loss",
            transmitted,
            received.length,
            (loss*100).toFixed(1));
        console.log("round-trip min/avg/max/stddev = %s/%s/%s/%s ms",
            min.toFixed(3),
            avg.toFixed(3),
            max.toFixed(3),
            stddev.toFixed(3));

        // Alert the caller of the data
        callback({
            min: min,
            avg: avg,
            max: max,
            stddev: stddev,
            loss: loss
        });
    }

    ping();
}
