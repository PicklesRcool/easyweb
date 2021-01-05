window.onload = function() {
    editor.setTheme("ace/theme/twilight");
    editor.session.setMode("ace/mode/html");

    countDownDate = new Date();
    countDownDate.addMinutes(5);
    countDownDate = countDownDate.getTime();

    // Update the count down every 1 second
    let x = setInterval(function() {

        // Get today's date and time
        let now = new Date().getTime();

        // Find the distance between now and the count down date
        distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
}

Date.prototype.addMinutes = function(m) {
    this.setTime(this.getTime() + (m * 60 * 1000));
    return this;
}